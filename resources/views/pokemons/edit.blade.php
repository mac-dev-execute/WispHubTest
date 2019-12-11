@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center text-capitalize">{{ $pokemon->name }}</h1>
        <img src="{{ $pokemon->sprites->front_default }}">
        <br>
        <h3>Detalle de las características</h3>
        <br>
        <p><b>Peso:</b> {{ $pokemon->weight }}</p>
        <p><b>Altura:</b> {{ $pokemon->height }}</p>
        <p class="text-capitalize">
            <b>Tipo:</b> 
        @foreach ($types as $key => $type)
            <a href="/types/{{ $type->id }}">
                <span class="badge badge-primary">{{ $type->name }}</span>
            </a>
        @endforeach
        </p>
        <p class="text-capitalize">
            <b>Habilidades:</b> 
        @foreach ($pokemon->abilities as $key => $ability)
            {{ $key != 0 ? ',' : '' }} {{ $ability->ability->name }}
        @endforeach
        </p>
        <p class="text-capitalize">
            <b>Movimientos:</b> 
        @foreach ($pokemon->moves as $key => $move)
            {{ $key != 0 ? ',' : '' }} {{ $move->move->name }}
        @endforeach
        </p>
    </div>
@endsection