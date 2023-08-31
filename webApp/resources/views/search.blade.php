@extends('layouts.app')

@section('content')

    <div>
        <table class="table">
            <h2 style="color: #0d0a0a">31.08.2023</h2>
            <br>
            <tr>
                <td>Heure départ</td>
                <td>Heure arrivée</td>
                <td>Lieu départ</td>
                <td>Lieu destination</td>
                <td>Prix</td>
                <td></td>
            </tr>

            @foreach($tripInfos as $t)
                <tr>
                    <td>{{ $t->start_time }}</td>
                    <td>{{ $t->end_time }}</td>
                    <td>{{ $t->start_location }}</td>
                    <td>{{ $t->end_location }}</td>
                    <td>{{ $t->price }} CHF</td>
                    <td><a class="button" href="{{ route('searchDetails', ['id' => $t->id]) }}"> Commander </a></td>
                </tr>
            @endforeach

        </table>
    </div>

@endsection




