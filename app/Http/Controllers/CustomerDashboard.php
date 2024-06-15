<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helper\Help;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerDashboard extends Controller
{
    public function index()
    {

        $data = [
            'nav' => 'dashboard',
        ];


        return view('customer.dashboard', $data);
    }
}
