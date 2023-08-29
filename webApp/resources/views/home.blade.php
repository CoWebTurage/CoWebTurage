@extends('layouts.app')

@section('content')
    <!-- Swiper-->
    <form class="rd-form rd-mailform booking-form" method="POST">
        <table class="table">
            <tr>
                <td>
                    <div>
                        <p class="booking-title">Départ</p>
                        <div class="form-wrap">
                            <input class="form-input" id="depart" type="text" name="depart">
                            <label class="form-label" for="depart">Lieu</label>
                        </div>
                    </div>
                </td>

                <td>
                    <div>
                        <p class="booking-title">Destination</p>
                        <div class="form-wrap">
                            <input class="form-input" id="destination" type="text" name="destination">
                            <label class="form-label" for="destination">Lieu</label>
                        </div>
                    </div>
                </td>

                <td>
                    <div>
                        <p class="booking-title">Date</p>
                        <div class="form-wrap form-wrap-icon"><span class="icon mdi mdi-calendar-text"></span>
                            <input class="form-input" id="date" type="text" name="date" data-time-picker="date">
                        </div>
                    </div>
                </td>

                <td>
                    <div>
                        <p class="booking-title">Nb. passagers</p>
                        <div class="form-wrap">
                            <select data-placeholder="1">
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
                            <select data-placeholder="Rock">
                                <option label="placeholder"></option>
                                <option>Hip-Hop</option>
                                <option>Rap</option>
                                <option>Rock</option>
                                <option>Reggae</option>
                                <option>Metal</option>
                                <option>Variété française</option>
                            </select>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="form-wrap form-wrap-icon">
                        <button class="button button-lg button-gray-600" type="submit">Rechercher</button>
                    </div>
                </td>

            </tr>
        </table>
    </form>
    </div>
    </div>
    </div>
    </div>
    </section>

    <!-- Featured Offers-->
    <section class="section section-lg bg-default">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-9 col-lg-7 wow-outer">
                    <div class="wow slideInDown">
                        <h2>Trajets les plus effectués</h2>
                        <p class="text-opacity-80">Voici les 3 trajets les plus effectués sur notre plateforme!</p>
                    </div>
                </div>
            </div>
            <div class="row row-20 row-lg-30">
                <div class="col-md-6 col-lg-4 wow-outer">
                    <div class="wow fadeInUp">
                        <div class="product-featured">
                            <div class="product-featured-figure"><img src="/images/genevelausanne2.png" alt=""
                                                                      width="370" height="395"/>
                                <div class="product-featured-button"><a class="button button-primary"
                                                                        href="#">Commander</a></div>
                            </div>
                            <div class="product-featured-caption">
                                <h4><a class="product-featured-title" href="#">Genève - Lausanne</a></h4>
                                <p class="big">$8</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow-outer">
                    <div class="wow fadeInUp">
                        <div class="product-featured">
                            <div class="product-featured-figure"><img src="/images/fribourgberne.png" alt="" width="370"
                                                                      height="395"/>
                                <div class="product-featured-button"><a class="button button-primary"
                                                                        href="#">Commander</a></div>
                            </div>
                            <div class="product-featured-caption">
                                <h4><a class="product-featured-title" href="#">Fribourg - Berne</a></h4>
                                <p class="big">$13</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow-outer">
                    <div class="wow fadeInUp">
                        <div class="product-featured">
                            <div class="product-featured-figure"><img src="/images/yverdonlausanne.png" alt=""
                                                                      width="370" height="395"/>
                                <div class="product-featured-button"><a class="button button-primary"
                                                                        href="#">Commander</a></div>
                            </div>
                            <div class="product-featured-caption">
                                <h4><a class="product-featured-title" href="#">Yverdon-les-Bains - Lausanne</a></h4>
                                <p class="big">$4</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-lg bg-default">
        <div class="container wow-outer">
            <h2 class="text-center wow slideInDown">Feedback récent</h2>
            <!-- Owl Carousel-->
            <div class="owl-carousel wow fadeInUp" data-items="1" data-md-items="2" data-lg-items="3" data-dots="true"
                 data-nav="false" data-stage-padding="15" data-loop="false" data-margin="30" data-mouse-drag="false">
                <div class="post-corporate"><a class="badge" href="#">Jul 02, 2019</a>
                    <h4 class="post-corporate-title"><a href="#">Genuine Italian Pizza: Authenticity and Choice</a></h4>
                    <div class="post-corporate-text">
                        <p>As an Italian restaurant, we are very proud of our delicious authentic pizzas. Our three most
                            popular choices are the Rustica, the Toscana and...</p>
                    </div>
                    <a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
                </div>
                <div class="post-corporate"><a class="badge" href="#">Jul 12, 2019</a>
                    <h4 class="post-corporate-title"><a href="#">Italian vs. American Spaghetti: Top 5 Differences</a>
                    </h4>
                    <div class="post-corporate-text">
                        <p>Commonly, when we hear there is spaghetti for dinner we will be expecting a red tomato sauce
                            with meat and seasonings poured over long...</p>
                    </div>
                    <a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
                </div>
                <div class="post-corporate"><a class="badge" href="#">aug 02, 2019</a>
                    <h4 class="post-corporate-title"><a href="#">The Delicious History of Lasagna and Its Origins</a>
                    </h4>
                    <div class="post-corporate-text">
                        <p>Lasagna, could there be a more perfect dish? It’s comfort food on steroids. Layers of cheese
                            generously piled on top of decadent amounts...</p>
                    </div>
                    <a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
                </div>
                <div class="post-corporate"><a class="badge" href="#">Aug 15, 2019</a>
                    <h4 class="post-corporate-title"><a href="#">Making Gelato Like a True Italian: Tips From Our
                            Chef</a></h4>
                    <div class="post-corporate-text">
                        <p>Most would agree that gelato is the most delicious frozen dessert; the perfect ending to any
                            meal. With origins in Sicily, gelato has been made famous...</p>
                    </div>
                    <a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
                </div>
                <div class="post-corporate"><a class="badge" href="#">Sep 15, 2019</a>
                    <h4 class="post-corporate-title"><a href="#">Italian Ingredients You Can Easily Grow at Home</a>
                    </h4>
                    <div class="post-corporate-text">
                        <p>Imagine preparing an Italian dinner but having to stop cooking because you forget an
                            ingredient and must run to the store. How nice would it be to go...</p>
                    </div>
                    <a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
                </div>
                <div class="post-corporate"><a class="badge" href="#">Sep 28, 2019</a>
                    <h4 class="post-corporate-title"><a href="#">Our Brief Guide to Pairing Wine and Pasta the Right
                            Way</a></h4>
                    <div class="post-corporate-text">
                        <p>To Italians, pasta is the food of the gods, and there is nothing better to go with a good
                            pasta than a perfect wine. To the uninitiated, finding the right...</p>
                    </div>
                    <a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
                </div>
                <div class="post-corporate"><a class="badge" href="#">Oct 05, 2019</a>
                    <h4 class="post-corporate-title"><a href="#">Top 10 Famous Spring Dishes in Italian Restaurants</a>
                    </h4>
                    <div class="post-corporate-text">
                        <p>Spring is the time for growth and rebirth. One can see this throughout the countrysides of
                            Italy with blooming flowers and budding trees. Springtime is...</p>
                    </div>
                    <a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
                </div>
                <div class="post-corporate"><a class="badge" href="#">Oct 17, 2019</a>
                    <h4 class="post-corporate-title"><a href="#">What Makes Some Seasonings Truly Italian?</a></h4>
                    <div class="post-corporate-text">
                        <p>When thinking of Italian cuisine, dishes like pasta enveloped in hearty sauces come to mind.
                            Certain flavors seem to be found across the different...</p>
                    </div>
                    <a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
                </div>
                <div class="post-corporate"><a class="badge" href="#">Nov 10, 2019</a>
                    <h4 class="post-corporate-title"><a href="#">Types of Italian Sausage and Why They Are Different</a>
                    </h4>
                    <div class="post-corporate-text">
                        <p>There are many types of Italian sausage. The main difference in Italian sausage when compared
                            to other sausages is the seasoning. The particular...</p>
                    </div>
                    <a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
                </div>
            </div>
        </div>
    </section>
@endsection
