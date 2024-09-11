<?php

namespace App\Repositories;

use App\Interfaces\PokemonRepositoryInterface;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PokemonRepository implements PokemonRepositoryInterface
{
    const CACHE_KEY = 'pokemons::';
    private $client;
    private $config;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->config = config('api');
    }

    public function getPokemons(array $request): array
    {
        if (!($results = Cache::get(self::CACHE_KEY . 'all'))) {
            try {
                $query = http_build_query([
                    'offset' => 0,
                    'limit' => 100000
                ]);

                $response = $this->client->request('GET', $this->config['url'] . '?' . $query);

                $resultsTmp = json_decode($response->getBody()->getContents(), true);

                $results = $resultsTmp['results'];

                Cache::put(self::CACHE_KEY . 'all', $results);
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                $results = [];
            }
        }

        if (!empty($results) && !empty($request['name'])) {
            $match = false;
            $value = strtolower(trim($request['name']));

            foreach ($results as $result) {
                if ($result['name'] == $value) {
                    $match = $result;
                    break;
                }
            }

            if ($match !== false) {
                $results = [$match];
            };
        }

        return $results;
    }

    public function getPokemon(string $name): array
    {
        if (!($result = Cache::get(self::CACHE_KEY . $name))) {
            try {
                $response = $this->client->request('GET', $this->config['url'] . '/' . $name);

                $result = json_decode($response->getBody()->getContents(), true);

                Cache::put(self::CACHE_KEY . $name, $result);
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                $result = [];
            }
        }

        return $result;
    }
}
