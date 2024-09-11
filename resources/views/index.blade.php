@extends('layouts.app')

@section('title', 'Pokédex')

@section('content')
    <h1 class="text-center mb-3">Pokédex</h1>

    <form class="mb3">
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Search Pokémon" value="{{ request()->get('name') }}">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
    </form>

    <div class="card p-3">
        @if(!$pokemons)
            <div class="text-center">No Pokemons found.</div>
        @else
            <div class="list-group">
                @foreach ($pokemons as $pokemon)
                    <a class="list-group-item list-group-item-action" href="/pokemon/{{ $pokemon['name'] }}">{{ ucfirst($pokemon['name']) }}</a>
                @endforeach
            </div>

            @if($pokemons->total() > 1)
                <div class="pt-4 text-center custom-pagination">
                    {{ $pokemons->links() }}
                </div>
            @endif
        @endif
    </div>
@endsection

<style>
    .custom-pagination > nav {
        display: inline-block;
    }
</style>
