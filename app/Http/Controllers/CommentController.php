<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (request()->flag === 'Позвонить') {
            request()->validate([
                'results' => 'required',
                'flag' => 'required',
                'recall' => 'required|date_format:Y-m-d'
            ]);
        } elseif (request()->flag !== 'Позвонить') {
            request()->validate([
                'results' => 'required',
            ]);
        }

        $comment = new Comment;
        $comment->results = $request->results;
        $comment->flag = $request->flag;
        $comment->recall = $request->recall;

        $comment->user()->associate($request->user());

        $client = Client::find($request->client_id);
        $client->comments()->save($comment);

        return back()->with('success', 'Комментарий добавлен');
    }
}
