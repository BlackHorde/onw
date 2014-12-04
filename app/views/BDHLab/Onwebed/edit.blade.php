@extends('bdhlab.onwebed.pages.layout')

@section('content')
<h3>{{{ $page->name }}}</h3>
<p>{{ $page->pageContent()->first()->getContentCachedProcessed() }}</p>
@stop