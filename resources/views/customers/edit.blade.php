@extends('layouts.app')

@section('title', 'Edit Detail for' . $customer->name)

@section('content')
	<div class="row">
		<div class="col-12">
			<p>Edit Customer {{$customer->name}} </p>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<form action="{{ route('customers.update', ['customer' => $customer]) }}" method="POST">
				@method('PATCH')
				@include('customers.form')
				<button type="submit" class="btn btn-outline-primary">Edit Customer</button>
			</form>
		</div>
	</div>
@endsection