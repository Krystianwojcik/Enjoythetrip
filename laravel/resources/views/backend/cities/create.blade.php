<!--
|--------------------------------------------------------------------------
| resources/views/backend/cities/create.blade.php *** Copyright netprogs.pl | avaiable only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
-->
@extends('layouts.backend') <!-- Lecture 37 -->

<!-- Lecture 37 -->
@section('content')

<h1>Create new city</h1>
<form {{$novalidate}} method="POST" action="{{ route('cities.store') }}">
<h3>Name * </h3>
<input class="form-control" type="text" required name="name"><br>
<button class="btn btn-primary" type="submit">Create</button>
{{csrf_field()}}
</form>

@endsection
