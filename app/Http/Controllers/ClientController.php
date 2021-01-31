<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

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
        $clients = Client::latest()->paginate(5);
        return view('home', compact('clients'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'detail' => 'required',
            'age' => 'required|numeric',
            'city' => 'required',
            'where' => 'required'
        ]);

        Client::create([
            'name' => request('name'),
            'detail' => request('detail'),
            'user_id' => auth()->id(),
            'age' => request('age'),
            'phone_number' => request('phone_number'),
            'city' => request('city'),
            'where' => request('where'),
            'results' => request('results'),
            'necessary' => request('necessary'),
            'flag' => request('flag'),
            'user_new_id' => request('user_new_id'),
            'comment' => request('comment'),
            'recall' => request('recall')
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
    public function edit(Client $client)
    {
        $users = User::all();
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

        request()->validate([
            'name' => 'required',
            'detail' => 'required',
            'age' => 'numeric',
            'phone_number' => 'required|numeric',
            'city' => 'required',
            'results' => 'required'
        ]);
            
        $client->update([
            'name' => request('name'),
            'detail' => request('detail'),
            'user_id' => auth()->id(),
            'age' => request('age'),
            'phone_number' => request('phone_number'),
            'city' => request('city'),
            'where' => request('where'),
            'results' => request('results'),
            'necessary' => request('necessary'),
            'flag' => request('flag'),
            'user_new_id' => request('user_new_id'),
            'comment' => request('comment'),
            'recall' => request('recall')
        ]);

        return redirect()->route('home')->with('success', 'Клиент обновлён');
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
