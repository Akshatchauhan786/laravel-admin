<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            return redirect('admin.auth.dashboard');
        } else {
            return view('admin.auth.login');
        }
    }
}
