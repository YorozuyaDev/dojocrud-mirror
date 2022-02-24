<?php

namespace App\Http\Controllers;

use App\Models\lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
      public function __construct(Request $request){
       $this->middleware('RequireRole:maestro,'. $request->id_course)->except('index','show');
    }
    
    public function index(Request $request)
    {
        $data['lessons'] = lesson::all();
        $data['id_course'] =  $request->id_course;
        return view('lessons.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $data['id_course'] =  $request->id_course;
        return view('lessons.create',$data);
    }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['id_course'] = $request->id;
        $lesson = new lesson($request->all());
        $lesson->id_course = $request->id_course;
        $lesson->grade = $request->grade;
        if($request->hasFile('postmedia')){
            $file = $request->file('postmedia');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('public/images/postmedia', $filename);
              //  $mimetype = $request->file->getMimeType();
            $lesson->filepath = $path;
            $lesson->mimetype = $file->getMimeType();
        }
        try {
            $lesson->save();     
            $data['success'] = true;
            $data['message'] = 'se ha publicado correctamente';
        } catch(\Exception $e ) {
            $data['message'] = 'error al publicar' . $e;
            return back()->withInput()->with($data);
        }
        return redirect('course/'.$request->id)->with($data); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(lesson $lesson)
    {
        $data['lessonmedia'] = url(Storage::url($lesson->filepath));
        $data['lesson'] = $lesson;
        return view('lessons.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(lesson $lesson)
    {
        //
    }
}
