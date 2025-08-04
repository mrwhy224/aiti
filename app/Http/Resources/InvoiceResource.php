<?php

namespace App\Http\Resources;

use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Morilog\Jalali\Jalalian;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'company' => $this->whenLoaded('invoiceable', function () {
                return $this->invoiceable_type === Company::class ? new CompanyResource($this->invoiceable) : null;
            }),
            'total' => number_format($this->total_amount).' تومان',
            'status' => $this->status,
            'due_date' => $this->status=='paid'?Jalalian::fromCarbon($this->due_date)->format('j F Y'):null,
            'created_at' => Jalalian::fromCarbon($this->created_at)->format('j F Y'),
        ];
    }
}
