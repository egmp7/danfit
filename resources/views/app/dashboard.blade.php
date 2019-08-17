@extends('layouts.app')

@section('content')

{{-- USER --}}
<div id="user">
    <div class="row align-items-center">
        <div class="col-3">
            <img src="storage/user_image/{{$user->user_image}}" alt="user_img">
        </div>
        <div class="col-9">
            <div class="user-info">
            <p>{{$user->name}}</p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%"
                        aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><span>Progreso Completado</span></div>
                </div>
                <p>DÍA 1</p>
            </div>
        </div>
    </div>
</div>
{{-- TODAY'S WORKOUT --}}
<div id="today">
    <h2>WORKOUT DEL DÍA</h2>
    <img src="{{asset('img/workout.jpg')}}" alt="Workout del dia">
    <h3>NOMBRE DEL WORKOUT</h3>
    <div class="row">
        <div class="col-md-8">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id non sed debitis possimus quasi sit illum
                asperiores,
                tempore sunt eos blanditiis, ad vel enim libero animi earum! Dolorem, voluptas unde.</p>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary btn-lg btn-block">Empezar</button>
        </div>
    </div>
</div>



@endsection