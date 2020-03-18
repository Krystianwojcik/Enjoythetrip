<!--
|--------------------------------------------------------------------------
| resources/views/backend/cities/edit.blade.php *** Copyright netprogs.pl | avaiable only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
-->
@extends('layouts.backend') <!-- Lecture 37 -->

<!-- Lecture 37 -->
@section('content')

<h1>Edit city</h1>
<form method="POST" action="#">
<h3>Name * </h3>
<input class="form-control" type="text" required name="name"><br>
<button class="btn btn-primary" type="submit">Create</button>    
</form>

@endsection








