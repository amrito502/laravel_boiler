<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_dashboard(){
        return view('admin.dashboard');
    }

    public function admin_login(){
        return view('admin.login');
    }
}
