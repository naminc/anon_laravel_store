@extends('layouts.app')
@section('title', 'Trang chủ')
@section('content')
    <main>
        <div class="banner">
            <div class="container">
                <div class="slider-container has-scrollbar">
                    <div class="slider-item">
                        <img src="/assets/images/banner-1.jpg" alt="women's latest fashion sale" class="banner-img">
                        <div class="banner-content">
                            <p class="banner-subtitle">Trending item</p>
                            <h2 class="banner-title">Women's latest fashion sale</h2>
                            <p class="banner-text">
                                starting at &dollar; <b>20</b>.00
                            </p>
                            <a href="#" class="banner-btn">Shop now</a>
                        </div>
                    </div>
                    <div class="slider-item">
                        <img src="/assets/images/banner-2.jpg" alt="modern sunglasses" class="banner-img">
                        <div class="banner-content">
                            <p class="banner-subtitle">Trending accessories</p>
                            <h2 class="banner-title">Modern sunglasses</h2>
                            <p class="banner-text">
                                starting at &dollar; <b>15</b>.00
                            </p>
                            <a href="#" class="banner-btn">Shop now</a>
                        </div>
                    </div>
                    <div class="slider-item">
                        <img src="/assets/images/banner-3.jpg" alt="new fashion summer sale" class="banner-img">
                        <div class="banner-content">
                            <p class="banner-subtitle">Sale Offer</p>
                            <h2 class="banner-title">New fashion summer sale</h2>
                            <p class="banner-text">
                                starting at &dollar; <b>29</b>.99
                            </p>
                            <a href="#" class="banner-btn">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="category">
            <div class="container">
                <div class="category-item-container has-scrollbar">
                    @foreach ($categories as $category)
                        <div class="category-item">
                            <div class="category-img-box">
                                <img src="{{ asset($category->icon) }}" alt="{{ $category->name }}" width="30">
                            </div>
                            <div class="category-content-box">
                                <div class="category-content-flex">
                                    <h3 class="category-item-title">{{ $category->name }}</h3>
                                    <p class="category-item-amount">({{ $category->products->count() }})</p>
                                </div>
                                <a href="#" class="category-btn">Show all</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="product-container">
            <div class="container">
                <div class="product-box">
                    <div class="product-main">
                        <h2 class="title">All Products</h2>
                        <div class="product-grid">
                            @foreach ($products as $product)
                                <div class="showcase">
                                    <div class="showcase-banner">
                                        <img src="{{ asset($product->images) }}" alt="{{ $product->name }}" width="300"
                                            class="product-img default">
                                        <img src="{{ asset($product->images) }}" alt="{{ $product->name }}" width="300"
                                            class="product-img hover">
                                        <div class="showcase-actions">
                                            <form action="{{ route('cart.add') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button type="submit" class="btn-action">
                                                    <ion-icon name="bag-add-outline"></ion-icon>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="showcase-content">
                                        <a href="#" class="showcase-category">{{ $product->category->name }}</a>
                                        <a href="#">
                                            <h3 class="showcase-title">{{ $product->name }}</h3>
                                        </a>
                                        <div class="showcase-rating">
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                        </div>
                                        <div class="price-box">
                                            <p class="price">{{ $product->price }}$</p>
                                            <del>{{ $product->price }}$</del>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="testimonials-box">
                    <div class="testimonial">
                        <h2 class="title">testimonial</h2>
                        <div class="testimonial-card">
                            <img src="https://naminc.dev/profile.jpg" alt="{{ $setting->author }}"
                                class="testimonial-banner" width="80" height="80">
                            <p class="testimonial-name">{{ $setting->author }}</p>
                            <p class="testimonial-title">CEO & Founder Invision</p>
                            <img src="/assets/images/icons/quotes.svg" alt="quotation" class="quotation-img"
                                width="26">
                            <p class="testimonial-desc">
                                {{ $setting->description }}
                            </p>
                        </div>
                    </div>
                    <div class="cta-container">
                        <img src="/assets/images/cta-banner.jpg" alt="summer collection" class="cta-banner">
                        <a href="#" class="cta-content">
                            <p class="discount">25% Discount</p>
                            <h2 class="cta-title">Summer collection</h2>
                            <p class="cta-text">Starting @ $10</p>
                            <button class="cta-btn">Shop now</button>
                        </a>
                    </div>
                    <div class="service">
                        <h2 class="title">Our Services</h2>
                        <div class="service-container">
                            <a href="#" class="service-item">
                                <div class="service-icon">
                                    <ion-icon name="boat-outline"></ion-icon>
                                </div>
                                <div class="service-content">
                                    <h3 class="service-title">Worldwide Delivery</h3>
                                    <p class="service-desc">For Order Over $100</p>
                                </div>
                            </a>
                            <a href="#" class="service-item">
                                <div class="service-icon">
                                    <ion-icon name="rocket-outline"></ion-icon>
                                </div>
                                <div class="service-content">
                                    <h3 class="service-title">Next Day delivery</h3>
                                    <p class="service-desc">UK Orders Only</p>
                                </div>
                            </a>
                            <a href="#" class="service-item">
                                <div class="service-icon">
                                    <ion-icon name="call-outline"></ion-icon>
                                </div>
                                <div class="service-content">
                                    <h3 class="service-title">Best Online Support</h3>
                                    <p class="service-desc">Hours: 8AM - 11PM</p>
                                </div>
                            </a>
                            <a href="#" class="service-item">
                                <div class="service-icon">
                                    <ion-icon name="arrow-undo-outline"></ion-icon>
                                </div>
                                <div class="service-content">
                                    <h3 class="service-title">Return Policy</h3>
                                    <p class="service-desc">Easy & Free Return</p>
                                </div>
                            </a>
                            <a href="#" class="service-item">
                                <div class="service-icon">
                                    <ion-icon name="ticket-outline"></ion-icon>
                                </div>
                                <div class="service-content">
                                    <h3 class="service-title">30% money back</h3>
                                    <p class="service-desc">For Order Over $100</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
