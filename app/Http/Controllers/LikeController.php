<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($id)
    {
        $quote = Quote::findOrFail($id);

        Like::firstOrCreate([
            'user_id' => Auth::id(),
            'quote_id' => $quote->id,
        ]);

        return back()->with('success', 'Quote liked.');
    }

    public function unlike($id)
    {
        $like = Like::where('user_id', Auth::id())->where('quote_id', $id)->first();

        if ($like) {
            $like->delete();
        }

        return back()->with('success', 'Quote unliked.');
    }
}
