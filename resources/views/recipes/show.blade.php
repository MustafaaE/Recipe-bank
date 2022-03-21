@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column align-items-center">
        <div class="card" style="width: 700px;">
            <div class="card-body">
                <h1 class="card-header">{{ $recipe->title }}</h1>
                <img class="card-img-top" src="{{ URL('storage/images/' . $recipe->image)}}" alt="test" width="500px">
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
                @if($recipe->user_id == auth()->id())
                <a href="{{ route('recipes.edit', ['recipe' => $recipe]) }}" class="btn btn-primary">Edit</a>
                    <form class="d-inline block" action="{{ route('recipes.destroy', ['recipe' => $recipe]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete recipe</button>
                    </form>

                @endif
            </div>

        </div>
    </div>
@endsection
