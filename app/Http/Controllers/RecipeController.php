<?php

namespace App\Http\Controllers;

use App\Models\Category;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Auth;
use App\Models\Ingredient;


class RecipeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::latest()->get();
        return view('home', [
            'recipes' => $recipes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe = new Recipe();
        $recipe->title = request('title');
        $recipe->description = request('description');
        $recipe->how_to = request('how_to');
        $recipe->prep_time = request('prep_time');
        $recipe->cooking_time = request('cooking_time');
        $recipe->servings = request('servings');
        $recipe->user_id = Auth::user()->id;

        // $validInput = $request->validate([
        //     'title' => 'required|min:3',
        //     'description' => 'required',
        //     'how_to' => 'required',
        //     'prep_time' => 'required',
        //     'cooking_time' => 'required',
        //     'servings' => 'required',

        // ]);
        //  $amount = request('amount');
        //$unit = request('unit');
        //$recipe = Recipe::find(0)
        // $recipe->ingredients()->attach([$amount, $unit]);
        $recipe->save();

        $category = new Category();
        $category->category = request('category');
        $category->recipe_id = $recipe->id;
        $category->save();

        //$ingredient = new Ingredient();
        //$ingredient->ingredient = request('ingredient');
        //$ingredient->save();
        // $recipe->ingredients(['amount' =>  request('amount'), 'unit'=> request('unit')]);
        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('recipes/show', [
            'recipe' => $recipe,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        return view('recipes/edit', [
            'recipe' => $recipe,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $validInput = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $recipe->update($validInput);


        return redirect()->route('recipes.show', ['recipe' => $recipe]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
