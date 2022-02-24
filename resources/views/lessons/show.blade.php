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
                    <h1> {{$lesson->title}}</h1>
                    <p>{{$lesson->content}}</p>
                    @if($lesson->mimetype == 'image/jpeg')
                    <div class="user-photo m-b-30">
                        <img class="img-fluid" src="{{ $lessonmedia }}"></img>
                    </div>
                    @else
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="{{$lessonmedia}}" allowfullscreen></iframe>
                    </div>
                    @endif
                </div>
            </div>
            
    </div>
</div>
    
@endsection('container')