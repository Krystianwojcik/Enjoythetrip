<!--
|--------------------------------------------------------------------------
| resources/views/backend/cities/index.blade.php *** Copyright netprogs.pl | available only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
-->
@extends('layouts.backend') <!-- Lecture 37 -->

 <!-- Lecture 37 -->
@section('content')
<h1>Cities <small><a class="btn btn-success" href="{{ route('cities.create') }}" data-type="button"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>New city </a></small></h1>

<div class="table-responsive">
    <table class="table table-hover table-striped">
        <tr>
            <th>City name</th>
            <th>Edit / Delete</th>
        </tr>
        @foreach($cities as $city )
            <tr>
                <td>{{ $city->name }}</td>
                <td>
                    <a href="{{ route('cities.edit',['city'=>$city->id]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <form style="display: inline;" method="post" action="{{ route('cities.destroy', ['city'=>$city->id]) }}">
                    <button type="submit" class="btn btn-primary btn-xs" onclick="return confirm('Are you sure?');"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>



@endsection
