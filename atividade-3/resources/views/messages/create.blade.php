@extends('layouts.app')

@section('title', 'Criar Nova Mensagem')

@section('content')
<h1>Criar Nova Mensagem</h1>
<form action="{{ route('messages.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="sender_id" class="form-label">Remetente</label>
        <input type="number" class="form-control" id="sender_id" name="sender_id" required>
    </div>
    <div class="mb-3">
        <label for="recipient_id" class="form-label">Destinatário</label>
        <input type="number" class="form-control" id="recipient_id" name="recipient_id" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Conteúdo</label>
        <textarea class="form-control" id="content" name="content" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
@endsection
