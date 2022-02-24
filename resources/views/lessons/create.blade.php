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
                    <div class="form-validation">
                        <form class="form-valide" action="{{url('lesson')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                               
                                <label class="col-lg-4 col-form-label" for="post_title">Título del post: </label>
                                    <div class="col-lg-8">
                                            <input type="text" value = "{{ old('title') }}" class="form-control" id='title' name='title' >
                                    </div>
                                        <input type="hidden" value = "{{ $id_course }}" class="form-control" id='id-course' name='id_course' >
              
                            </div>
                            <label class="col-lg-4 col-form-label" for="id_user">Contenido: </label>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                    <textarea class="form-control" rows="10" cols="50" name="content" id="content"></textarea>
                                    </div>
                                </div>
                                  <label class="col-lg-4 col-form-label" for="id_user">Medio: </label>
                                    <div class="col-lg-8">
                                    <div class="form-group">
                                       <label class="form-label" for="customFile">Default file input example</label>
                                        <input type="file" name='postmedia' id='postmedia' class="form-control" id="customFile" />
                                    </div>
                                    <label class="col-lg-4 col-form-label" for="id_user">Nivel: </label>
                                     <select id='grade' name='grade'>  
                                        <option value="6 Kyu">6 Kyu</option>
                                        <option value="5 Kyu">5 Kyu</option>
                                        <option value="4 Kyu">4 Kyu</option>
                                        <option value="3 Kyu">3 Kyu</option>
                                        <option value="2 Kyu">2 Kyu</option>
                                        <option value="1 Kyu">1 Kyu</option>
                                        <option value="1 Dan">1 Dan</option>
                                        <option value="2 Dan">2 Dan</option>
                                        <option value="3 Dan">3 Dan</option>
                                        <option value="4 Dan">4 Dan</option>
                                    </select>
                                </div>
                                       
                                </div>
                            <input class="btn btn-primary" type="submit" value="Matricular">
                        </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    
@endsection('container')