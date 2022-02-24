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
                        <form class="form-valide" action="#" method="post">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-name">Nombre: </label>
                                    <div class="col-lg-8">
                                            <input type="text" value = "{{ old('nombre') }}" class="form-control" id="val-titulo" name="val-titulo" >
                                    </div>
                                    <label class="col-lg-4 col-form-label" for="val-name">Nueva contraseña: </label>
                                    <div class="col-lg-8">
                                            <input type="password"  class="form-control" id="password" name="password" >
                                    </div>
                                    <label class="col-lg-4 col-form-label" for="val-name">Vuelve a escribir la contraseña: </label>
                                    <div class="col-lg-8">
                                            <input type="password" class="form-control" id="password2" name="password2" >
                                    </div>
                                    <label class="col-lg-4 col-form-label" for="val-name">Correo electrónico: </label>
                                    <div class="col-lg-8">
                                            <input type="email" value = "{{ old('nombre') }}" class="form-control" id="val-titulo" name="val-titulo" >
                                    </div>
                            </div>
                            <div class="form-group row">
                                 <label class="col-lg-4 col-form-label" for="val-name">Antigua contraseña: </label>
                                    <div class="col-lg-8">
                                            <input type="password"  class="form-control" id="old-password" name="old-password" >
                                    </div>
                            </div>
                                       

                            <input class="btn btn-primary" type="submit" value="Editar perfil">
                           
                        </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    
@endsection('container')