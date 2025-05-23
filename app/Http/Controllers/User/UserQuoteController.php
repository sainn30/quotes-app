<?php

namespace App\Http\Controllers\User;

use App\Models\Quote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserQuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quotes = Quote::with('user', 'likes')->latest()->paginate(10);
        return view('user.quotes.index', compact('quotes'));
    }

    public function create()
    {
        return view('user.quotes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Quote::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->route('quotes.index')->with('success', 'Quote added successfully!');
    }

    public function edit($id)
    {
        $quote = Quote::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('user.quotes.edit', compact('quote'));
    }

public function update(Request $request, $id)
{
    $request->validate([
        'content' => 'required|string|max:1000',
    ]);

    $quote = Quote::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    $quote->update([
        'content' => $request->content,
    ]);

    return redirect()->route('quotes.mine')->with('success', 'Quote updated successfully.');
}


    public function mine()
    {
        $quotes = Quote::where('user_id', Auth::id())->latest()->paginate(10);
        return view('user.quotes.my', compact('quotes'));
    }

    public function destroy($id)
    {
        $quote = Quote::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $quote->delete();

        return back()->with('success', 'Quote deleted successfully.');
    }
}
