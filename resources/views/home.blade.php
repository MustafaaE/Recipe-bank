@extends('layouts.app')

@section('content')

<div class="d-flex flex-column align-items-center">
    @if (count($recipes) > 0)
        @foreach ($recipes as $recipe)
                <div class="card w-50 mb-4">
                    <a class="card-title text-decoration-none" href="/recipes/{{ $recipe->id }}">
                        <h2>{{ $recipe->title }}</h2>
                    </a>
                    <img class="card-img-top" src="{{ URL('storage/images/' . $recipe->image)}}" alt="test" width="500px">
                    <p>{{ $recipe->description }}</p>
                    <div class="d-flex flex-row justify-content-between">
                        <span>{{ $recipe->user->name }}</span>
                        <span>{{ $recipe->created_at }}</span>
                    </div>

                </div>
        @endforeach
    @else
        <p>No recipes found </p>
    @endif

    </div>
@endsection
