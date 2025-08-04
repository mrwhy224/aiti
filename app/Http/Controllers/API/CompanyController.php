<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        return response()->success('Response was rendered successfully', CompanyResource::collection(Company::with('manager')->where('is_confirmed', 1)->get()));
    }

    public function pending(Request $request)
    {
        return response()->success('Response was rendered successfully', CompanyResource::collection(Company::with('manager')->where('is_confirmed', 0)->get()));
    }
}
