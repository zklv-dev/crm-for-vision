<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use WeStacks\TeleBot\TeleBot;

class ClientController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:client-list|client-create|client-edit|client-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:client-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:client-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:client-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all()->sortDesc();
        return view('home', compact('clients'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {
        $users = User::all();
        return view('clients.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = Client::all()->last();
        request()->validate([
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'detail' => 'required',
            'where' => 'required',
        ]);

        Client::create([
            'name' => request('name'),
            'detail' => request('detail'),
            'user_id' => auth()->id(),
            'age' => request('age'),
            'phone_number' => request('phone_number'),
            'city' => request('city'),
            'where' => request('where'),
            'user_new_id' => request('user_new_id')
        ]);

        $bot = new TeleBot('1625682503:AAFZaGcuk_5FtQyelwqoqoSrnfknBdtHmPs');

        // See docs for details:  https://core.telegram.org/bots/api#sendmessage
        $message = $bot->sendMessage([
            'chat_id' => -596492339,
            'text' => Auth::user()->name . " добавил(а) клиента: \n Имя: " . $request->name . " \n Номер телефона: " . $request->phone_number . "\n Детали разговора: " . $request->detail . "\n Дата/Время добавления: " . date("Y-m-d H:i"),
            'reply_markup' => [
                'inline_keyboard' => [[[
                    'text' => 'Детали',
                    'url' => 'http://127.0.0.1:8000/clients/' .  ++$client->id . '/edit'
                ]]]
            ]
        ]);


        return redirect()->route('home')->with('success', 'Клиент создан успешно');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client, User $user)
    {
        $users = User::all();
        $clients = Client::all();

        if (
            $client->comments->last()
            && $client->comments->last()->flag !== 'Позвонить'
            && $client->comments->last()->flag !== null
            && !Auth::user()->hasRole(['Admin', 'Director'])
        ) {
            return redirect('/');
        }

        // dd($client->user_new_id);
        return view('clients.edit', compact('client', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $comment = new Comment;
        $comment->results = "Не заполнено";
        $comment->flag = $request->flag;
        $comment->recall = $request->recall;
        $comment->user()->associate($request->user());

        if (request()->user_new_id === $client->user_new_id) {
            $comment;
        } else {
            $client->comments()->save($comment);
        }

        request()->validate([
            'user_new_id' => 'required',
        ]);

        $client->update([
            'user_new_id' => request('user_new_id'),
        ]);

        $bot = new TeleBot('1625682503:AAFZaGcuk_5FtQyelwqoqoSrnfknBdtHmPs');

        // See docs for details:  https://core.telegram.org/bots/api#sendmessage
        $message = $bot->sendMessage([
            'chat_id' => -596492339,
            'text' => "Менеджер: " . $request->user_new_id . " \n Взял(а) клиента:" . $client->name . " \n Дата: " . date("Y-m-d H:i"),
            'reply_markup' => [
                'inline_keyboard' => [[[
                    'text' => 'Детали',
                    'url' => 'http://127.0.0.1:8000/clients/' .  $client->id . '/edit'
                ]]]
            ]
        ]);

        return back()->with('success', 'Данные успешно обновлены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('home')->with('success', 'Клиент удалён');
    }
}
