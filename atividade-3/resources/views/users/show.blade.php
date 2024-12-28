@extends('layouts.app')

@section('title', 'Detalhes do Usuário')

@section('content')
<h1>Detalhes do Usuário</h1>
<p><strong>Nome:</strong> {{ $user->name }}</p>
<p><strong>E-mail:</strong> {{ $user->email }}</p>
<a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Editar</a>
<form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Excluir</button>
</form>
<a href="{{ route('users.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
