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
                    <div class="row">
                         <div class="col-lg-6">
                          <h1>Lecciones</h1>
                        </div>
                        <div class="col-lg-2"> 
                            <a href="{{route('lesson.create', ['id_course'=>1])}}"><button class="btn btn-success"> Nuevo </button></a>
                        </div>
                    </div>
                  
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                     <table class="table table-hover">
                       <thead>
                        <tr>
                            <th class="table-light" scope="col"> Lección </th>
                            <th class="table-light" scope="col"> Grado </th>
                            <th class="table-light" scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($lessons as $lesson)
                            <tr>
                                    @if($lesson->id_course == $id_course)
                                        <td><a href="{{ url('lesson/'.$lesson->id) }}">{{$lesson->title}}</a></td>
                                        <td><span class="bootstrap-badge badge badge-{{ str_replace(" ","",$lesson->grade) }}" >{{$lesson->grade}}</span></td>
                                    @endif
                            </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
@endsection('container')