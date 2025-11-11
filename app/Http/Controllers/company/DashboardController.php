<?php

namespace App\Http\Controllers\company;

use Illuminate\Support\Facades\Auth;

class DashboardController
{
    public function index()
    {
        $user = Auth::user();
        $company = $user->company;

        $requiredTypes = [
            'gazette-changes', 'gazette-capital', 'establishment-license',
            'operation-license', 'insurance-list', 'logo', 'personnel-photo'
        ];

        $attributes = $company->companyAttributes()
        ->whereIn('name', $requiredTypes)
            ->pluck('value', 'name');

        // ۳. شمارش وضعیت‌ها
        $statusCounts = [
            'empty' => 0,
            'uploaded' => 0,
            'confirmed' => 0,
            'rejected' => 0,
        ];

        foreach ($requiredTypes as $type) {
            $status = $attributes->get($type, 'empty');
            if (array_key_exists($status, $statusCounts)) {
                $statusCounts[$status]++;
            } else {
                $statusCounts['empty']++;
            }
        }
        $profileStatus = 'incomplete';
        if ($statusCounts['uploaded'] > 0)
            $profileStatus = 'pending';

        elseif ($statusCounts['confirmed'] == count($requiredTypes))
            $profileStatus = 'active';


        return view('layouts.vuexy.pages.company.dashboards', ['profileStatus'=>$profileStatus]);
    }
}
