@extends('bdhlab.onwebed.menus.layout')

@section('menu-add') active @stop

@section('content')
<h3>Add new menu</h3>
{{ Form::open(array('url' => URL::to('backend/manage/menus/add'), 'method' => 'POST')) }}
<p>{{ Form::text('name', null, array('placeholder' => 'Name', 'class' => 'form-control')) }}</p>
<p>{{ Form::submit('Add', array('class' => 'btn btn-primary')) }}</p>
{{ Form::close() }}
@stop