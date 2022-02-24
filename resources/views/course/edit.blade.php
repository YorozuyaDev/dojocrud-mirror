@extends('base')
@section('container')
@if(Session::has('message')) 
<div class="alert alert-danger" role="alert">
    {{ session()->get('message') }}
</div>
@endif
<div class="row">
    <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="{{url('course/'.$course->id)}}" method="post">
                             @csrf
                            @method('put')
                            <div class="form-group row">
                                    <div class="col-lg-8">
                                        <h5>{{ old('name', $course->name) }}</h5>
                                    </div>
                                    <div class="col-lg-8">
                                    <label class="col-lg-4 col-form-label" for='pricing'>Cuota: </label>
                                            <input type="number" class="form-control" value = "{{ old('pricing', $course->pricing) }}" id='pricing' name='pricing'>
                                    </div>
                            </div>
                            <label class="col-lg-4 col-form-label" for="id_user">Maestro: </label>
                                <div class="col-lg-8">
                                <div class="col-lg-8">
                                    <select id='id_user' name='id_user'>  
                                        @foreach($usuarios as $usuario)
                                        @if( $usuario->id == $course->id_user )
                                         <option value = "{{ old('nombre', $usuario->name) }}" selected>{{ $usuario->name }}</option>
                                        @endif
                                        @endforeach
                                        @foreach($usuarios as $usuario)
                                        @if(($usuario->rol == 'admin' || $usuario->rol == 'maestro')&& ($usuario->id != $course->user_id))
                                            <option value="{{ $usuario->id}}">{{ $usuario->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    </div>
                                    </div>
                            <input class="btn btn-primary" type="submit" value="Modificar">
                        </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    
@endsection('container')