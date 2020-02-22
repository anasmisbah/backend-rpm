<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Company;

class CompanyController extends Controller
{
    public function profile()
    {
        $company = Company::first();
        $company->logo = url('/storage/' . $company->logo );
        $company->profile =  url('/storage/' . $company->profile );
        return response()->json($company, 200);
    }

    public function contact()
    {
        $company = Company::first();
        $company->logo = url('/storage/' . $company->logo );
        $company->profile =  url('/storage/' . $company->profile );
        return response()->json($company, 200);
    }
}