<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\enrolment;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::all();
        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {   
        return view('user.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $data=[];
        $enrolments = enrolment::all();

        DB::beginTransaction();
        try {
            foreach($enrolments as $enrolment){
                
                if($enrolment->id_user == $user->id){
                   $enrolment->delete();
                }
            }    
            
        } catch (\Exception $e) {
            DB::rollBack();
            $data['message' ] = 'No se han podido eliminar las dependencias del usuario'. $e;
            return back()->with( $data );
        }
        try {
        $user->delete();
        $data['message'] = 'Se ha eliminado correctamente el usuario';
        } catch(\Exception $e) {
            DB::rollBack();
            $data['message'] = 'No se han podido eliminar el usuario';
            return back()->with($data);
        }
        DB::commit();
        return redirect('user')->with($data);
        
    }
}
