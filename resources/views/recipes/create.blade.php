@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('recipes.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Recipes name" required>
            </div>
            <div class="form-group">
                <label for="description">Recipe summary</label>
                <textarea class="form-control" name="description" rows="2" placeholder="A short description of the recipe" required></textarea>
            </div>
            <div class="form-group">
                <label for="how_to">Directions</label>
                <textarea class="form-control" name="how_to" rows="4" placeholder="Fill in directions" required></textarea>
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
                    <input type="number" class="form-control" name="prep_time" placeholder="Prep time in minutes" required>
                </div>
                <div class="col">
                    <label for="cooking_time">Cooking time</label>
                    <input type="number" class="form-control" name="cooking_time" placeholder="Cooking time in minutes" required>
                </div>
                <div class="col">
                    <label for="servings">Servings</label>
                    <input type="number" class="form-control" name="servings" placeholder="Total servings" required>
                </div>
            </div>
            <div class="row mt-3">
                    <div class="col">
                        <label for="ingredient">Ingredient</label>
                        <input type="text" name="ingredient" class="form-control" placeholder="">
                    </div>
                    <div class="col">
                        <label for="amount">amount</label>
                        <input type="number" name="amount" class="form-control" placeholder="">
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="unit">Select unit</label>
                            <select class="form-control" name="unit">
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
                    <div class="col">
                        <button type="button" class="btn btn-success mt-4" id="testjs">+</button>
                        <button type="button" class="btn btn-danger mt-4" id="testjs">-</button>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-3">Create</button>
        </form>
    </div>
@endsection
