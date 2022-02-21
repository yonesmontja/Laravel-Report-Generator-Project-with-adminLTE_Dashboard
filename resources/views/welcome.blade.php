@extends('adminlte::page')

@section('title', 'EO Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h3>The content goes here.</h3>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
@stop

@section('js')
    <script>
        console.log('Hi There!');
    </script>
@stop
