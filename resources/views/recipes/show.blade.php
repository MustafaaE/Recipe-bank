@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column align-items-center">
        <div class="card" style="width: 700px;">
            <div class="card-body" id="postcard-bg">
                <h1 id="recipetitle" class="card-header d-flex flex-row justify-content-center">{{ $recipe->title }}</h1>

                @if ($recipe->image)
                    <img class="card-img-top" src="{{ URL('storage/images/' . $recipe->image) }}" alt="test" width="500px"
                        height="500px">
                @endif
                <h3 class="card-text d-flex flex-row justify-content-center mt-2">{{ $recipe->description }}</h3>

                <div class="d-flex justify-content-evenly">
                    <div class="card-text w-50 p-3">Ingredients:
                        <ol>
                            @foreach ($recipe->ingredients()->get() as $item)
                                <li>{{ $item->ingredient }}, {{ $item->pivot->amount }}{{ $item->pivot->unit }}</li>
                            @endforeach
                        </ol>
                    </div>
                    <div class="card-text w-50 p-3">Instructions:
                        <p>{{ $recipe->how_to }}</p>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <p class="card-text">Prep time: {{ $recipe->prep_time }} min</p>
                    <p>Cooking time: {{ $recipe->cooking_time }} min</p>
                    <span>Servings: {{ $recipe->servings }}</span>
                </div>
                @foreach ($category as $item)
                    <p>Category: <a href="{{ route('categories.show', ['category' => $item]) }}">{{ $item->category }}
                    </p></a>
                @endforeach
                <p>Written by: {{ $recipe->user->name }}</p>
                <div class="d-flex justify-content-evenly">
                    @if ($recipe->user_id == auth()->id())
                        <a href="{{ route('recipes.edit', ['recipe' => $recipe]) }}" class="btn btn-primary">Edit</a>
                        <form class="d-inline block" action="{{ route('recipes.destroy', ['recipe' => $recipe]) }}"
                            method="POST">
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
