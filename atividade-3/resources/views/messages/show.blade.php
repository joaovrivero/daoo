@extends('layouts.app')

@section('title', 'Detalhes da Mensagem')

@section('content')
<h1>Detalhes da Mensagem</h1>
<p><strong>Remetente:</strong> {{ $message->sender_id }}</p>
<p><strong>Destinatário:</strong> {{ $message->recipient_id }}</p>
<p><strong>Conteúdo:</strong> {{ $message->content }}</p>
<a href="{{ route('messages.edit', $message) }}" class="btn btn-warning">Editar</a>
<form action="{{ route('messages.destroy', $message) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Excluir</button>
</form>
<a href="{{ route('messages.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
