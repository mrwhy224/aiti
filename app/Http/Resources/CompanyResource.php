<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Morilog\Jalali\Jalalian;

class CompanyResource extends JsonResource
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
            'name'=>$this->name,
            'national_id'=>$this->national_id,
            'company_manager' => new UserResource($this->whenLoaded('manager')),
            'creator' => new UserResource($this->whenLoaded('creator')),
            'add_at' => Carbon::parse($this->created_at)->diffForHumans([
                'syntax' => Carbon::DIFF_ABSOLUTE
            ]),
        ];
    }
}
