@extends('layouts.guest')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@section('content')
    <!-- ***** Main Banner Area Start ***** -->
    <section class="section main-banner" id="top" data-section="section1">
        <video autoplay muted loop id="bg-video">
            <source src="{{ asset('assets/images/course-video.mp4') }}" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="caption">
                            <h6>{{ __('language.Hello Students') }}</h6>
                            <h2>{{ __('language.Welcome to Education') }}</h2>
                            <p>This is an edu meeting HTML CSS template provided by
                                <a rel="nofollow" href="https://templatemo.com/page/1" target="_blank">TemplateMo
                                    website</a>.
                                The video background is taken from Pexels website, a group of young people by
                                <a rel="nofollow" href="https://www.pexels.com/@pressmaster"
                                    target="_blank">Pressmaster</a>.
                            </p>
                            <div class="main-button-red">
                                <div class="scroll-to-section">
                                    <a href="#contact">{{ __('language.Join Us Now!') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Services Section ***** -->
    <section class="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-service-item owl-carousel">
                        @foreach ([['icon' => 'service-icon-01.png', 'title' => 'Best Education', 'desc' => 'Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.'], ['icon' => 'service-icon-02.png', 'title' => 'Best Teachers', 'desc' => 'Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.'], ['icon' => 'service-icon-03.png', 'title' => 'Best Students', 'desc' => 'Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.'], ['icon' => 'service-icon-02.png', 'title' => 'Online Meeting', 'desc' => 'Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.'], ['icon' => 'service-icon-03.png', 'title' => 'Best Networking', 'desc' => 'Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.']] as $service)
                            <div class="item">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/' . $service['icon']) }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{ $service['title'] }}</h4>
                                    <p>{{ $service['desc'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Upcoming Meetings Section ***** -->
    <section class="upcoming-meetings" id="meetings">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Upcoming Meetings</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories">
                        <h4>Meeting Categories</h4>
                        <ul>
                            <li><a href="#">Sed tempus enim leo</a></li>
                            <li><a href="#">Aenean molestie quis</a></li>
                            <li><a href="#">Cras et metus vestibulum</a></li>
                            <li><a href="#">Nam et condimentum</a></li>
                            <li><a href="#">Phasellus nec sapien</a></li>
                        </ul>
                        <div class="main-button-red">
                            <a href="{{ route('meetings') }}">All Upcoming Meetings</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        @foreach ([['img' => 'meeting-01.jpg', 'title' => 'New Lecturers Meeting', 'date' => 'Nov 10', 'price' => '$22.00', 'desc' => 'Morbi in libero blandit lectus cursus ullamcorper.'], ['img' => 'meeting-02.jpg', 'title' => 'Online Teaching Techniques', 'date' => 'Nov 24', 'price' => '$36.00', 'desc' => 'Morbi in libero blandit lectus cursus ullamcorper.'], ['img' => 'meeting-03.jpg', 'title' => 'Higher Education Conference', 'date' => 'Nov 26', 'price' => '$14.00', 'desc' => 'Morbi in libero blandit lectus cursus ullamcorper.'], ['img' => 'meeting-04.jpg', 'title' => 'Student Training Meetup', 'date' => 'Nov 30', 'price' => '$48.00', 'desc' => 'Morbi in libero blandit lectus cursus ullamcorper.']] as $meeting)
                            <div class="col-lg-6">
                                <div class="meeting-item">
                                    <div class="thumb">
                                        <div class="price"><span>{{ $meeting['price'] }}</span></div>
                                        <a href="{{ route('meeting-details') }}">
                                            <img src="{{ asset('assets/images/' . $meeting['img']) }}"
                                                alt="{{ $meeting['title'] }}">
                                        </a>
                                    </div>
                                    <div class="down-content">
                                        <div class="date">
                                            <h6>{{ $meeting['date'] }} <span></span></h6>
                                        </div>
                                        <a href="{{ route('meeting-details') }}">
                                            <h4>{{ $meeting['title'] }}</h4>
                                        </a>
                                        <p>{{ $meeting['desc'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Contact Section ***** -->
    <section class="contact-us" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 align-self-center">
                    <h2>Let's get in touch</h2>
                    @if (session('success'))
                        <div class="alert alert-success text-center" style="margin-bottom:20px;">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form id="contact" action="{{ route('reservations.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Let's get in touch</h2>
                            </div>
                            <div class="col-lg-4">
                                <fieldset>
                                    <input name="name" type="text" id="name" placeholder="YOURNAME...*"
                                        required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset>
                                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*"
                                        placeholder="YOUR EMAIL..." required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset>
                                    <input name="subject" type="text" id="subject" placeholder="SUBJECT...*"
                                        required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="message" type="text" class="form-control" id="message" placeholder="YOUR MESSAGE..."
                                        required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="button">SEND MESSAGE NOW</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3">
                    <div class="right-info">
                        <ul>
                            <li>
                                <h6>Phone Number</h6><span>010-020-0340</span>
                            </li>
                            <li>
                                <h6>Email Address</h6><span>info@meeting.edu</span>
                            </li>
                            <li>
                                <h6>Street Address</h6><span>Rio de Janeiro - RJ, 22795-008, Brazil</span>
                            </li>
                            <li>
                                <h6>Website URL</h6><span>www.meeting.edu</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer">
                <p>Copyright © 2022 Edu Meeting Co., Ltd. All Rights Reserved.
                    <br>Design: <a href="https://templatemo.com" target="_parent">TemplateMo</a>
                </p>
            </div>
        </div>
    </section>
@endsection
