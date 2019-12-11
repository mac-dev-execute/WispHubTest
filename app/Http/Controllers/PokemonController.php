<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function __construct(Client $client)
    {
        $this->client   = $client;
        $this->baseUrl  = env('POKEMON_API');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response       = $this->client->request('GET', $this->baseUrl.'pokemon/?limit=10');
        $pokemonList    = $this->responseHandler($response);
        $pokemons       = [];
        if (isset($pokemonList->results)) {
            foreach ($pokemonList->results as $key => $pokemon) {
                $response       = $this->client->request('GET', $pokemon->url);
                $jsonResponse   = $this->responseHandler($response);
                if (isset($jsonResponse->name))
                    $pokemons[] = $jsonResponse;
            }
        }

        $data['pokemons'] = $pokemons;
        
        return view('pokemons.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response   = $this->client->request('GET', $this->baseUrl.'pokemon/'.$id);
        $pokemon    = $this->responseHandler($response);

        $types = [];
        if (isset($pokemon->types)) {
            foreach ($pokemon->types as $key => $type) {
                $response       = $this->client->request('GET', $type->type->url);
                $jsonResponse   = $this->responseHandler($response);
                if (isset($jsonResponse->name))
                    $types[] = $jsonResponse;
            }
        }
        $data['pokemon']    = $pokemon;
        $data['types']      = $types;

        return view('pokemons.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
