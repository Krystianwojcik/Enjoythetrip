<!--
|--------------------------------------------------------------------------
| resources/views/backend/cities/edit.blade.php *** Copyright netprogs.pl | avaiable only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
-->
@extends('layouts.backend') <!-- Lecture 37 -->

<!-- Lecture 37 -->
@section('content')

<h1>Edit city</h1>
<form {{$novalidate}} method="POST" action="{{ route('cities.update', ['city'=>$city->id]) }}">
<h3>Name * </h3>
<input class="form-control" value="{{ $city->name }}" type="text" required name="name"><br>
<button class="btn btn-primary" type="submit">Zapisz</button>   
{{csrf_field()}}
{{method_field('PUT')}}
</form>

@endsection








