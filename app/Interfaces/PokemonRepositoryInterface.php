<?php

namespace App\Interfaces;

interface PokemonRepositoryInterface
{
    public function getPokemons(array $request): array;
    public function getPokemon(string $name): array;
}
