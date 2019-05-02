@extends('layouts.app')

@section('title', 'Customer detail')

@section('content')
	<div class="row">
		<div class="col-12">
			<p>Customer Detail for {{ $customer->name }}</p>
			<p><a href="/customers/{{ $customer->id }}/edit">Edit</a></p>

			<form action="/customers/{{ $customer->id }}" method="POST">
				@method('DELETE')
				@csrf
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>

		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<p><strong>Name :</strong> {{ $customer->name }}</p>
			<p><strong>Email :</strong> {{ $customer->email }}</p>
			<p><strong>Company :</strong> {{ $customer->company->name }}</p>
		</div>
	</div>
@endsection