<?php

namespace App\Http\Controllers\admin;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class DashboardController
{
    public function index()
    {
        $requiredTypes = [
            'gazette-changes', 'gazette-capital', 'establishment-license',
            'operation-license', 'insurance-list', 'logo', 'personnel-photo'
        ];

        $allCompanies = Company::where('is_confirmed', '0')->with('companyAttributes')->get();

        $pendingCompanyCount = 0;
        foreach ($allCompanies as $company) {
            $attributes = $company->companyAttributes->pluck('value', 'name');
            $statusCounts = [
                'empty' => 0,
                'uploaded' => 0,
                'confirmed' => 0,
                'rejected' => 0,
            ];

            foreach ($requiredTypes as $type) {
                $status = $attributes->get($type, 'empty');
                $statusCounts[$status]++;
            }
            if ($statusCounts['empty'] == 0 && $statusCounts['uploaded'] > 0)
                $pendingCompanyCount++;
        }
        return view('layouts.vuexy.pages.admin.dashboards', ['pendingCompanyCount'=>$pendingCompanyCount]);
    }
}
