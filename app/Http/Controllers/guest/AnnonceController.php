<?php

namespace App\Http\Controllers\guest;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Category;
use App\Models\User;

class AnnonceController extends Controller
{

    public function showAll()
    {
        $annonces = Annonce::with('user', 'category', 'comments')->paginate(4);
        $allCategories = Category::all();


        return view('layouts.welcome', compact('annonces', 'allCategories'));
    }


    public function publish(Request $request)
    {
        return view('layouts.publishForm');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Enregistrement de l'annonce
            $annonce = new Annonce();
            $annonce->title = $validatedData['title'];
            $annonce->description = $validatedData['description'];
            $annonce->user_id = Auth::user()->id;
            $annonce->category_id = $validatedData['category_id'];

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('annonce_images', 'public');
                $annonce->image = $imagePath;
            }

            $annonce->save();

            return redirect()->route('showAnnonce')->with('success', 'Annonce créée avec succès.');
        } catch (\Exception $e) {

            return back()->withInput()->withErrors(['error' => 'Une erreur est survenue lors de la création de l\'annonce.']);
        }
    }
}
