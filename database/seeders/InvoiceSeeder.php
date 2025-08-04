<?php

namespace Database\Seeders;

use App\Models\Attachment;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $companies = Company::all();
        $admins = User::whereHas('roles', fn ($q) => $q->where('name', 'admin'))->get();

        if ($companies->isEmpty()) {
            $this->command->warn('No companies found. Please seed companies before seeding invoices.');
            return;
        }

        foreach ($companies as $company) {
            // Create 2 to 5 invoices for each company
            for ($i = 0; $i < rand(2, 5); $i++) {
                // First, create the invoice with a temporary total of 0
                $invoice = Invoice::create([
                    'invoiceable_id' => $company->id,
                    'invoiceable_type' => Company::class,
                    'invoice_number' => 'INV-' . Str::random(8),
                    'total_amount' => 0, // Will be updated after creating items
                    'due_date' => $faker->dateTimeBetween('+1 week', '+1 month'),
                    'status' => 'pending',
                ]);

                $invoiceTotal = 0;

                // Create 1 to 4 line items for the invoice
                for ($j = 0; $j < rand(1, 4); $j++) {
                    $quantity = rand(1, 5);
                    $unitPrice = $faker->randomNumber();
                    $totalPrice = $quantity * $unitPrice;

                    InvoiceItem::create([
                        'invoice_id' => $invoice->id,
                        'description' => 'Subscription Fee - ' . $faker->word,
                        'quantity' => $quantity,
                        'unit_price' => $unitPrice,
                        'total_price' => $totalPrice,
                    ]);

                    $invoiceTotal += $totalPrice;
                }

                // Update the invoice with the correct total amount
                $invoice->update(['total_amount' => $invoiceTotal]);

                // Create a payment for the invoice
                $this->createPaymentForInvoice($invoice, $faker, $admins);
            }
        }
    }

    /**
     * Create a payment record for a given invoice.
     */
    private function createPaymentForInvoice(Invoice $invoice, $faker, $admins)
    {
        $paymentMethod = $faker->randomElement(['online', 'bank_transfer']);
        $isVerified = ($paymentMethod === 'online'); // Online payments are auto-verified

        $payment = Payment::create([
            'invoice_id' => $invoice->id,
            'amount' => $invoice->total_amount,
            'payment_method' => $paymentMethod,
            'transaction_id' => ($paymentMethod === 'online') ? 'TXN-' . Str::random(12) : null,
            'is_verified' => $isVerified,
            'verified_by' => $isVerified && $admins->isNotEmpty() ? $admins->random()->id : null,
            'verified_at' => $isVerified ? now() : null,
        ]);

        // If payment was a bank transfer, attach a fake document for verification
        if ($paymentMethod === 'bank_transfer') {
            Attachment::create([
                'attachable_id' => $payment->id,
                'attachable_type' => Payment::class,
                'file_path' => 'attachments/fake_receipt.pdf',
                'original_name' => 'receipt_' . $invoice->invoice_number . '.pdf',
                'mime_type' => 'application/pdf',
                'size' => $faker->numberBetween(100000, 500000),
            ]);
        }

        // Update invoice status if the payment was verified
        if ($isVerified) {
            $invoice->update([
                'paid_amount' => $invoice->total_amount,
                'status' => 'paid',
            ]);
        }
    }
}
