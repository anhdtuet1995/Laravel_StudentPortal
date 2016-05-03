@extends('layouts.app')

@section('htmlheader_title')
	Group
@endsection


@section('main-content')
Tên nhóm: {{$group->name}}
Mô tả nhóm: {{$group->description}}
Link github: {{$group->github}}
Các thành viên:
@foreach($group->users()->get() as $user)
{{$user->name }}

<a><button type="button" class="btn btn-primary">Tham gia nhóm</button></a>
@endforeach
@endsection