<header>
    <div class="header-top">
        <div class="container">
            <ul class="header-social-container">
                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                </li>
            </ul>
            <div class="header-alert-news">
                <p>
                    <b>Free Shipping</b>
                    This Week Order Over - $55
                </p>
            </div>
            <div class="header-top-actions">
                <select name="currency">
                    <option value="usd">USD &dollar;</option>
                    <option value="eur">EUR &euro;</option>
                </select>

                <select name="language">

                    <option value="en-US">English</option>
                    <option value="es-ES">Espa&ntilde;ol</option>
                    <option value="fr">Fran&ccedil;ais</option>

                </select>

            </div>

        </div>

    </div>

    <div class="header-main">

        <div class="container">

            <a href="{{ route('home') }}" class="header-logo">
                <img src="{{ asset($setting->logo) }}" alt="Logo" width="120" height="36">
            </a>

            <div class="header-search-container">

                <input type="search" name="search" class="search-field" placeholder="Enter your product name...">

                <button class="search-btn">
                    <ion-icon name="search-outline"></ion-icon>
                </button>

            </div>

            <div class="header-user-actions">
                <a href="@if (Auth::check()) {{ route('user.profile') }} @else {{ route('auth.login.page') }} @endif"
                    class="action-btn">
                    <ion-icon name="person-outline"></ion-icon>
                </a>
                <a href="{{ route('cart.page') }}" class="action-btn"
                    @guest
onclick="return showLoginAlert(event)" @endguest>
                    <ion-icon name="bag-handle-outline"></ion-icon>
                    <span class="count">{{ $cartCount ?? 0 }}</span>
                </a>
                @auth
                    <a href="{{ route('auth.logout') }}" class="action-btn" onclick="confirmLogout(event, this)">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </a>
                @endauth
                @if (Auth::check() && Auth::user()->role == 'admin')
                    <a href="{{ route('admin.index') }}" class="action-btn">
                        <ion-icon name="settings-outline"></ion-icon>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <nav class="desktop-navigation-menu">

        <div class="container">

            <ul class="desktop-menu-category-list">

                <li class="menu-category">
                    <a href="{{ route('home') }}" class="menu-title">Home</a>
                </li>
                <li class="menu-category">
                    <a href="#" class="menu-title">Categories</a>
                </li>
                <li class="menu-category">
                    <a href="#" class="menu-title">Blog</a>
                </li>

                <li class="menu-category">
                    <a href="#" class="menu-title">Hot Offers</a>
                </li>
                <li class="menu-category">
                    <a href="#" class="menu-title">Contact</a>
                </li>

            </ul>

        </div>

    </nav>

    <div class="mobile-bottom-navigation">

        <button class="action-btn" data-mobile-menu-open-btn>
            <ion-icon name="menu-outline"></ion-icon>
        </button>

        <button class="action-btn">
            <ion-icon name="bag-handle-outline"></ion-icon>

            <span class="count">{{ $cartCount ?? 0 }}</span>
        </button>

        <button class="action-btn">
            <ion-icon name="home-outline"></ion-icon>
        </button>

        <button class="action-btn">
            <ion-icon name="heart-outline"></ion-icon>

            <span class="count">0</span>
        </button>

        <button class="action-btn" data-mobile-menu-open-btn>
            <ion-icon name="grid-outline"></ion-icon>
        </button>

    </div>

    <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

        <div class="menu-top">
            <h2 class="menu-title">Menu</h2>

            <button class="menu-close-btn" data-mobile-menu-close-btn>
                <ion-icon name="close-outline"></ion-icon>
            </button>
        </div>

        <ul class="mobile-menu-category-list">

            <li class="menu-category">
                <a href="#" class="menu-title">Home</a>
            </li>

            <li class="menu-category">
                <a href="#" class="menu-title">Categories</a>
            </li>

            <li class="menu-category">
                <a href="#" class="menu-title">Blog</a>
            </li>

            <li class="menu-category">
                <a href="#" class="menu-title">Hot Offers</a>
            </li>

            <li class="menu-category">
                <a href="#" class="menu-title">Contact</a>
            </li>

        </ul>

        <div class="menu-bottom">

            <ul class="menu-category-list">

                <li class="menu-category">

                    <button class="accordion-menu" data-accordion-btn>
                        <p class="menu-title">Language</p>

                        <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                    </button>

                    <ul class="submenu-category-list" data-accordion>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">English</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Espa&ntilde;ol</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Fren&ccedil;h</a>
                        </li>

                    </ul>

                </li>

                <li class="menu-category">
                    <button class="accordion-menu" data-accordion-btn>
                        <p class="menu-title">Currency</p>
                        <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                    </button>

                    <ul class="submenu-category-list" data-accordion>
                        <li class="submenu-category">
                            <a href="#" class="submenu-title">USD &dollar;</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">EUR &euro;</a>
                        </li>
                    </ul>
                </li>

            </ul>

            <ul class="menu-social-container">

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                </li>

            </ul>

        </div>

    </nav>

</header>
@push('scripts')
    @if (!Auth::check())
        <script>
            function showLoginAlert(e) {
                e.preventDefault();
                Swal.fire({
                    icon: 'info',
                    title: 'You need to login',
                    text: 'Please login to use the cart!',
                    confirmButtonText: 'Login',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('auth.login.page') }}";
                    }
                });
                return false;
            }
        </script>
    @endif
@endpush
