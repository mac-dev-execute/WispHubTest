<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TypeController extends Controller
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
        //
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
        $response       = $this->client->request('GET', $this->baseUrl.'type/'.$id);
        $type           = $this->responseHandler($response);
        $pokemons       = [];
        if (isset($type->pokemon)) {
            for ($i = 0; $i < 10; $i++) {
                $response       = $this->client->request('GET', $type->pokemon[$i]->pokemon->url);
                $jsonResponse   = $this->responseHandler($response);
                if (isset($jsonResponse->name))
                    $pokemons[] = $jsonResponse;
            }
        }

        $data['type']       = $type;
        $data['pokemons']   = $pokemons;
        //dd($data['pokemons']);
        return view('types.edit', $data);
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
