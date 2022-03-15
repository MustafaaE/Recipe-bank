@extends('layouts.app')

@section('content')

<h1>{{ $recipe->title }}</h1>
<span>{{$recipe->user->name}}</span>


@endsection