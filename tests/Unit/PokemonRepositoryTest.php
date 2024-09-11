<?php

namespace Tests\Unit;

use App\Repositories\PokemonRepository;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Cache;
use Mockery;
use Tests\TestCase;

class PokemonRepositoryTest extends TestCase
{
    private $repository;
    private $client;

    public function setUp(): void
    {
        parent::setUp();

        $this->client = Mockery::mock(Client::class);
        $this->repository = new PokemonRepository($this->client);
    }

    public function test_get_pokemons()
    {
        $data = ['results' => [['name' => 'pikachu']]];

        $this->client
            ->shouldReceive('request')
            ->once()
            ->andReturn(new Response(200, [], json_encode($data)));

        Cache::shouldReceive('get')->andReturn(false);
        Cache::shouldReceive('put');

        $pokemons = $this->repository->getPokemons([]);
        $this->assertCount(1, $pokemons);
        $this->assertEquals('pikachu', $pokemons[0]['name']);
    }

    public function test_get_pokemon()
    {
        $data = ['name' => 'pikachu'];

        $this->client
            ->shouldReceive('request')
            ->once()
            ->andReturn(new Response(200, [], json_encode($data)));

        Cache::shouldReceive('get')->andReturn(false);
        Cache::shouldReceive('put');

        $pokemon = $this->repository->getPokemon('pikachu');

        $this->assertCount(1, $pokemon);
        $this->assertEquals('pikachu', $pokemon['name']);
    }
}
