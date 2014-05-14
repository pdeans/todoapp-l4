@extends('layouts.main')


@section('content')
   <h1>Create New Task</h1>

   @foreach($errors->all() as $error)
      <p class="error">{{ $error }}</p>
   @endforeach

   {{ Form::open() }}
      <input type="text" name="name" placeholder="Name of your task" />
      <input type="submit" value="Create" />
   {{ Form::close() }}
@stop
