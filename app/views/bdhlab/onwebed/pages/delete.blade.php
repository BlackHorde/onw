@extends('bdhlab.onwebed.pages.layout')

@section('menu-index') active @stop

@section('content')
<p>Are you sure you want to delete the page named <b>{{{ $page->name }}}</b>?</p>
{{ Form::open(array('url' => URL::to('backend/manage/pages/delete'), 'method' => 'POST')) }}
{{ Form::hidden('id', $page->id) }}
<p>{{ Form::submit('Yes', array('class' => 'btn btn-danger')) }} <a href='{{ URL::to('backend/manage/pages') }}' class='btn btn-default'>Cancel</a></p>
{{ Form::close() }}
@stop