@extends('layouts.admin')

@section('title')
    Academix | Analytics
@stop

@section('param')
    Analytics
@stop

@section('header')
    <h1>{{ __('Analytics') }}</h1>
@stop

@section('content')

    <body>
        <button id="fetchDataButton" type="button" class="btn btn-primary btn-hover m-3">Load data</button>
        <canvas id="myChart" height="100px" class="m-3"></canvas>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="{{ asset('dist/js/chart.js') }}"></script>
    </body>

@stop
