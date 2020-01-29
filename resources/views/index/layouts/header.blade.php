<header>
    <div class="container">
        <div class="header d-flex-justify">
            <div class="logo d-flex">
                <a href="/" class="logo-box">
                    <img src="/index/img/logo/logo.png" alt="logo">
                </a>
                <ul class="profile-dropdown">
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-map-marker-alt"></i> 
                            @if(Session::has('city'))
                                {{ App\Models\City::find(Session::get('city'))->city_name }}
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            @include('index.layouts.city')
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu-cover">
                <ul class="menu d-flex">
                    <li>
                        <a href="#">
                            <img src="/index/img/icon/calendar.svg" alt="">
                            <span>Матчи</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="/index/img/icon/map.svg" alt="">
                            <span>Объекты рядом</span>
                        </a>
                    </li>
                </ul>
                <button class="btn-plain close-menu hidden-md hidden-sm hidden-lg">
                    <img src="/index/img/icon/close.svg" alt="">
                </button>
            </div>
            <div class="btn-cover d-flex">
                <button class="btn-plain call-search">
                    <img src="/index/img/icon/search.svg" alt="">
                </button>
                <div class="search">
                    <form action="#" class="d-flex-justify">
                        <input type="text" placeholder="Поиск по объектам">
                    </form>

                </div>

                @auth
                    <ul class="profile-dropdown bordered">
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle d-flex" data-toggle="dropdown">
                                <img src="{{ Auth::user()->avatar }}" alt="" class="prof-img">
                                <span>{{ Auth::user()->user_firstname }}</span>
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/profile">Личный кабинет</a></li>
                                <li><a href="/logout">Выйти</a></li>
                            </ul>
                        </li>
                    </ul>
                    <button class="btn-plain bordered call-menu visible-xs">
                        <img src="img/icon/Union.png" alt="">
                    </button>
                @endauth

                @guest
                    <button class="btn-plain call-login bordered">
                        <img src="/index/img/icon/user.svg" alt="">
                        <span>Личный кабинет</span>
                    </button>
                    <button class="btn-plain bordered call-menu visible-xs">
                        <img src="/index/img/icon/Union.png" alt="">
                    </button>                    
                @endguest
                
            </div>
        </div>
    </div>
</header>