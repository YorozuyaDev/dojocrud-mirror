<?php

namespace App\Http\Controllers;
use App\Models\course;
use App\Models\User;
use App\Models\enrolment;
use Illuminate\Http\Request;

use DB;
class EnrolmentController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
    
        //obtengo el id del user buscado
        $search = $request->input('search');
        // $user_id = User::where('name','like','%'.$search.'%') -> first() -> id;
        
        if($search){
              $id_user = User::where('name','like','%'.$search.'%') -> first();
              if($id_user){
                  $id_user = $id_user->id;
              }
              $id_course = course::where('name','like','%'.$search.'%') -> first();
              if($id_course){
                  $id_course = $id_course->id;
              }
                // $id_course = course::where('name','like','%'.$search.'%') -> first();   
                // if($id_course){
                //     $id_course = $id_course->id;
                // }
                $enrolments = enrolment::where('id_course', $id_course)->orWhere('id_user', $id_user)->get();
                if(count($enrolments)==0) {
                    $data['message'] = 'Nigún resultado';
                }
                
                $data['enrolments'] = $enrolments; 
                $users = user::all();
                $data['users'] = $users; 
                $courses = course::all();
                $data['courses'] = $courses; 
                return redirect('enrolment')->withInput()->with($data);
        }
        // $enrolments = DB::table('users')
        //                 ->select('id_user','created_at','id_course')
        //                 ->where()
        $enrolments = enrolment::paginate(2);
        $data['enrolments'] = $enrolments; 
         $users = user::all();
        $data['users'] = $users; 
         $courses = course::all();
        $data['courses'] = $courses; 
        return view('enrolment.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $data['cursos'] = course::all();
        $data['usuarios'] = user::all();
        $data['id_user'] = $request->id;

        $data['id_name'] = User::where('id', $request->id)->first()->name;
        return view('enrolment.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
        $enrolment = new enrolment();
        $enrolment->id_user =  $request->user_id;
        $enrolment->id_course = $request->id_course;
        try {
            $enrolment->save();     
            $data['success'] = true;
            $data['success'] = true;
            $data['message'] = 'se ha matriculado correctamente';
        } catch(\Exception $e ) {
            $data['message'] = 'error al matricular' . $e;
            return back()->withInput()->with($data);
        }
        return redirect('user')->with($data); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\enrolment  $enrolment
     * @return \Illuminate\Http\Response
     */
    public function show(enrolment $enrolment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\enrolment  $enrolment
     * @return \Illuminate\Http\Response
     */
    public function edit(enrolment $enrolment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\enrolment  $enrolment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, enrolment $enrolment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\enrolment  $enrolment
     * @return \Illuminate\Http\Response
     */
    public function destroy(enrolment $enrolment)
    {
         
        $data=[];
        try {
         $enrolment->delete();
         $data['message'] = 'Se ha desmatriculado correctamente';
        
        } catch(\Exception $e) {
            DB::rollBack();
            $data['message'] = 'No se han podido desmatricular';
            return redirect('enrolment')->with($data);
        }
        DB::commit();
        $data['success'] = true;
        return redirect('enrolment')->with($data);
        
    }
}
