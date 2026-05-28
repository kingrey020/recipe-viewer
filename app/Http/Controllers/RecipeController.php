<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class RecipeController extends Controller
{
    // The base URL and Key should be defined once
    private $supabaseUrl = 'https://sotdiljcrxyajucncvvu.supabase.co/rest/v1';
    private $serviceKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InNvdGRpbGpjcnh5YWp1Y25jdnZ1Iiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc3Njk3NTMxMiwiZXhwIjoyMDkyNTUxMzEyfQ.YJIcLzecr070WX9flL4EZb5LMYX2xjnDKAkysoFCgxQ'; // Replace with your actual key

    public function index()
    {
        $response = Http::withHeaders([
            'apikey' => $this->serviceKey,
            'Authorization' => 'Bearer ' . $this->serviceKey,
            'Prefer' => 'return=representation'
        ])->get($this->supabaseUrl . '/recipes?select=*');

        $recipes = $response->successful() ? $response->json() :[];

        return view('recipes', compact('recipes'));
    }

    public function show($id)
    {
        // Fetch a specific recipe by ID
        $response = Http::withHeaders([
            'apikey' => $this->serviceKey,
            'Authorization' => 'Bearer ' . $this->serviceKey,
        ])->get($this->supabaseUrl . '/recipes?id=eq.' . $id);

        // Supabase returns an array of results, we take the first one
        $recipeData = $response->json();
        $recipe = (!empty($recipeData)) ? $recipeData[0] : null;

        if (!$recipe) {
            abort(404, 'Recipe not found');
        }

        return view('recipe-detail', compact('recipe'));
    }
}