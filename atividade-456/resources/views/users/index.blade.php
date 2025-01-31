@extends('layouts.app') <!-- Indica que esta view utiliza o layout -->

@section('title', 'Lista de Usuários') <!-- Define o título da página -->

@section('content')
<h1>Usuários</h1>
<a href="{{ route('users.create') }}" class="btn btn-primary">Criar Novo Usuário</a>
<ul class="list-group mt-3">
    @foreach ($users as $user)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $user->name }}
            <div>
                <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </div>
        </li>
    @endforeach
</ul>
@endsection
