<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Quote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $quoteCount = Quote::count();
        $userCount = User::where('usertype', 'user')->count();
        $adminCount = User::where('usertype', 'admin')->count();

        return view('admin.dashboard', compact('quoteCount', 'userCount', 'adminCount'));
    }

    public function stats()
    {
        $quoteCount = Quote::count();
        $userCount = User::where('usertype', 'user')->count();
        $adminCount = User::where('usertype', 'admin')->count();
        $topUsers = User::withCount('quotes')->orderByDesc('quotes_count')->take(5)->get();

        return view('admin.stats', compact('quoteCount', 'userCount', 'adminCount', 'topUsers'));
    }

}
