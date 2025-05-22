<?php

namespace App\Http\Controllers\Admin;

use App\Models\Quote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminQuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::with('user')->latest()->paginate(10);
        return view('admin.quotes.index', compact('quotes'));
    }

    public function destroy($id)
    {
        $quote = Quote::findOrFail($id);
        $quote->delete();

        return back()->with('success', 'Quote berhasil dihapus oleh admin.');
    }
}
