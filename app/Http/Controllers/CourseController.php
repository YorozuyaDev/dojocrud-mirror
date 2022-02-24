<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\User;
use App\Models\enrolment;
use App\Models\lesson;
use App\Http\Requests\courseCreateRequest;

use DB;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
       $this->middleware('RequireRole:admin')->except('show');
        $this->middleware('RequireEnrolment')->only('show');
    }
    
    public function index()
    {   

        $courses = course::all();
        // $data['maestros'] = DB::table('users')->where('id', $courses->id_user)->first();
        $data['maestros'] = user::all();
        $data['courses'] = $courses;
        return view('course.index')->with($data);
        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
      
        $data['usuarios'] = user::all();
        return view('course.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(courseCreateRequest $request)
    {
        
        $course = new course($request->all()); //inicializo objeto puesto con todos valores request
        $data = [];
        try {
            $course->save();         
            $data['message'] = 'se ha guardado correctamente';
            $data['success'] = true;
        } catch(\Exception $e ) {
            $data['message'] = 'error al guardar' . $e;
            return back()->withInput()->with($data);
        }
        return redirect('course')->with($data); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(course $course)
    {
        // $data = [];
        $data['course'] = $course;
        $data['users'] = user::all();
        $data['enrolments'] = enrolment::all();
        

        return view('course.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(course $course)
    {
        $data['usuarios'] = user::all();
        $data['course'] = $course;
        $data['course'] = $course;
        return view('course.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, course $course)
    {
        $oldname = $course->name;
        try {
            // $course->update($request->all()); 
            $course->update(array('pricing'=>$request->pricing)); 
            $data['message'] = 'se ha actualizado correctamente';
             $data['success'] = true;
        } catch(\Exception $e ) {
            $data['message'] = 'error al actualizar: ' .$e;
            return back()->withInput()->with($data);
        }
        return redirect('course')->with($data); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(course $course)
    {
        
        $data=[];
        $enrolments = enrolment::all();
        DB::beginTransaction();
        try {
            foreach($enrolments as $enrolment){
                if($enrolment->id_course == $course->id){
                   $enrolment->delete();
                }
            }    
            
        } catch (\Exception $e) {
            DB::rollBack();
            $data['message'] = 'No se han podido eliminar las dependencias del curso';
            return back()->with($data);
        }
        try {
         $course->delete();
        } catch(\Exception $e) {
            DB::rollBack();
            $data['message'] = 'No se han podido eliminar el curso';
            return back()->with($data);
        }
        DB::commit();
        return redirect('course')->with($data);
        
    }
}
