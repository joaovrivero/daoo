@extends('layouts.app')

@section('title', 'Lista de Mensagens')

@section('content')
<h1>Mensagens</h1>
<a href="{{ route('messages.create') }}" class="btn btn-primary mb-3">Criar Nova Mensagem</a>
<ul class="list-group">
    @foreach ($messages as $message)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $message->content }}
            <div>
                <a href="{{ route('messages.show', $message) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('messages.edit', $message) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('messages.destroy', $message) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </div>
        </li>
    @endforeach
</ul>
@endsection
