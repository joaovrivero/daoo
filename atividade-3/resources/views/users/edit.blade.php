@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')
<h1>Editar Usuário</h1>
<form action="{{ route('users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
@endsection
