@extends('layouts.app')

@section('title', 'Lista de Atividades')

@section('content')
<h1>Atividades</h1>
<a href="{{ route('activities.create') }}" class="btn btn-primary mb-3">Criar Nova Atividade</a>
<ul class="list-group">
    @foreach ($activities as $activity)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $activity->name }}
            <div>
                <a href="{{ route('activities.show', $activity) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('activities.edit', $activity) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('activities.destroy', $activity) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </div>
        </li>
    @endforeach
</ul>
@endsection
