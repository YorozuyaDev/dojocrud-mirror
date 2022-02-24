@extends('base')
@section('container')
@if(Session::has('message'))
@if(Session::has('message')==true)
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
                     <table class="table table-hover">
                       <thead>
                        <tr>
                            <th class="table-light" scope="col"> Usuario </th>
                            <th class="table-light" scope="col"> Rol </th>
                            <th class="table-light" scope="col"> Email </th>
                            <th> </th>
                            <th>Matricular</th>
                            <th></th>
                            <th></th>
                            </tr>
                        </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td> {{ $user->name}}</td>
                                @if($user->rol == 'admin')
                                    <td> <span class="bootstrap-badge badge badge-primary">{{ $user->rol }}</span> </td>
                                @else 
                                    <td> {{ $user->rol}} </td>
                                
                                @endif
                                <td> {{ $user->email}} </td>
                                <td>@if(!$user->email_verified_at)
                                    <span class="bootstrap-badge badge badge-warning"> Sin verificar </span> 
                                    @elseif($user->active == 0)
                                <span class="bootstrap-badge badge badge-warning"> Inactivo </span> 
                                @endif </td>
                                <td>
                                    <a href="{{route('enrolment.create', ['id'=>$user->id])}}"><button class="btn btn-success"> Matricular </button></a>
                                </td>
                                 <td>
                                    <form>
                                        <button class="btn btn-primary"> Editar </btn>
                                    </form>
                                </td>
                                <td>
                                   <form action="{{url('user/'.$user->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-danger" type="submit" value="Eliminar">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                </div>
            </div>
        </div>
    
@endsection('container')