@extends('layouts.app')

@section('title', ucfirst($pokemon['name']))

@section('content')
    <h1 class="text-center mb-3">{{ ucfirst($pokemon['name']) }}</h1>

    <div class="pb-4">
        <a class="btn btn-primary btn-lg" href="{{ route('pokedex.index') }}" title="Back">&larr; Back</a>
    </div>

    <div class="card p-3">
        <ul class="list-group">
            @foreach($pokemon['abilities'] as $ability)
                <li class="list-group-item">Ability: {{ ucfirst($ability['ability']['name']) }}</li>
            @endforeach

            <li class="list-group-item">Base Experience: {{ $pokemon['base_experience'] }}</li>
            <li class="list-group-item">Height: {{ $pokemon['height'] }}</li>
            <li class="list-group-item">Weight: {{ $pokemon['weight'] }}</li>
        </ul>
    </div>
@endsection
