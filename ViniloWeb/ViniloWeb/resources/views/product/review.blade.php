@extends('layouts.layout')

@section('title', 'Mostrar Reviews')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/review.css') }}">
</head>

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="d-flex align-items-center justify-content-center" style="margin: 50px;">
    <img src="{{ asset($product->img) }}" alt="{{ $product->name }}" width="200px" height="200px" style="border-radius:15px; float: left;">
    <div class="flex-column" style="margin-left: 5px;">
        <h3 style="font-weight: bold; ">{{ $product->name }}</h3>
        <h3>{{ $product->author->name }}</h3>
        <p style="font-weight: bold; font-size: 20px; ">{{number_format($product->price-$product->price*($oferta/100), 2) }} €</p>

    </div>

    <div class="align-items-center" style="margin-top: 5px; margin-left: 10px;">
        @if($score == 5)
        <img src="/img/score/score_5.png" alt="score_5" width="75px" height="100px">
        @elseif($score >= 4)
        <img src="/img/score/score_4.png" alt="score_4" width="75px" height="100px">
        @elseif($score >= 3)
        <img src="/img/score/score_3.png" alt="score_3" width="75px" height="100px">
        @elseif($score >= 2)
        <img src="/img/score/score_2.png" alt="score_2" width="75px" height="100px">
        @else
        <img src="/img/score/score_1.png" alt="score_1" width="75px" height="100px">
        @endif

        <div class="d-flex flex-column">
            <form action="{{ route('review_post', ['id' => $product->id]) }}" method="GET" class="my-2">
                @csrf
                <button class="btn btn-primary btn-block" style="background-color: #D32626; width: auto;">
                    <span class="text-white" style="font-weight: bold;">Añadir Review</span>
                </button>
            </form>
        </div>
    </div>
</div>

<div class="column-container align-items-center justify-content-center" style="border: 0px;">
    <!-- lo de aqui abajo METER EN UN FOREACH -->
    @foreach($reviews as $r)
    <div class="column-container">
        <!-- añadir imagen de disco platino lo que toque -->
        <div class="predefined-text">
            @foreach($users as $u)
            @if($u->id == $r->user_id)
            <p><strong>{{ $u->name }} ({{ $r->score }})</strong></p>
            @endif
            @endforeach
            <p>{{ $r->review }}</p>
        </div>
    </div>
    @endforeach
</div>


@endsection