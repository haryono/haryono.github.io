@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Edit Company
@parent
@stop

@section('header_styles')
@stop

@section('content')

	<div class="container">
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div><br />
		@endif
		    <div class="row">
			    <form action="{{action('TestController@update', $id)}}" method="post" >
			        {{csrf_field()}}
			        <input name="_method" type="hidden" value="post">
			        <div class="form-group">
			            <input type="hidden" value="{{csrf_token()}}" name="_token" />
			            <label for="title">Company Name:</label>
			            <input type="text" class="form-control" name="company_name" value="{{$ra->company_name}}" />
			        </div>
			        <div class="form-group">
			            <label for="description">Company Initial:</label>
			            <textarea cols="5" rows="5" class="form-control" name="company_initial">{{$ra->company_initial}}</textarea>
			        </div>
			        <button type="submit" class="btn btn-primary">Update</button>
		        </form>
		    </div>
	<div>
@stop

@section('footer_scripts')
@stop