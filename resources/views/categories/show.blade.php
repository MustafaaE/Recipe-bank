@extends('layouts.app')

@section('content')


<div  class="d-flex flex-column align-items-center">
    <h1>Category: {{$category->category}}</h1>
    @if (count($recipes) > 0)
        @foreach ($recipes as $recipe)
                <div id="postcard-bg" class="card w-50 mb-4">
                        <h2 id="recipetitle" class="card-header d-flex flex-row justify-content-center"> <a class="card-title text-decoration-none" id="h2title" href="/recipes/{{ $recipe->id }}">{{ $recipe->title }}</h2></a>
                        <a class="text-decoration-none" href="/recipes/{{ $recipe->id }}">
                            @if($recipe->image)
                    <img class="card-img-top text-decoration-none" src="{{ URL('storage/images/'. $recipe->image)}}" alt="test" width="500px" height="550px"> </a>
                    @endif
                    <h3 class="d-flex flex-row justify-content-center">{{ $recipe->description }}</h3>
                    <div class="d-flex flex-row justify-content-between">
                        <span>Uploaded by: {{ $recipe->user->name }}</span>
                        <span>{{ $recipe->created_at }}</span>
                    </div>

                </div>
        @endforeach
    @else
        <p>No recipes found </p>
    @endif

@endsection