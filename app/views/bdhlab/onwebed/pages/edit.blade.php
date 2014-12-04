@extends('bdhlab.onwebed.pages.layout')

@section('content')
<h3>{{{ $page->name }}}</h3>
<div class='container-fluid'>{{ $page->pageContent()->first()->getContentCachedProcessed() }}</div>
@stop