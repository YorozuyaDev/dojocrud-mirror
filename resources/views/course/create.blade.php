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
                        <form class="form-valide" action="{{url('course')}}" method="post">
                            @csrf
                            <div class="form-group row">
                               
                                <label class="col-lg-4 col-form-label" for="val-name">Nombre: </label>
                                    <div class="col-lg-8">
                                            <input type="text" value = "{{ old('name') }}" class="form-control" id='name' name='name' >
                                    </div>
                                    <label class="col-lg-4 col-form-label" for="val-name">Cuota: </label>
                                    <div class="col-lg-8">
                                            <input type="number" class="form-control" value = "{{ old('pricing') }}" id='pricing' name='pricing'>
                                    </div>
                            </div>
                            @error('name')
                                <div style="background:color: red">{{ $message }}</div>
                            @enderror
                            <label class="col-lg-4 col-form-label" for="id_user">Maestro: </label>
                                <div class="col-lg-8">
                                <div class="col-lg-8">
                                    <select id='id_user' name='id_user'>  
                                        @foreach($usuarios as $usuario)
                                        @if($usuario->rol == 'admin' || $usuario->rol == 'maestro')
                                            <option value="{{ $usuario->id}}">{{ $usuario->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    </div>
                                    @error('pricing')
                                        <div style="background:color: red">{{ $message }}</div>
                                    @enderror
                                    </div>
                            <input class="btn btn-primary" type="submit" value="Crear curso">
                        </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    
@endsection('container')