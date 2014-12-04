@extends('bdhlab.onwebed.extensions.layout')

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
        @foreach ($extensions as $extension)
            <tr>
                <td>{{ $extension->id }}</td>
                <td><code>{{{ $extension->prefix }}}</code> {{{ $extension->name }}}</td>
                <td>{{ \BDHLab\Onwebed\Classes\Time::timeElapsedString(strtotime($extension->updated_at)) }}</td>
                <td>{{ \BDHLab\Onwebed\Classes\Time::timeElapsedString(strtotime($extension->created_at)) }}</td>
                <td>
                    <a href='{{ URL::to('backend/manage/extensions/edit/') }}/{{{ $extension->id }}}' class='btn btn-default'>Edit</a>
                    <a href='{{ URL::to('backend/manage/extensions/delete/') }}/{{{ $extension->id }}}' class='btn btn-danger'>Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop