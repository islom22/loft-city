<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/logo/favicon-32x32.png') }}" />
    <title>Lofty Soft | Изготовление мебели в стиле лофт</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/themes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/about-company.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/reservation-page.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/inter-page.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link type="text/css" href="{{ asset('app/notyf.min.css') }}" rel="stylesheet">

    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .active {
            font-weight: bold
        }

        element.style {
            right: 1rem;
            transform: translate(120px, 50%);
        }
    </style>
    @if (session()->has('products_count') && session()->get('products_count') != 0)
        <style>
            .basket__link::after {
                content: "{{ session()->get('products_count') }}";
                background: var(--orange);
                position: absolute;
                right: 0;
                bottom: 0;
                width: 18px;
                height: 18px;
                border-radius: 50%;
                font-size: 13px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
            }
        </style>
    @else
        <style>
            .basket__link::after {
                display: none
            }
        </style>
    @endif
    @yield('links')

</head>

<body>
    <header>
        <div class="header__container">
            <nav class="nav" id="nav">
                <div class="row">
                    <div class="col-1 d-flex align-items-center pe-0">
                        <a href="{{ route('index') }}" class="nav__brand">
                            <img width="100%" class="brand" src="{{ asset('img/logo/brand.svg') }}"
                                alt="" />
                        </a>
                    </div>
                    <div class="col-11 nav__collapse">
                        <div class="nav__links">
                            <ul>
                                <li>
                                    <a href="{{ route('index') }}"
                                        class="nav__link @if (request()->is('/') || request()->is('//*')) active @endif">Главная</a>
                                </li>
                                <li>
                                    <a href="{{ route('products') }}"
                                        class="nav__link @if (request()->is('products') || request()->is('products/*')) active @endif">Каталог</a>
                                </li>
                                {{-- <li>
                                    <a href="{{ route('reservation_page') }}"
                                        class="nav__link @if (request()->is('reservations')) || request()->is('reservations/*')) active @endif">Как
                                        заказать</a>
                                </li> --}}
                                <li>
                                    <a class="footer__link @if (request()->is('about') || request()->is('about/*')) active @endif"
                                        href="{{ route('about_company') }}"> О нас </a>
                                </li>
                                @if (isset($files))
                                    <li>
                                        @php
                                            $file = \App\Models\File::latest()->first();
                                        @endphp

                                        <a href="{{ asset('uploads/file/' . $file->file) }}" download
                                            class="nav__link download__link">
                                            <i class="bx bx-chair"></i> Скачать каталог</a>

                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="nav__info">
                            {{-- <div class="nav__search">
                                <input type="text" placeholder="Поиск мебели" />
                            </div> --}}
                            <div class="nav__basket">
                                <a href="{{ route('reservation_page') }}" class="basket__link">
                                    <i class="bx bx-shopping-bag"></i>

                                </a>
                            </div>
                            @if (isset($abouts->phone ))
                                <div class="nav__num">
                                    <p>Заказать мебель</p>
                                    <a href="tel:+998{{ $abouts->phone }}">{{ $abouts->phone }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    @yield('connect')

    <footer class="footer">
        <div class="footer__container container">
            <div class="row">
                <div class="col-lg-2 col-xs-12">
                    <ul class="footer__links">
                        <h4 class="foot__lil-title">Ссылки</h4>
                        <li>
                            <a href="{{ route('index') }}"
                                class="nav__link @if (request()->is('/') || request()->is('//*')) active @endif">Главная</a>
                        </li>
                        <li>
                            <a href="{{ route('products') }}"
                                class="nav__link @if (request()->is('products') || request()->is('products/*')) active @endif">Каталог</a>
                        </li>
                        <li>
                            <a href="{{ route('reservation_page') }}"
                                class="nav__link @if (request()->is('reservations')) || request()->is('reservations/*')) active @endif">Как
                                заказать</a>
                        </li>
                        <li>
                            <a class="footer__link @if (request()->is('about') || request()->is('about/*')) active @endif"
                                href="{{ route('about_company') }}"> О нас </a>
                        </li>
                    </ul>
                </div>
                @if (isset($categories[0]))
                    <div class="col-lg-2 col-xs-12">
                        <ul class="footer__links">
                            <h4 class="foot__lil-title">Категории</h4>
                            <li>
                                @if (isset($categories[0]))
                                    <a class="footer__link"
                                        href="{{ route('categories_show', ['category_id' => $categories[0]->id]) }}">
                                        {{ $categories[0]->title['ru'] }} </a>
                                @endif
                            </li>
                            <li>
                                @if (isset($categories[1]))
                                    <a class="footer__link"
                                        href="{{ route('categories_show', ['category_id' => $categories[1]->id]) }}">
                                        {{ $categories[1]->title['ru'] }} </a>
                                @endif
                            </li>
                            <li>
                                @if (isset($categories[2]))
                                    <a class="footer__link"
                                        href="{{ route('categories_show', ['category_id' => $categories[2]->id]) }}">
                                        {{ $categories[2]->title['ru'] }} </a>
                                @endif
                            </li>
                            <li>
                                @if (isset($categories[3]))
                                    <a class="footer__link"
                                        href="{{ route('categories_show', ['category_id' => $categories[3]->id]) }}">
                                        {{ $categories[3]->title['ru'] }} </a>
                                @endif
                            </li>
                            <li>
                                @if (isset($categories[4]))
                                    <a class="footer__link"
                                        href="{{ route('categories_show', ['category_id' => $categories[4]->id]) }}">
                                        {{ $categories[4]->title['ru'] }} </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                @endif
                <div class="col-lg-4 col-xs-12 foot__brand">
                    <div class="about__header">
                        <img src="{{ asset('img/logo/brand.svg') }}" alt="" class="about__img" />
                        <p class="about__txt">
                            Изготавливает мебель в стиле лофт. А также любые конструкции из
                            металла.
                        </p>
                        <a href="{{ route('about_company') }}" class="about__link"> Подробнее </a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12 centered">
                    @if (isset($abouts->phone))
                        <div class="info__item">
                            <p class="info__sup">Для связи:</p>
                            <a class="foot-info__txt" href="tel:+998{{ $abouts->phone }}">{{ $abouts->phone }}</a>
                        </div>
                    @endif
                    @if (isset($abouts->address1) || isset($abouts->address2) || isset($abouts->address3))
                        <div class="info__item">
                            <p class="info__sup">Адрес:</p>
                            <p class="foot-info__txt">
                                {{ $abouts->address1 ? $abouts->address1 : '' }} {{ $abouts->address2 ? ', '.$abouts->address2 : '' }} {{ $abouts->address3 ? ', '.$abouts->address3 : '' }}</p>
                        </div>
                    @endif
                    @if (isset($abouts->telegram_link) ||  isset($abouts->instagram ))
                        <div class="info__item">
                            <p class="info__sup">Социальные сети:</p>
                            <div class="socials">
                                @if(isset($abouts->telegram_link ))
                                <a class="foot-info__txt social" href="{{ $abouts->telegram_link }}">
                                    <i class="bx bxl-telegram"></i>
                                </a>
                                @endif
                                @if(isset($abouts->instagram ))
                                <a class="foot-info__txt social" href="{{ $abouts->instagram }}">
                                    <i class="bx bxl-instagram"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="footer__bottom">
                <p class="foot__txt">© Сайт защищен авторским правом!</p>
                <p class="foot__txt">
                    Сайт разработал National Development Community
                </p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{ asset('https://unpkg.com/swiper@8/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('https://unpkg.com/aos@2.3.1/dist/aos.js') }}"></script>
    <script src="{{ asset('app/notyf.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        @if (Session::has('message'))
            const notyf = new Notyf({
                position: {
                    x: 'right',
                    y: 'top',
                },
                types: [{
                    type: 'info',
                    background: '#0948B3'
                }]
            });
            notyf.open({
                type: 'info',
                message: '{{ Session::get('message') }}'
            });
        @endif
    </script>
    @yield('script')
</body>

</html>
