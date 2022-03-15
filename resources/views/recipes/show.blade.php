@extends('layouts.app')

@section('content')

<div class="d-flex flex-column align-items-center">
<div class="card" style="width: 700px;">
    <div class="d-flex flex-column ">
<h1>{{ $recipe->title }}</h1>
<hr style="width: 700px;">
<p>{{ $recipe->description}}</p>
<p>Instructions: {{ $recipe->how_to }}</p>
<div class="d-flex justify-content-between">
<p>Prep time: {{ $recipe->prep_time }}</p>
<p>Cooking time: {{ $recipe->cooking_time }}</p>
<span>Servings: {{ $recipe->servings }}</span>
</div>
<p>Category: <a href="{{ route('categories.index', ['category' => $recipe->category->category]) }}">{{ $recipe->category->category}}</p></a>
<p>Written by: {{$recipe->user->name}}</p>
</div>

</div>
</div>

@endsection