@extends('layouts.app')

@section('content')


        <form action="{{route('createTrip')}}" method="POST">
            @csrf
            <table class="table">
                <tr>
                    <td>
                        <div>
                            <p class="booking-title">Départ</p>
                            <div class="form-wrap">
                                <input class="form-input" id="start_location" type="text" name="start_location" required>
                                <label class="form-label" for="start_location">Lieu</label>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div>
                            <p class="booking-title">Destination</p>
                            <div class="form-wrap">
                                <input class="form-input" id="end_location" type="text" name="end_location" required>
                                <label class="form-label" for="end_location">Lieu</label>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div>
                            <p class="booking-title">Date</p>
                            <div class="form-wrap form-wrap-icon">
                                <input class="form-input" id="date" type="text" name="date" data-time-picker="date" required>
                            </div>
                        </div>
                    </td>


                    <td>
                        <div>
                            <p class="booking-title">Heure départ</p>
                            <div class="form-wrap form-wrap-icon">
                                <input class="form-input" id="start_time" type="time" name="start_time" data-time-picker="time" required>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div>
                            <p class="booking-title">Heure arrivée</p>
                            <div class="form-wrap form-wrap-icon">
                                <input class="form-input" id="end_time" type="time" name="end_time" data-time-picker="time"  required>
                            </div>
                        </div>
                    </td>

                </tr>

                <tr>
                    <td>
                        <div>
                            <p class="booking-title">Nb. passagers</p>
                            <div>
                                <select data-placeholder="1" id="nbPassenger" name="nbPassenger" required>
                                    <option label="placeholder"></option>
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
                            <p class="booking-title">Genre musical</p>
                            <div class="form-wrap">
                                <select data-placeholder="Rock" id="genre" name="genre" required>
                                    <option label="placeholder"></option>
                                    <option>Hip-Hop</option>
                                    <option>Rap</option>
                                    <option>Rock</option>
                                    <option>Reggae</option>
                                    <option>Métal</option>
                                    <option>Variété française</option>
                                </select>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div>
                            <p class="booking-title">Véhicule</p>
                            <div class="form-wrap">
                                <select data-placeholder="Sélectionner votre véhicule" id="vehicle" name="vehicle" required>
                                    <option label="placeholder"></option>
                                    <option>Audi RS6</option>
                                    <option>Honda Civic</option>
                                </select>
                            </div>
                        </div>

                    </td>
                    <td>
                        <div>
                            <p class="booking-title">Prix</p>
                            <div class="form-wrap">
                                <input class="form-input" id="price" type="number" name="price" required>
                                <label class="form-label" for="price">Prix</label>
                            </div>
                        </div>
                    </td>

                </tr>
            </table>

            <div class="form-wrap form-wrap-icon">
                <button class="button button-lg button-gray-600" type="submit">Créer trajet</button>
            </div>
        </form>



@endsection
