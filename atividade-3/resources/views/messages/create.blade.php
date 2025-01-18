@extends('layouts.app')

@section('title', 'Criar Nova Mensagem')

@section('content')
<div class="container">
    <h1>Create Message</h1>
    <form action="{{ route('messages.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="sender_id">Sender</label>
            <select name="sender_id" id="sender_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="receiver_id">Receiver</label>
            <select name="receiver_id" id="receiver_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>
@endsection