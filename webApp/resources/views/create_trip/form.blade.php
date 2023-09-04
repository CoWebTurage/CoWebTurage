@extends('layouts.app')
@section('content')
    @auth
        <form action="{{route('create-trip')}}" method="POST">
            @csrf
            <table class="table">
                <tr>
                    <td>
                        <div>
                            <p class="booking-title">{{__("Departure")}}</p>
                            <div class="form-wrap">
                                <input class="form-input" id="start_location" type="text" name="start_location"
                                       required>
                                <label class="form-label" for="start_location">{{__("Location")}}</label>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div>
                            <p class="booking-title">{{__("Destination")}}</p>
                            <div class="form-wrap">
                                <input class="form-input" id="end_location" type="text" name="end_location" required>
                                <label class="form-label" for="end_location">{{__("Location")}}</label>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div>
                            <p class="booking-title">{{__("Date")}}</p>
                            <div class="form-wrap form-wrap-icon">
                                <input class="form-input" id="date" type="text" name="date" data-time-picker="date"
                                       required>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div>
                            <p class="booking-title">{{__("Departure Time")}}</p>
                            <div class="form-wrap form-wrap-icon">
                                <input class="form-input" id="start_time" type="time" name="start_time"
                                       data-time-picker="time" required>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div>
                            <p class="booking-title">{{__("Arrival Time")}}</p>
                            <div class="form-wrap form-wrap-icon">
                                <input class="form-input" id="end_time" type="time" name="end_time"
                                       data-time-picker="time" required>
                            </div>
                        </div>
                    </td>

                </tr>

                <tr>
                    <td>
                        <div>
                            <p class="booking-title">{{__("Vehicle")}}</p>
                            <div class="form-wrap">
                                <select data-placeholder="Sélectionner votre véhicule" id="vehicle" name="vehicle"
                                        required>
                                    <option label="placeholder"></option>
                                    @foreach($vehicles as $vehicle)
                                        <option>{{$vehicle}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div>
                            <p class="booking-title">{{__("Price")}}</p>
                            <div class="form-wrap">
                                <input class="form-input" id="price" type="number" name="price" required>
                                <label class="form-label" for="price">{{__("Price")}}</label>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>

            <div class="form-wrap form-wrap-icon">
                <button class="button button-lg button-gray-600" type="submit">{{__("Create Trip")}}</button>
            </div>
        </form>

    @endauth

    @guest
        <script>
            window.alert({{__("Log in to your account to perform this operation")}});
            window.location = '/login';
        </script>
    @endguest
@endsection
