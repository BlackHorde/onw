@extends('bdhlab.onwebed.pages.layout')

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
        @foreach ($pages as $page)
            <tr>
                <td>{{ $page->id }}</td>
                <td><a href='{{ URL::to('page/') }}/{{ $page->id }}'>{{{ $page->name }}}</a></td>
                <td>{{ \BDHLab\Onwebed\Classes\Time::timeElapsedString(strtotime($page->updated_at)) }}</td>
                <td>{{ \BDHLab\Onwebed\Classes\Time::timeElapsedString(strtotime($page->created_at)) }}</td>
                <td>
                    <a href='{{ URL::to('backend/manage/pages/edit/') }}/{{{ $page->id }}}' class='btn btn-default'>Edit</a>
                    <a href='{{ URL::to('backend/manage/pages/delete/') }}/{{{ $page->id }}}' class='btn btn-danger'>Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop