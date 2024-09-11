<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetAllPokemonsRequest;
use App\Http\Requests\GetPokemonRequest;
use App\Repositories\PokemonRepository;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class PokedexController extends Controller
{
    private $repository;

    public function __construct(PokemonRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(GetAllPokemonsRequest $request)
    {
        $data = $this->repository->getPokemons($request->validated());

        $currentData = Paginator::resolveCurrentPage();
        $collection = collect($data);
        $perPage = 10;
        $currentPage = $collection->slice(($currentData * $perPage) - $perPage, $perPage)->all();
        $pokemons = new Paginator($currentPage, count($collection), $perPage);
        $pokemons->setPath($request->url());
        $pokemons->appends($request->validated());

        return view('index', compact('pokemons'));
    }

    public function show(GetPokemonRequest $request)
    {
        $pokemon = $this->repository->getPokemon($request->validated('name'));

        return view('show', compact('pokemon'));
    }
}
