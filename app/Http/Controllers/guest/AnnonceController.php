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

            return redirect()->route('showAnnonce')->with('success', 'Annonce created successfully.');
        } catch (\Exception $e) {

            return back()->withInput()->withErrors(['error' => 'An error occurred while creating the annonce.']);
        }
    }

    public function modifyForm($id)
    {
        $annonce = Annonce::findOrFail($id);
        return view('layouts.modifyForm', compact('annonce'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Trouver l'annonce à mettre à jour
        $annonce = Annonce::findOrFail($id);

        // Mettre à jour les attributs de l'annonce
        $annonce->title = $validatedData['title'];
        $annonce->description = $validatedData['description'];
        $annonce->user_id = Auth::user()->id;
        $annonce->category_id = $validatedData['category_id'];


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('annonce_images', 'public');
            $annonce->image = $imagePath;
        }


        $annonce->save();


        return redirect()->route('showAnnonce', ['id' => $id])->with('success', 'Annonce updated successfully');
    }

    public function delete(Request $request, $id)
    {
        try {
            $annonce = Annonce::findOrFail($id);
            // on s'assure que l'utilisateur actuel peut supprimer cette annonce s'il le souhaite
            if (auth()->user()->id === $annonce->user_id) {
                $annonce->delete();
                return redirect()->back()->with('success', 'Annonce deleted successfully.');
            } else {
                return redirect()->back()->with('error', 'You do not have permission to delete this annonce.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the annonce.');
        }
    }
}
