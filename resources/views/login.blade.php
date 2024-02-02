@extends('layout')
@section('title','login')
@section('content')
<div class="container">
<div class="mt-5">
    @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
      @endif

      @if(Session::has('success'))
      <div class="alert alert-success">
        {{Session::get('success')}}
        @endif
        
      @if(Session::has('error'))
        <div class="alert alert-danger">
          {{Session::get('error')}}
        @endif
  </div>
<form action="{{route('login.post')}}" method="POST" style="width:500px" class="ms-auto me-auto mt-auto">
@csrf
  <div class="mb-3">
    <label  class="form-label">Email address</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
