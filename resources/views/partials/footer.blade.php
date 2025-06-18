<footer>
    <div class="footer-nav">
        <div class="container">
            <ul class="footer-nav-list">
                <li class="footer-nav-item">
                    <h2 class="nav-title">Categories</h2>
                </li>
                @foreach ($categories as $category)
                @if ($loop->index < 5)
                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">{{ $category->name }}</a>
                </li>
                @endif
                @endforeach
            </ul>
            <ul class="footer-nav-list">
                <li class="footer-nav-item">
                    <h2 class="nav-title">Our Company</h2>
                </li>
                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Delivery</a>
                </li>
                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Legal Notice</a>
                </li>
                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Terms and conditions</a>
                </li>
                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">About us</a>
                </li>
                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Secure payment</a>
                </li>
            </ul>
            <ul class="footer-nav-list">
                <li class="footer-nav-item">
                    <h2 class="nav-title">Services</h2>
                </li>
                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Prices drop</a>
                </li>
                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">New products</a>
                </li>
                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Best sales</a>
                </li>
                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Contact us</a>
                </li>
                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Sitemap</a>
                </li>
            </ul>
            <ul class="footer-nav-list">
                <li class="footer-nav-item">
                    <h2 class="nav-title">Contact</h2>
                </li>
                <li class="footer-nav-item flex">
                    <div class="icon-box">
                        <ion-icon name="location-outline"></ion-icon>
                    </div>
                    <address class="content">
                        {{ $setting->address }}
                    </address>
                </li>
                <li class="footer-nav-item flex">
                    <div class="icon-box">
                        <ion-icon name="call-outline"></ion-icon>
                    </div>
                    <a href="tel:{{ $setting->phone }}" class="footer-nav-link">{{ $setting->phone }}</a>
                </li>
                <li class="footer-nav-item flex">
                    <div class="icon-box">
                        <ion-icon name="mail-outline"></ion-icon>
                    </div>
                    <a href="mailto:{{ $setting->email }}" class="footer-nav-link">{{ $setting->email }}</a>
                </li>
            </ul>
            <ul class="footer-nav-list">
                <li class="footer-nav-item">
                    <h2 class="nav-title">Follow Us</h2>
                </li>
                <li>
                    <ul class="social-link">
                        <li class="footer-nav-item">
                            <a href="#" class="footer-nav-link">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                        </li>
                        <li class="footer-nav-item">
                            <a href="#" class="footer-nav-link">
                                <ion-icon name="logo-twitter"></ion-icon>
                            </a>
                        </li>
                        <li class="footer-nav-item">
                            <a href="#" class="footer-nav-link">
                                <ion-icon name="logo-linkedin"></ion-icon>
                            </a>
                        </li>
                        <li class="footer-nav-item">
                            <a href="#" class="footer-nav-link">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <img src="{{ asset('assets/images/payment.png') }}" alt="payment method" class="payment-img">
            <p class="copyright">
                Copyright &copy; <a href="//{{ $setting->domain }}">{{ $setting->domain }}</a> dev by {{ $setting->author }}.
            </p> 
        </div>
    </div>
</footer>
