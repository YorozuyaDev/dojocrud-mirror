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
                    <h1> {{$course->name}}</h1>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                       <thead>
                        <tr>
                            <th class="table-light" scope="col"> Alumno </th>
                            <th class="table-light" scope="col"> Grado </th>
                            <th class="table-light" scope="col"></th>
                        </tr>
                        </thead>
                    <tbody>
                        @foreach($enrolments as $enrolment)
                        <tr>
                            @if($enrolment->id_course == $course->id)
                                <td>
                                    @foreach($users as $user)
                                    @if($user->id == $enrolment->id_user)
                                        {{$user->name}}
                                    @endif
                                    @endforeach
                                </td>
                                <td> {{$enrolment->grade}}</td>
                                <td> {{$enrolment->created_at->format('j F, Y')}}</td>
                                @endif
                                <td>@endforeach</td>
                        </tr>
   
                    </tbody>
                </div>
            </div>
        </div>
    
@endsection('container')