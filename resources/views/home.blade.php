@extends('layouts.app')

@section('content')

{{-- 
    <div class="d-flex justify-content-center"> --}}
    @if(count($recipes) > 0)
    @foreach ($recipes as $recipe)
    <div class="col justify-content-center">
        
                <h2>{{$recipe->title}}</h2>
                <span>{{$recipe->description}}</span>
                <span>{{$recipe->user->name}}</span>
    </div>
    @endforeach
        
    @endif

{{-- </div> --}}
@endsection
