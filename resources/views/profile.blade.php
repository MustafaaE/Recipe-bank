@extends('layouts.app')

@section('content')
<div class="container">

    <a class="btn btn-primary" href="{{ route('recipes.create') }}" role="button">Create recipe</a>
    
</div>
<div class="profile-content">
    <p> {{ auth()->user()->name }}'s profile</p>
    
</div>


@endsection