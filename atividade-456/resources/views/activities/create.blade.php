@extends('layouts.app')

@section('title', 'Criar Nova Atividade')

@section('content')
<h1>Criar Nova Atividade</h1>
<form action="{{ route('activities.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nome da Atividade</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descrição</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    <div class="mb-3">
        <label for="start_time" class="form-label">Data de Início</label>
        <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
    </div>
    <div class="mb-3">
        <label for="end_time" class="form-label">Data de Término</label>
        <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
    </div>
    <div class="mb-3">
        <label for="max_participants" class="form-label">Máximo de Participantes</label>
        <input type="number" class="form-control" id="max_participants" name="max_participants" required>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
@endsection
