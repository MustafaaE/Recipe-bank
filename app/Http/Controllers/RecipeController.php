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
        if (Auth::check() == true) {
            return view('recipes/create');
        }
        return redirect()->route('home');
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
        if ($request->hasFile('file')) {
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);
            $filename = $request->file('file')->getClientOriginalName();
            $request->file->move('storage/images', $filename);
            $recipe->image = $filename;
        }
        $recipe->title = request('title');
        $recipe->description = request('description');
        $recipe->how_to = request('how_to');
        $recipe->prep_time = request('prep_time');
        $recipe->cooking_time = request('cooking_time');
        $recipe->servings = request('servings');
        $recipe->user_id = Auth::user()->id;

        $category = Category::firstOrCreate(
            ['category' => request('category')]
        );
        $recipe->category_id = $category->id;
        $recipe->save();

        $amount = request('amount');
        $unit = request('unit');
        $i = 0;
        foreach (request('ingredient') as $ing) {
            $ingredient = Ingredient::firstOrCreate(
                ['ingredient' => $ing]
            );
            $this->saveToPivot($recipe, $ingredient, $amount[$i], $unit[$i]);
            $i++;
        }

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
        $category = Category::where('id', $recipe->category_id)->get();
     
        return view('recipes/show', [
            'recipe' => $recipe,
            'category' => $category,
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
        $validInput = $request->all();
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
        $recipe->delete();
        return redirect()->route('home')->with('status', 'Recipe deleted');
    }

    public function saveToPivot(Recipe $recipe, Ingredient $ingredient, $amount, $unit)
    {
        $recipe->ingredients()->attach($ingredient->id, ['amount' => $amount, 'unit' => $unit]);
    }
}
