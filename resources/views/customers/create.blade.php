@extends('layouts.app')

@section('title', 'Add new customer')

@section('content')
	<div class="row">
		<div class="col-12">
			<p>Add New Customer</p>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<form action="/customers" method="POST">
				@include('customers.form')
				<button type="submit" class="btn btn-outline-primary">Add Customer</button>
			</form>
		</div>
	</div>
@endsection