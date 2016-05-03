@extends('layouts.app')

@section('htmlheader_title')
	Profile
@endsection


@section('main-content')
Họ tên: {{$user->name}}
<br>
Email: {{$user->email}}
<br>
Trường: {{$user->school}}
<br>
Ngành: {{$user->major}}
<br>
Kỹ năng: {{$user->getSkills()}}
<br>
Sở thích: {{$user->getHobbies()}}
<br>
<a href=""><button type="button" class="btn btn-primary">Thêm vào nhóm</button></a>
<a><button type="button" class="btn btn-default">Quay về trang quản trị nhóm</button></a>
<br>

@endsection