@extends('layouts.app')

@section('content')


<div id="config">
        <img src="storage/user_image/{{$user->user_image}}" alt="User Image">
        <p>{{$user->name}}</p>

    {!! Form::open(['action' => 'ConfigController@store','enctype'=>'multipart/form-data']) !!}

    <div class="form-group ">
        <div class="wrap">
            <button class="btn btn-secondary btn-lg btn-block">Cambiar Foto</button>
            {!!Form::file('user_image',['class'=>'file'])!!}
        </div>
        {!!Form::submit('Actualizar!',['class'=>'btn btn-primary btn-lg btn-block'])!!}

    </div>
    {{ Form::close() }}
</div>



<br><br>

<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
    <button class="btn btn-danger btn-lg btn-block">{{ __('Logout') }}</button>
</a>


<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

@endsection