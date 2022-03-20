@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column align-items-center">
        <div class="card" style="width: 700px;">
            <div class="card-body">
                <h1 class="card-title">{{ $recipe->title }}</h1>
                <p class="card-text">{{ $recipe->description }}</p>
                <p class="card-text">Instructions: {{ $recipe->how_to }}</p>
                <div class="d-flex justify-content-between">
                    <p class="card-text">Prep time: {{ $recipe->prep_time }}</p>
                    <p>Cooking time: {{ $recipe->cooking_time }}</p>
                    <span>Servings: {{ $recipe->servings }}</span>
                </div>
                <p>Category: <a
                        href="{{ route('categories.index', ['category' => $recipe->category->id]) }}">{{ $recipe->category->category }}
                </p></a>
                <p>Written by: {{ $recipe->user->name }}</p>
            </div>

        </div>
    </div>
@endsection
