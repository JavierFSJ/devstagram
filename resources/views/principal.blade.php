@extends('layouts/app')

@section('titulo')
    Principal
@endsection


@section('contenido')
    <x-lista-post :posts="$posts" />
@endsection
