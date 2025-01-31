<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Controllers\Controller;
use App\Models\User;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    public function create()
    {
        $users = User::all();
        return view('messages.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sender_id' => 'required|exists:users,id',
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        Message::create($request->all());

        return redirect()->route('messages.index');
    }

    public function show(Message $message)
    {
        $sender = User::find($message->sender_id);
        $recipient = User::find($message->receiver_id);
        return view('messages.show', compact('message', 'sender', 'recipient'));
    }

    public function edit(Message $message)
    {
        $users = User::all();
        return view('messages.edit', compact('message', 'users'));
    }

    public function update(Request $request, Message $message)
    {
        $request->validate([
            'sender_id' => 'required|exists:users,id',
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        $message->update($request->all());

        return redirect()->route('messages.index');
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('messages.index');
    }
}
