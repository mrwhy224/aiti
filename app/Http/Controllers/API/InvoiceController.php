<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceResource;
use App\Models\Company;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->success('Response was rendered successfully', InvoiceResource::collection(Invoice::with('invoiceable')->get()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function statistics()
    {
        $invoiceCount = Invoice::count();
        $companyCount = Company::count();
        $paidMoney = Invoice::where('status', 'paid')->sum('total_amount');
        $unpaidMoney = Invoice::whereIn('status', ['pending', 'overdue'])->sum('total_amount');
        return response()->success('Response was rendered successfully', [
            'invoice_count' => $invoiceCount,
            'company_count' => $companyCount,
            'paid_money' => number_format($paidMoney) . ' تومان',
            'unpaid_money' => number_format($unpaidMoney) . ' تومان',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
