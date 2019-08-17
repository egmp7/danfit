@extends('layouts.app')

@section('content')

<div id="calendario">
    <h2>CALENDARIO</h2>
    
    <div class="box">
        @for ($i = 1; $i < 29; $i++) 
            <div class = "day">
                <p>{{ $i }}</p>
            </div>
        @endfor
    </div>
</div>

@endsection