@extends('base')
@section('container')
@if(Session::has('message'))
@if(session()->get('success'))
<div class="alert alert-success" role="alert">
    {{ session()->get('message') }}
</div>
@else
<div class="alert alert-danger" role="alert">
    {{ session()->get('message') }}
</div>
@endif
@endif
<div class="row">
    <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{url('course/create')}}"><button class="btn btn-success"> Crear curso</button></a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                     <table class="table table-hover">
                       <thead>
                        <tr>
                            <th class="table-light" scope="col"> Curso </th>
                            <th class="table-light" scope="col"> Cuota </th>
                            <th class="table-light" scope="col"> Instructor </th>
                            <th></th>
                            </tr>
                        </thead>
                    <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td> {{ $course->name}} </td>
                                <td> {{ $course->pricing}}$ </td>
                                <td> 
                                @foreach($maestros as $maestro)
                                    @if( $maestro->id == $course->id_user )
                                     {{$maestro->name}}
                                    @endif
                                @endforeach
                                </td>
                                 <td style="width: 100px;">
                                    <form  style="width: fit-content;">
                                        <a style="color: white;" href="{{url('course/'.$course->id.'/edit')}}"><button class="btn btn-primary" > Editar </btn></a>
                                    </form>
                                </td>
                                <td style="width: 100px;">
                                   <form action="{{url('course/'.$course->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-danger" type="submit" value="Eliminar">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    
@endsection('container')