@extends('layouts.app')

@section('htmlheader_title')
	Edit profile
@endsection


@section('main-content')
<form action="{{ url('user/edit') }}" method="post" enctype="multipart/form-data">
	<div class="form-group">
    	<label for="image">Image (only .jpg)</label>
        <input type="file" name="image" class="form-control" id="image">
    </div>
    <button type="submit" class="btn btn-primary">Save Account</button>
    <input type="hidden" value="{{ Session::token() }}" name="_token">
</form>
@endsection