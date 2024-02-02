@extends('layout')
@section('title','home')
@section('content')
{{Auth()->user()}}
@endsection