@extends('layouts.app')

@section('content')
@foreach($categories as $category)
<p>{{ $category->category }}</p>
@endforeach

@endsection