@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center text-capitalize">Pokemon Tipo {{ $type->name }}</h1>
        <div class="card-deck mb-3 text-center">

        @foreach ($pokemons as $key => $pokemon)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal text-capitalize">{{ $pokemon->name }}</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ $pokemon->sprites->front_default }}">
                        <a href="/pokemons/{{ $pokemon->id }}" class="btn btn-lg btn-block btn-outline-primary">Ver Pokemon</a>
                    </div>
                </div>
            </div>
        @endforeach

        </div>
    </div>
@endsection