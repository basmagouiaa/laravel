<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Exception;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories=Categorie::all();
            return response()->json($categories);
        } catch (Exception $e) {
            return response()->json("probleme de recpereation de la liste des catégorie");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $categorie=new Categorie([
                "nomcategorie"=>$request->input("nomcategorie"),
                "imagecategorie"=>$request->input("imagecategorie")
            ]);
            $categorie->save();
            return   response()->json($categorie);
        } catch (Exception $e) {
            return response()->json("insertion impossible");
        }
    }

    public function show($id)
    {
        try {
            $categorie= Categorie::findOrFail($id);
            return   response()->json($categorie);
        } catch (Exception $e) {
            return response()->json("insertion impossible");
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $categorie= Categorie::findOrFail($id);
            $categorie->update($request->all());
            return   response()->json($categorie);
        } catch (Exception $e) {
            return response()->json("insertion impossible");
        }
    }
    


    public function destroy($id)
    {
        try {
            $categorie= Categorie::findOrFail($id);
            $categorie->delete();
            return   response()->json("categorie supprimer");
        } catch (Exception $e) {
            return response()->json("insertion impossible");
        }
    }
}
