@extends('base')
@section('container')
@if(Session::has('message')) 
@if($success)
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
                    <h5>Matriculando a {{ $id_name }}</h5>
                    <div class="form-validation">
                        <form class="form-valide" action="{{url('enrolment')}}" method="post">
                            @csrf
                             <input type="hidden" value = "{{ $id_user }}" class="form-control" id='user_id' name='user_id' >
                            <div class="form-group row">
                               
                                <!--<label class="col-lg-2 col-form-label" for="name">Alumno (email): </label>-->
                                <!--    <div class="col-lg-6">-->
                                <!--            <input type="text" value = "{{ old('email') }}" class="form-control" id='email' name='email' >-->
                                <!--    </div>-->
                            
                                  
                            </div>
                            <label  style = "display: inline-block;" class="col-lg-2 col-form-label" for="id_course">Curso: </label>
                                <div class="col-lg-6">
                                        <select style = "display: inline;" id='id_course' name='id_course' class="form-control form-control-lg">  
                                        @foreach($cursos as $curso)
                                            <option value="{{ $curso->id}}">{{ $curso->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                            <input class="btn btn-primary" type="submit" value="Matricular">
                        </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    
@endsection('container')