@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column align-items-center">
        <div class="card" style="width: 700px;">
            <div class="card-body">
                <h1 class="card-header">{{ $recipe->title }}</h1>
                
                <img class="card-img-top" src="{{ URL('storage/images/' . $recipe->image)}}" alt="test" width="500px">
                <p class="font-italic card-text d-flex flex-row justify-content-center">{{ $recipe->description }}</p>
              
                <div class="d-flex justify-content-evenly">
                    <div class="card-text w-50 p-3">Ingredients:
                        <ol>{{ $recipe->ingredient }}</ol>
                    </div>
                <div class="card-text w-50 p-3">Instructions:
                    <p>{{ $recipe->how_to }}</p>
                </div>
                </div>

                <div class="d-flex justify-content-between">
                    <p class="card-text">Prep time: {{ $recipe->prep_time }}</p>
                    <p>Cooking time: {{ $recipe->cooking_time }}</p>
                    <span>Servings: {{ $recipe->servings }}</span>
                </div>
                <p>Category: <a
                        href="{{ route('categories.index', ['category' => $recipe->category->id]) }}">{{ $recipe->category->category }}
                </p></a>
                <p>Written by: {{ $recipe->user->name }}</p>
                <div class="d-flex justify-content-evenly">
                @if($recipe->user_id == auth()->id())
                <a href="{{ route('recipes.edit', ['recipe' => $recipe]) }}" class="btn btn-primary">Edit</a>
                    <form class="d-inline block" action="{{ route('recipes.destroy', ['recipe' => $recipe]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete recipe</button>
                    </form>
                </div>

                @endif
            </div>

        </div>
    </div>
@endsection
