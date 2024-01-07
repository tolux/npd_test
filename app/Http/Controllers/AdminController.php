<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailToUser;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function index(): Response
    {
        return Inertia::render('admin/Dashboard');
    }

    public function sendEmailToActiveUsers()
    {
        //dispatching SendMailToUser job
        dispatch(new SendMailToUser());

        session()->flash('success', 'Email been sent successfully to active users');

        return redirect()->back();
    }

    public function logout(Request $request)
    {

        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
