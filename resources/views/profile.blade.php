@extends('layouts.app')

@section('content')
<div class="container">  
    <div class="users-name">
        <p class="testar"> {{ auth()->user()->name }}'s profile</p>
        <div class="d-flex flex-column align-items-center">
        @if (count($recipes) > 0)
        @foreach ($recipes as $recipe)
                <div  id="postcard-bg" class="card w-50 mb-4">
                        <h2 id="recipetitle" class="card-header d-flex flex-row justify-content-center "> <a class="card-title text-decoration-none" id="h2title" href="/recipes/{{ $recipe->id }}">{{ $recipe->title }}</h2></a>
                        <a class="" href="/recipes/{{ $recipe->id }}">
                    <img class="card-img-top" src="{{ URL('storage/images/'. $recipe->image)}}" alt="test" width="500px" height="550px"> </a>
                    <h3 class="d-flex flex-row justify-content-center" >{{ $recipe->description }}</h3>
                    <div class="d-flex flex-row justify-content-between">
                        <span>Uploaded by: {{ $recipe->user->name }}</span>
                        <span>{{ $recipe->created_at }}</span>
                    </div>

                </div>
        @endforeach
    @else
        <p>No recipes found </p>
    @endif
</div>
</div>

@endsection