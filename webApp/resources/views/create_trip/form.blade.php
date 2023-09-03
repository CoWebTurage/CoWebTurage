@extends('layouts.app')
@section('content')
    @auth
        <form action="{{route('create-trip')}}" method="POST">
            @csrf
            <table class="table">
                <tr>
                    <td>
                        <div>
                            <p class="booking-title">{{__("Départ")}}</p>
                            <div class="form-wrap">
                                <input class="form-input" id="start_location" type="text" name="start_location"
                                       required>
                                <label class="form-label" for="start_location">{{__("Lieu")}}</label>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div>
                            <p class="booking-title">{{__("Destination")}}</p>
                            <div class="form-wrap">
                                <input class="form-input" id="end_location" type="text" name="end_location" required>
                                <label class="form-label" for="end_location">{{__("Lieu")}}</label>
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
                            <p class="booking-title">{{__("Heure départ")}}</p>
                            <div class="form-wrap form-wrap-icon">
                                <input class="form-input" id="start_time" type="time" name="start_time"
                                       data-time-picker="time" required>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div>
                            <p class="booking-title">{{__("Heure arrivée")}}</p>
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
                            <p class="booking-title">{{__("Nb. passagers")}}</p>
                            <div>
                                <select data-placeholder="1" id="nbPassenger" name="nbPassenger" required>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                </select>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div>
                            <p class="booking-title">{{__("Genre musical")}}</p>
                            <div class="form-wrap">
                                <select data-placeholder="Rock" id="genre" name="genre" required>
                                    <option>Hip-Hop</option>
                                    <option>Rap</option>
                                    <option>Rock</option>
                                    <option>Reggae</option>
                                    <option>{{__("Métal")}}</option>
                                    <option>{{__("Variété française")}}</option>
                                </select>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div>
                            <p class="booking-title">{{__("Véhicule")}}</p>
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
                            <p class="booking-title">{{__("Prix")}}</p>
                            <div class="form-wrap">
                                <input class="form-input" id="price" type="number" name="price" required>
                                <label class="form-label" for="price">{{__("Prix")}}</label>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>

            <div class="form-wrap form-wrap-icon">
                <button class="button button-lg button-gray-600" type="submit">{{__("Créer trajet")}}</button>
            </div>
        </form>

    @endauth

    @guest
        <script>
            window.alert({{__("Connectez-vous à votre compte pour effectuer cette opération")}});
            window.location = '/login';
        </script>
    @endguest
@endsection
