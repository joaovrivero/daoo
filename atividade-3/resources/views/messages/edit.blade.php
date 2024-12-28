@extends('layouts.app')

@section('title', 'Editar Mensagem')

@section('content')
<h1>Editar Mensagem</h1>
<form action="{{ route('messages.update', $message) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="sender_id" class="form-label">Remetente</label>
        <input type="number" class="form-control" id="sender_id" name="sender_id" value="{{ $message->sender_id }}" required>
    </div>
    <div class="mb-3">
        <label for="recipient_id" class="form-label">Destinatário</label>
        <input type="number" class="form-control" id="recipient_id" name="recipient_id" value="{{ $message->recipient_id }}" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Conteúdo</label>
        <textarea class="form-control" id="content" name="content" required>{{ $message->content }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
@endsection
