@extends('layouts.app')

@section('content')


    @if (count($recipes) > 0)
        @foreach ($recipes as $recipe)
            <div class="d-flex flex-column align-items-center">
                <div class="card w-50 mb-4">
                    <a href="/recipes/{{ $recipe->id }}">
                        <h2>{{ $recipe->title }}</h2>
                    </a>
                    <p>{{ $recipe->description }}</p>
                    <span>{{ $recipe->user->name }}</span>
                </div>

            </div>
        @endforeach
    @else
        <p>No recipes found </p>
    @endif

    </div>
@endsection
