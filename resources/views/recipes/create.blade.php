@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('recipes.store') }}">
            @csrf

            <form method="POST" action="{{ route('recipes.store') }}">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Recipes name" required>
                </div>
                <div class="form-group">
                    <label for="description">Recipe summary</label>
                    <textarea class="form-control" rows="2" placeholder="A short description of the recipe"></textarea>
                </div>
                <div class="form-group">
                    <label for="directions">Directions</label>
                    <textarea class="form-control" rows="4" placeholder="Fill in directions"></textarea>
                </div>
                <div class="form-group">
                    <label for="category">Select category</label>
                    <select class="form-control">
                        <option>Breakfast</option>
                        <option>Lunch</option>
                        <option>Supper</option>
                        <option>Dinner</option>
                        <option>Dessert</option>
                    </select>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="preptime">Prep time</label>
                        <input type="number" class="form-control" placeholder="Prep time in minutes">
                    </div>
                    <div class="col">
                        <label for="cooktime">Cooking time</label>
                        <input type="number" class="form-control" placeholder="Cooking time in minutes">
                    </div>
                    <div class="col">
                        <label for="servings">Servings</label>
                        <input type="number" class="form-control" placeholder="Total servings">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="ingredient">Ingredient</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="col">
                        <label for="amount">amount</label>
                        <input type="number" class="form-control" placeholder="">
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="unit">Select unit</label>
                            <select class="form-control">
                                <option>tsp</option>
                                <option>tbsp</option>
                                <option>g</option>
                                <option>kg</option>
                                <option>ml</option>
                                <option>dl</option>
                                <option>l</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>


        </form>
    </div>
@endsection
