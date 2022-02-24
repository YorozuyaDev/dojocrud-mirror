<?php

namespace App\Http\Controllers;
use App\Models\lessonmedia;
use App\Models\lesson;

use DB;

use App\Models\lessonsmedia;
use Illuminate\Http\Request;

class LessonsmediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lessonsmedia.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        
        $lessonmedia = new lessonsmedia ($request-> all());
        $data = [];
        try{
            $lessonmedia->save();
            $data['message'] = 'Post publicado';
        }catch(\Exception $e) {
            $data['message'] = 'Error al publicar el post' . $e;
            return back()->withInput()->with($data);
        }
        return redirect('puestos', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lessonsmedia  $lessonsmedia
     * @return \Illuminate\Http\Response
     */
    public function show(lessonsmedia $lessonsmedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lessonsmedia  $lessonsmedia
     * @return \Illuminate\Http\Response
     */
    public function edit(lessonsmedia $lessonsmedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lessonsmedia  $lessonsmedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lessonsmedia $lessonsmedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lessonsmedia  $lessonsmedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(lessonsmedia $lessonsmedia)
    {
        //
    }
}
