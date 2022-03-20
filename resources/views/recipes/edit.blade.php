@extends('layouts/app')
@section('content')
<div>
    <h1>Edit Recipe post</h1>

    <div class="container">
        <form method="POST" action="{{ route('recipes.update', ['recipe' => $recipe]) }}"> 
            @method('PUT')
            @csrf
           
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{$recipe->title}}" required>
            </div>
            <div class="form-group">
                <label for="description">Recipe summary</label>
                <textarea class="form-control" name="description" value="{{ old('description') ?:$recipe->description}}" required>{{$recipe->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="how_to">Directions</label>
                <textarea class="form-control" name="how_to" rows="4" value="{{ old('how_to') ?:$recipe->how_to}}" required>{{$recipe->how_to}}</textarea>
            </div>
            <div class="form-group">
                    <label for="category">Select category</label>
                    <select name="category" class="form-control">
                        <option>Breakfast</option>
                        <option>Lunch</option>
                        <option>Supper</option>
                        <option>Dinner</option>
                        <option>Dessert</option>
                    </select>
                </div> 
            <div class="row mt-3">
                <div class="col">
                    <label for="prep_time">Prep time</label>
                    <input type="number" class="form-control" name="prep_time" value="{{$recipe->prep_time}}" placeholder="total prep time" required>
                </div>
                <div class="col">
                    <label for="cooking_time">Cooking time</label>
                    <input type="number" class="form-control" name="cooking_time" value="{{$recipe->cooking_time}}" placeholder="Total cooking time" required>
                </div>
                <div class="col">
                    <label for="servings">Servings</label>
                    <input type="number" class="form-control" name="servings" value="{{$recipe->servings}}" placeholder="Total servings" required>
                </div>
            </div>
           
                <button type="submit" class="btn btn-success mt-3">Update</button>
        </form>
</div>
@endsection