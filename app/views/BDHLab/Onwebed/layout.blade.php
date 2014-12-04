@extends('backend.layout')

@section('main-menu')
<li class="@yield('menu-index')"><a href='{{ URL::to('backend/manage/pages') }}'><span class='glyphicon glyphicon-list'></span> Index</a></li>
<li class="@yield('menu-add')"><a href='{{ URL::to('backend/manage/pages/add') }}'><span class='glyphicon glyphicon-plus'></span> Add</a></li>
<li><a href='{{ URL::to('backend/manage') }}'><span class='glyphicon glyphicon-arrow-left'></span> Back to <b>Manage</b></a></li>
@stop