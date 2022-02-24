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
                                <label class="col-lg-4 col-form-label" for="val-titulo">Título <span class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                            <input type="text" value = "{{ old('nombre') }}" class="form-control" id="val-titulo" name="val-titulo" placeholder="Titulo..">
                                    </div>
                            </div>
                            <label class="col-lg-4 col-form-label" for="val-nivel">Nivel <span class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <select value = "{{ old('nombre') }}"  class="js-select2 form-control" id="val-nivel" name="val-nivel" style="width: 100%;">
                                           <option value="html">Básico</option>
                                        </select>
                                    </div> 
                             <div class="col-lg-8">       
                                <input type="file" id="myFile" name="filename">
                            </div>
                                       

                            <input class="btn btn-primary" type="submit" value="Subir medios">
                           
                        </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    
@endsection('container')