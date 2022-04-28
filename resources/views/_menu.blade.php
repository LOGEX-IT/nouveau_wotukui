<div class="main-responsive-nav">
                <div class="container">
                    <div class="main-responsive-menu">
                        <div class="logo">
                            <a href="#">
                                <img src="assets/img/wotukui.png" alt="image">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-navbar" id="header-ba">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="#">
                            <img src="assets/img/wotukui.png" alt="image">
                        </a>

                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="{{ url('/accueil') }}" class="nav-link @yield('accueilactive')">
                                        Accueil 
                                        {{-- <i class='bx bx-chevron-down'></i> --}}
                                    </a>
                                    
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/articles') }}" class="nav-link @yield('articleactive')">
                                        Nos articles 
                                        {{-- <i class='bx bx-chevron-down'></i> --}}
                                    </a>
                                   
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/contact') }}" class="nav-link @yield('contactactive')">
                                        Contact
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/register') }}" class="nav-link @yield('contactactive')">
                                        Inscription
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/login') }}" class="nav-link @yield('contactactive')">
                                        Connexion
                                    </a>
                                </li>
                            </ul>

                            <div class="others-options d-flex align-items-center">
                                {{-- <div class="option-item">
                                    <div class="languages-list">
                                        <select>
                                            <option value="1">Eng</option>
                                            <option value="2">Ger</option>
                                            <option value="3">Span</option>
                                        </select>
                                    </div>
                                </div> --}}

                                <div class="option-item" >
                                    <div class="cart-btn" >
                                        <a href="{{ url('cart') }}">
                                            <i class='flaticon-shopping-cart'></i>
                                            <span id="checkout_items">{{ Cart::count()}}</span>
                                        </a>

                                    </div>
                                </div>

                                {{-- <div class="option-item">
                                    <form class="search-box">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <button type="submit"><i class="flaticon-search"></i></button>
                                    </form>
                                </div> --}}

                                <div class="option-item">
                                    <div class="burger-menu">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="others-option-for-responsive">
                <div class="container">
                    <div class="dot-menu">
                        <div class="inner">
                            <div class="circle circle-one"></div>
                            <div class="circle circle-two"></div>
                            <div class="circle circle-three"></div>
                        </div>
                    </div>
                    
                    <div class="container">
                        <div class="option-inner">
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <div class="languages-list">
                                        <select>
                                            <option value="1">Eng</option>
                                            <option value="2">Ger</option>
                                            <option value="3">Span</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="option-item">
                                    <div class="cart-btn">
                                        <a href="cart.html">
                                            <i class='flaticon-shopping-cart'></i>
                                            <span>0</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="option-item">
                                    <form class="search-box">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <button type="submit"><i class="flaticon-search"></i></button>
                                    </form>
                                </div>

                                <div class="option-item">
                                    <div class="burger-menu">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>