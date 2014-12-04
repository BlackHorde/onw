@extends('bdhlab.onwebed.menus.layout')

@section('menu-index') active @stop

@section('content')
<table class='table'>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Updated at</th>
            <th>Created at</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($menus as $menu)
            <tr>
                <td>{{ $menu->id }}</td>
                <td>{{{ $menu->name }}}</td>
                <td>{{ \BDHLab\Onwebed\Classes\Time::timeElapsedString(strtotime($menu->updated_at)) }}</td>
                <td>{{ \BDHLab\Onwebed\Classes\Time::timeElapsedString(strtotime($menu->created_at)) }}</td>
                <td>
                    <a href='{{ URL::to('backend/manage/menus/edit/') }}/{{{ $menu->id }}}' class='btn btn-default'>Edit</a>
                    <a href='{{ URL::to('backend/manage/menus/delete/') }}/{{{ $menu->id }}}' class='btn btn-danger'>Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop