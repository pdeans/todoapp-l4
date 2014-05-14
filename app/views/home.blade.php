@extends('layouts.main')


@section('content')

   <h1>To-Do List:&nbsp;&nbsp;<small>(<a href="{{ URL::route('new') }}">New Task</a>)</small></h1>

   <ul>
      @foreach($items as $item)
         <li>
            {{ Form::open() }}
               <input
                  type="checkbox"
                  onClick="this.form.submit()"
                  {{ $item->done ? 'checked' : ''}}
               />

               <input type="hidden" name="id" value="{{ $item->id }}" />

               {{ e($item->name) }}&nbsp;
               <small>(<a class="delete" href="{{ URL::route('delete', $item->id) }}">x</a>)</small>
            {{ Form::close() }}
         </li>
      @endforeach
   </ul>

@stop
