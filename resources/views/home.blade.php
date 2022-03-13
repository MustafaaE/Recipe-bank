@extends('layouts.app')

@section('content')


    <div class="d-flex flex-wrap">

    @if(count($recipes) > 0)
    @foreach ($recipes as $recipe)
        <div class="row">
                <h2>{{$recipe->title}}</h2>
                {{$recipe->description}}
                {{$recipe->user_id}}
            </div>
    
    @endforeach
        
    @endif
</div>
@endsection
