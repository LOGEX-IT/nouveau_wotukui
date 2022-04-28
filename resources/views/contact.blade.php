@extends('layouts.master')

@section('title', 'contact')
@section('contactactive', 'active')

@section('content')
<!-- Start Page Banner -->
        <div class="page-banner-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-banner-content">
                            <h2>contact</h2>
                            <ul>
                                <li>
                                    <a href="{{ asset('/') }}">Accueil</a>
                                </li>
                                <li>contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Banner -->

        <!-- Start Contact Info Area -->
        <section class="contact-info-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="contact-info-box">
                            <div class="icon">
                                <i class='bx bx-envelope'></i>
                            </div>

                            <h3>Email</h3>
                            <p><a href="mailto:infos@logexit.com">infos@logexit.com</a></p>
                            {{-- <p><a href="mailto:support@orgo.com">support@orgo.com</a></p> --}}
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="contact-info-box">
                            <div class="icon">
                                <i class='bx bx-map'></i>
                            </div>

                            <h3>Localisation</h3>
                            <p>262 BKK, Bè-Klikamé Lomé –Togo, 05 BP 757</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="contact-info-box">
                            <div class="icon">
                                <i class='bx bxs-phone-call'></i>
                            </div>

                            <h3>Telephone</h3>
                            <p><a href="tel:+22893055353">(228) 93 05 53 53</a></p>
                            <p><a href="tel:+22896055353">(228) 96 05 53 53</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Info Area -->



@endsection