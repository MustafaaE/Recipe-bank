@extends('layouts.app')

@section('content')
<div class="container">  
    <div class="users-name">
        <p class="testar"> {{ auth()->user()->name }}'s profile</p>
        
     </div>  
</div>

@endsection