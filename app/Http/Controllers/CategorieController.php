<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use Validator;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Categorie::with('courses')->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'slug' => 'required|string'
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 200);            
        }

        $categorie = new Categorie();
        $categorie->name = $request->input('name');
        $categorie->slug = $request->input('slug');
        
        $categorie->save();

        return response()->json([
            'success' => 'vous avez réussi à ajouter une catégorie'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorie = Categorie::with('courses')->find($id);

        if($categorie)
        {
            return response()->json([
                'categorie' => $categorie
            ], 200);
        }
        else
        {
            return response()->json([
                'error' => 'cette catégorie n\'éxiste pas ! ' 
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categorie = Categorie::find($id);

        if($categorie)
        {
            $validator = Validator::make($request->all(), [
                'name' => 'string',
                'slug' => 'string'
            ]);
    
            if ($validator->fails()) { 
                return response()->json(['error'=>$validator->errors()], 200);            
            }
    
            if($request->input('name') !== null) $categorie->name = $request->input('name');
            if($request->input('slug') !== null) $categorie->slug = $request->input('slug');
            
            $categorie->save();
    
            return response()->json([
                'success' => 'vous avez réussi à modifier cette catégorie'
            ], 200);
        }
        else
        {
            return response()->json([
                'error' => 'cette catégorie n\'éxiste pas ! ' 
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categorie::find($id);

        if($categorie)
        {
            $categorie->delete();
            return response()->json([
                'success' => 'vous avez réussi à supprimer cette catégorie'
            ], 200);
        }
        else
        {
            return response()->json([
                'error' => 'cette catégorie n\'éxiste pas ! ' 
            ], 404);
        }
    }
}
