<?php

namespace App\Providers;

use App\Interfaces\PokemonRepositoryInterface;
use App\Repositories\PokemonRepository;
use Illuminate\Support\ServiceProvider;

class PokemonServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(PokemonRepositoryInterface::class, PokemonRepository::class);
    }

    public function boot(): void
    {
    }
}
