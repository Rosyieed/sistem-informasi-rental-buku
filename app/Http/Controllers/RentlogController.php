<?php

namespace App\Http\Controllers;

use App\Models\RentLog;

class RentlogController extends Controller
{
    public function index()
    {
        $rentlog = RentLog::with(['user', 'book'])->orderBy('user_id')->get();
        return view('rentlog', ['rentlog' => $rentlog]);
    }
}
