@extends('layouts.app')

@section('title', 'Detalhes da Atividade')

@section('content')
<h1>Detalhes da Atividade</h1>
<p><strong>Nome:</strong> {{ $activity->name }}</p>
<p><strong>Descrição:</strong> {{ $activity->description }}</p>
<p><strong>Data de Início:</strong> {{ $activity->start_time }}</p>
<p><strong>Data de Término:</strong> {{ $activity->end_time }}</p>
<p><strong>Máximo de Participantes:</strong> {{ $activity->max_participants }}</p>
<a href="{{ route('activities.edit', $activity) }}" class="btn btn-warning">Editar</a>
<form action="{{ route('activities.destroy', $activity) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Excluir</button>
</form>
<a href="{{ route('activities.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
