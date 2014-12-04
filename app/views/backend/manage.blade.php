@extends('backend.layout')
@section('menu-manage') active @stop
@section('stylesheets') <link rel='stylesheet' href='{{ URL::asset('css/backend/manage.css') }}'> @stop
@section('content')
    <?php $count = 1; $row_limit = 6; $i = 1; ?>

    @foreach ($management_items as $management_item)
        @if ($count == 1) <div class='row'> @endif
            <div class='col-md-{{ 12/$row_limit }}{{ ($i&1) ? ' active' : ''  }}'>
                <a href='{{{ URL::to('backend/manage/'.$management_item->link) }}}'>
                    <div class='management_item'>
                        <div class='name'>{{{ $management_item->name }}}</div>
                        <img class='icon' src='{{{ URL::asset($management_item->icon) }}}'>
                    </div>
                </a>
            </div>
        @if ($count == $row_limit) </div> <?php $count = 1; ?> @else <?php $count++; ?> @endif
        <?php $i++; ?>
    @endforeach
    @if ($count != 1)
        </div>
    @endif
@stop