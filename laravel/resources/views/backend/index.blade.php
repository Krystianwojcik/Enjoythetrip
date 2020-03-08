<!--
|--------------------------------------------------------------------------
| resources/views/backend/index.blade.php *** Copyright netprogs.pl | available only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
-->
@extends('layouts.backend') <!-- Lecture 5 -->

@section('content') <!-- Lecture 5 -->
<h2 class="sub-header">Booking calendar</h2>

@foreach($objects as $o=>$object)
@php ($o++)
    <h3 class="red">{{$object->name}} object</h3>


    @foreach($object->rooms as $r=>$room)

        <h4 class="blue"> Room {{ $room->room_number }}</h4>

        <div class="row top-buffer">
            <div class="col-md-3">
                <div class="reservation_calendar{{$o.$r}}"></div>
            </div>
            <div class="col-md-9">
                <div class="center-block loader loader_{{$o.$r}}" style="display: none;"></div>
                <div class="hidden_{{$o.$r}}" style="display: none;">


                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Room number</th>
                                    <th>Check in</th>
                                    <th>Check out</th>
                                    <th>Guest</th>
                                    @if(Auth::user()->hasRole(['owner','admin']))
                                    <th>Confirmation</th>
                                    @endif
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>3</td>
                                    <td>12/02/2012</td>
                                    <td>12/03/2015</td>
                                    <td><a target="_blank" href="{{ route('person', 1) }}">John</a></td>
                                    @if(Auth::user()->hasRole(['owner','admin']))
                                    <td><a href="#" class="btn btn-primary btn-xs">Confirm</a></td>
                                    @endif
                                    <td><a href=""><span class="glyphicon glyphicon-remove"></span></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <hr>

    @endforeach

@endforeach
@endsection <!-- Lecture 5 -->


