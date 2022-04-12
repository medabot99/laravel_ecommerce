@extends('layouts.fashi')

@section('title', 'Contact')

@section('body')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ route('mall') }}"><i class="fa fa-home"></i> Home</a>
                    <span>@yield('title')</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->


<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="contact-title">
                    <h4>Contacts Us</h4>
                    <p>‘Toff’ is originated from Greek, which stands for ‘high-end’ and ‘well-dressed’. With that in mind, our ultimate mission is to create and market classic and timeless pieces without breaking the bank. We want to introduce our cute fashion pieces to all the</p>
                </div>
                <div class="contact-widget">
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-location-pin"></i>
                        </div>
                        <div class="ci-text">
                            <span>Address:</span>
                            <p>No.6, Lorong Pauh 3, Taman Pauh, PERMATANG PAUH, 13500, Penang, Malaysia</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-mobile"></i>
                        </div>
                        <div class="ci-text">
                            <span>Phone:</span>
                            <p>+60 11-11420239</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-email"></i>
                        </div>
                        <div class="ci-text">
                            <span>Email:</span>
                            <p>toffclothing04@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="contact-form">
                    <div class="leave-comment">
                        <h4>Leave A Comment</h4>
                        <p>Our staff will call back later and answer your questions.</p>
                        <form action="{{ route('feedbacks.store') }}" method="POST" class="comment-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="name" required placeholder="Your name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="email" required placeholder="Your email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Your message" name="message"></textarea>
                                    <button type="submit" class="site-btn">Send message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

@endsection
