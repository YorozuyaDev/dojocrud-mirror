@extends('base')
@section('container')
@if(Session::has('message'))
<div class="alert alert-dark" role="alert">
    {{ session()->get('message') }}
</div>
@endif
<div class="card">
  <div class="card-body">
         <form action= "{{route('enrolment.index')}}" method="get">
             <div class ="row">
                 <div class="col-lg-8">
                       <input class="form-control form-control-lg" type="text" name="search" placeholder="búsqueda..."></input>
                 </div> 
                 <input type="submit" class="btn btn-primary" value="Buscar"> </input>
             </div>
         </form> 
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                     <table class="table table-hover">
                       <thead>
                        <tr>
                            <th class="table-light" scope="col"> Alumno </th>
                            <th class="table-light" scope="col"> Curso </th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                    <tbody>
                        @foreach($enrolments as $enrolment)
                            <tr>
                                <td> 
                                    @foreach($users as $user)
                                    @if( $enrolment->id_user == $user->id )
                                     {{$user->name}}
                                    @endif
                                    @endforeach
                                </td>
                                <td> 
                                @foreach($courses as $course)
                                    @if( $enrolment->id_course == $course->id )
                                     {{$course->name}}
                                    @endif
                                @endforeach
                                </td>
                               
                                 <td>
                                    <form style="display: inline;" >
                                        <button class="btn btn-primary"> Editar </btn>
                                    </form>
                                   
                                </td>
                                <td>
                                    <form  style="display: inline;"  action="{{url('enrolment/'.$enrolment->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-danger" type="submit" value="Eliminar">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                        <div class ="row">
                             <div class="col-lg-10">
                               {{$enrolments->links()}}
                            </div>
                            </div>
                            
                </div>
            </div>
        </div>
    
@endsection('container')