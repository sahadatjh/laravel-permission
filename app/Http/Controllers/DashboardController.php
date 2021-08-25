<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function dashboard()
    {
        if (is_null($this->user) || !$this->user->can('dashboard.view')) {
            abort(403, 'You are Unauthorized !');
        }
        return view('backend.pages.dashboard');
    }
}
