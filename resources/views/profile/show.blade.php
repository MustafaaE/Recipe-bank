@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="users-name">
       <p> {{ auth()->user()->name }}'s profile</p>
    </div>

    @if(count($recipes) > 0)
    @foreach ($recipes as $recipe)
    <div class="col justify-content-center">
        
                <h2>{{$recipe->title}}</h2>
                <span>{{$recipe->description}}</span>
                <span>{{$recipe->user->name}}</span>
    </div>
    @endforeach
    
    @else
        <p>No recipes found</p>
    @endif


</div>


@endsection