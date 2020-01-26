<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Validator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Course::with('categorie')->paginate(10);
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
            'categorie_id' => 'required|exists:categories',
            'name' => 'required|string',
            'description' => 'nullable',
            'slug' => 'required|string'
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 200);            
        }

        $course = new Course();
        $course->categorie_id = $request->input('categorie_id');
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->slug = $request->input('slug');
        
        $course->save();

        return response()->json([
            'success' => 'vous avez réussi à ajouter un cours'
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
        $course = Course::with('categorie')->find($id);

        if($course)
        {
            return response()->json([
                'course' => $course
            ], 200);
        }
        else
        {
            return response()->json([
                'error' => 'ce cours n\'éxiste pas ! ' 
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
        $course = Course::with('categorie')->find($id);

        if($course)
        {
            $validator = Validator::make($request->all(), [
                'categorie_id' => 'exists:categories',
                'name' => 'string',
                'description' => 'nullable',
                'slug' => 'string'
            ]);
    
            if ($validator->fails()) { 
                return response()->json(['error'=>$validator->errors()], 200);            
            }
    
            if($request->input('categorie_id') !== null) $course->categorie_id = $request->input('categorie_id');
            if($request->input('name') !== null) $course->name = $request->input('name');
            if($request->input('description') !== null) $course->description = $request->input('description');
            if($request->input('slug') !== null ) $course->slug = $request->input('slug');
            
            $course->save();
    
            return response()->json([
                'success' => 'vous avez réussi à modifier ce cours'
            ], 200);
        }
        else
        {
            return response()->json([
                'error' => 'ce cours n\'éxiste pas ! ' 
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
        $course = Course::find($id);

        if($course)
        {
            $course->delete();
            return response()->json([
                'success' => 'vous avez réussi à supprimer ce cours'
            ], 200);
        }
        else
        {
            return response()->json([
                'error' => 'ce cours n\'éxiste pas ! ' 
            ], 404);
        }
    }
}
