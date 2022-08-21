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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/about-company.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/reservation-page.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/inter-page.css') }}" />
    <link type="text/css" href="{{ asset('app/notyf.min.css') }}" rel="stylesheet">
    <style>
        .active {
            font-weight: bold
        }

        /* .prod__bottom {
            margin-top: 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        } */

        /* .prod__bottom {
            position: fixed;
            bottom: 0px;
            right: 0px;
        } */
        .prod__bottom {
            margin-top: 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }



        .cat__pic {
            height: 450px;
            object-fit: cover;
            width: 100%;
        }

        .half__pic {
            height: 165px;
        }

        .half__item {
            width: 100%;
        }

        .twisted img {
            width: auto;
            height: auto;
        }
    </style>
    <style>
        .active {
            font-weight: bold
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
                                    <a class="footer__link @if (request()->is('abouts') || request()->is('abouts/*')) active @endif"
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
                            @if (isset($abouts->phone))
                                <div class="nav__num">
                                    <p>Заказать мебель</p>
                                    <a href="tel:+998{{ $abouts->phone }}">{{ $abouts->phone }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>

            <section class="home">
                <div class="swiper homeSlider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="home__wrapper">
                                <div class="home__container">
                                    <div class="row">
                                        <div class="col-lg-6 col-xs-12 home__flexer">
                                            <div class="home__content">
                                                <h1 class="home__title">
                                                    Изготовление мебели в стиле лофт
                                                </h1>
                                                @if (isset($abouts->telegram_user))
                                                    <p class="home__subtitle">
                                                        Позвоните или напишите в
                                                        <span class="orange__txt">Telegram</span> — cделаем
                                                        расчет металлической конструкции за 5 минут!
                                                    </p>
                                                    <div class="twisted">
                                                        <a href="{{ $abouts->telegram_user }}" class="home__btn">
                                                            <i class="bx bxl-telegram"></i> Написать в
                                                            Telegram
                                                        </a>
                                                        <img class="twist"
                                                            src="{{ asset('img/logo/twisted-arrow.svg') }}"
                                                            alt="" />
                                                    </div>
                                                @endif
                                            </div>
                                            @if (isset($abouts->phone) || isset($abouts->address1) || isset($abouts->address2) || isset($abouts->address3))
                                                <div class="home__info">
                                                    @if (isset($abouts->phone))
                                                        <div class="info__item">
                                                            <p class="info__sup">Заказать мебель</p>
                                                            <a href="tel:+998{{ $abouts->phone }}"
                                                                class="info__txt">{{ $abouts->phone }}</a>
                                                        </div>
                                                    @endif
                                                    <div class="info__item">
                                                        <p class="info__sup">Адрес:</p>
                                                        <p class="info__txt">
                                                            <span class="orange__txt">
                                                                {{ $abouts->address1 }},{{ $abouts->address2 }},{{ $abouts->address3 }}
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-xs-12">
                                            <div class="home__img">
                                                <img src="{{ asset('img/home.png') }}" alt=""
                                                    class="home__pic" />
                                                <div class="home__bubbles">
                                                    <div class="small__bubble">
                                                        <p class="bubble__num">5+</p>
                                                        <p class="bubble__txt">На рынке</p>
                                                    </div>
                                                    <div class="big__bubble">
                                                        <p class="bubble__num">100+</p>
                                                        <p class="bubble__txt">Разновидностей мебели</p>
                                                        <i class="bx bx-arrow-back"
                                                            style="transform: rotate(180deg)"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide second__slide">
                            <div class="home__wrapper home__wrapper-2">
                                <div class="home__container">
                                    <div class="row">
                                        <div class="col-lg-6 col-xs-12 home__flexer">
                                            <div class="home__content">
                                                <h1 class="home__title">
                                                    Изготовление мебели в стиле лофт
                                                </h1>
                                                @if (isset($abouts->telegram_user))
                                                    <p class="home__subtitle">
                                                        Позвоните или напишите в
                                                        <span class="orange__txt">Telegram</span> — cделаем
                                                        расчет металлической конструкции за 5 минут!
                                                    </p>
                                                    <div class="twisted">
                                                        <a href="{{ $abouts->telegram_user }}" class="home__btn">
                                                            <i class="bx bxl-telegram"></i> Написать в
                                                            Telegram
                                                        </a>
                                                        <img class="twist"
                                                            src="{{ asset('img/logo/twisted-arrow.svg') }}"
                                                            alt="" />
                                                    </div>
                                                @endif
                                            </div>
                                            @if (isset($abouts->phone) || isset($abouts->address1) || isset($abouts->address2) || isset($abouts->address3))
                                                <div class="home__info">
                                                    @if (isset($abouts->phone))
                                                        <div class="info__item">
                                                            <p class="info__sup">Заказать мебель</p>
                                                            <a href="tel:+998{{ $abouts->phone }}"
                                                                class="info__txt">{{ $abouts->phone }}</a>
                                                        </div>
                                                    @endif
                                                    <div class="info__item">
                                                        <p class="info__sup">Адрес:</p>
                                                        <p class="info__txt">
                                                            <span class="orange__txt">
                                                                {{ $abouts->address1 }},{{ $abouts->address2 }},{{ $abouts->address3 }}
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-xs-12">
                                            <div class="home__img">
                                                <img src="{{ asset('img/home-sofa.png') }}" alt=""
                                                    class="home__pic home__sofa" />
                                                <img src="{{ asset('img/home-tree.png') }}" alt=""
                                                    class="home__pic home__tree" />
                                                <div class="home__bubbles">
                                                    <div class="small__bubble">
                                                        <p class="bubble__num">5+</p>
                                                        <p class="bubble__txt">На рынке</p>
                                                    </div>
                                                    <div class="big__bubble">
                                                        <p class="bubble__num">100+</p>
                                                        <p class="bubble__txt">Разновидностей мебели</p>
                                                        <i class="bx bx-arrow-back"
                                                            style="transform: rotate(180deg)"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination pager"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </section>

        </div>
    </header>


    <section class="about">
        <div class="about__container container">
            <div class="about__header">
                <img src="./img/logo/brand.svg" alt="" class="about__img" />
                <p class="about__txt">
                    Компания "LOFTY Soft" основана в 2018 году как воплощение идеи о
                    создании компании, предлагающей своим клиентам лучшую мебель для
                    ресторанов, баров и кафе по максимально выгодной цене.
                </p>
                <a href="{{ route('about_company') }}" class="about__link"> Подробнее </a>
            </div>
            <div class="about__cards">
                <div class="about__card">
                    <img src="./img/logo/delivery-truck.svg" alt="" class="card__pic" />
                    <h4 class="card__title">Бесплатная доставка</h4>
                    <p class="card__txt">
                        Изготавливает мебель в стиле лофт. А также любые конструкции из
                        металла.
                    </p>
                </div>
                <div class="about__card">
                    <img src="./img/logo/desk.svg" alt="" class="card__pic" />
                    <h4 class="card__title">Широкий ассортимент</h4>
                    <p class="card__txt">
                        Изготавливает мебель в стиле лофт. А также любые конструкции из
                        металла.
                    </p>
                </div>
                <div class="about__card">
                    <img src="./img/logo/diamond.svg" alt="" class="card__pic" />
                    <h4 class="card__title">Авторские проекты</h4>
                    <p class="card__txt">
                        Изготавливает мебель в стиле лофт. А также любые конструкции из
                        металла.
                    </p>
                </div>
            </div>
        </div>
    </section>

    @if (isset($categories[0]))
        <section class="categories">
            <div class="cat__top container">
                <h2 class="section__title cat__title">Категории продукции</h2>
                <a href="{{ route('products') }}" class="cat__link"> Перейти в каталог </a>
            </div>
            <div class="cat__container">
                {{-- @foreach ($categories as $category) --}}
                @if (isset($categories[0]))
                    <div class="cat__item">
                        <a href="{{ route('categories_show', ['category_id' => $categories[0]->id]) }}"
                            class="cat__item-link">
                            @if (isset($categories[0]->img))
                                <img src="{{ asset('uploads/category/' . $categories[0]->img) }}" alt=""
                                    class="cat__pic" />
                            @endif
                            @if (!isset($categories[0]->img))
                                <img src="{{ asset('uploads/category/default-image-720x530.jpg') }}" alt=""
                                    class="cat__pic" />
                            @endif
                            <p class="cat__item-title">
                                {{ $categories[0]->title['ru'] }} <i class="bx bxs-right-arrow"> </i>
                            </p>
                        </a>
                    </div>
                @endif
                <div class="cat__item half__life">
                    @if (isset($categories[1]))
                        <div class="half__item">
                            <a href="{{ route('categories_show', ['category_id' => $categories[1]->id]) }}"
                                class="cat__item-link">
                                @if (isset($categories[1]->img))
                                    <img src="{{ asset('uploads/category/' . $categories[1]->img) }}" alt=""
                                        class="cat__pic half__pic" />
                                @endif
                                @if (!isset($categories[1]->img))
                                    <img src="{{ asset('uploads/category/default-image-720x530.jpg') }}"
                                        alt="" class="cat__pic half__pic" />
                                @endif
                                <p class="cat__item-title">
                                    {{ $categories[1]->title['ru'] }} <i class="bx bxs-right-arrow"></i>
                                </p>
                            </a>
                        </div>
                    @endif
                    @if (isset($categories[2]))
                        <div class="half__item">
                            <a href="{{ route('categories_show', ['category_id' => $categories[2]->id]) }}"
                                class="cat__item-link">
                                @if (isset($categories[2]->img))
                                    <img src="{{ asset('uploads/category/' . $categories[2]->img) }}" alt=""
                                        class="cat__pic half__pic" />
                                @endif
                                @if (!isset($categories[2]->img))
                                    <img src="{{ asset('uploads/category/default-image-720x530.jpg') }}"
                                        alt="" class="cat__pic half__pic" />
                                @endif
                                <p class="cat__item-title">
                                    {{ $categories[2]->title['ru'] }} <i class="bx bxs-right-arrow"></i>
                                </p>
                            </a>
                        </div>
                    @endif
                </div>
                @if (isset($categories[3]))
                    <div class="cat__item">
                        <a href="{{ route('categories_show', ['category_id' => $categories[3]->id]) }}"
                            class="cat__item-link">
                            @if (isset($categories[3]->img))
                                <img src="{{ asset('uploads/category/' . $categories[3]->img) }}" alt=""
                                    class="cat__pic" />
                            @endif
                            @if (!isset($categories[3]->img))
                                <img src="{{ asset('uploads/category/default-image-720x530.jpg') }}" alt=""
                                    class="cat__pic" />
                            @endif
                            <p class="cat__item-title">
                                {{ $categories[3]->title['ru'] }} <i class="bx bxs-right-arrow"></i>
                            </p>
                        </a>
                    </div>
                @endif
                @if (isset($categories[4]))
                    <div class="cat__item">
                        <a href="{{ route('categories_show', ['category_id' => $categories[4]->id]) }}"
                            class="cat__item-link">
                            @if (isset($categories[4]->img))
                                <img src="{{ asset('uploads/category/' . $categories[4]->img) }}" alt=""
                                    class="cat__pic" />
                            @endif
                            @if (!isset($categories[4]->img))
                                <img src="{{ asset('uploads/category/default-image-720x530.jpg') }}" alt=""
                                    class="cat__pic" />
                            @endif
                            <p class="cat__item-title">
                                {{ $categories[4]->title['ru'] }} <i class="bx bxs-right-arrow"></i>
                            </p>
                        </a>
                    </div>
                @endif
                {{-- @endforeach --}}
            </div>
        </section>
    @endif

    @if (isset($products[0]))
        <section class="products">
            <div class="prod__container container">
                <div class="prod__top">
                    <h4 class="prod__title">Продукции</h4>
                    <a href="{{ route('products') }}" class="prod__link"> Перейти в каталог </a>
                </div>
                <div class="prod__items">
                    {{-- @dd($products); --}}
                    @foreach ($products as $product)
                        <div class="prod__item ">
                            <a href="{{ route('inner_page', ['id' => $product->id]) }}" class="prod__item-link">
                                {{-- @foreach ($product->productImage as $item) --}}
                                <div class="prod__img">
                                    @if (isset($product->productImage[0]->img))
                                        <img src="{{ asset($product->productImage[0]->img) }}" alt=""
                                            class="prod__pic" />
                                    @endif
                                    @if (!isset($product->productImage[0]->img))
                                        <img src="{{ asset('upload/product_image/default-image-720x530.jpg') }}"
                                            alt="" class="prod__pic" />
                                    @endif
                                </div>
                            </a>
                            {{-- @if (!isset($product->subtitle) || !isset($product->price))
                                <div class="prod__content d-flex justify-content-between main-content " style="min-height: 144px ">
                                    @if (isset($product->title))
                                        <p class="prod__sup">{{ $product->title['ru'] }}</p>
                                    @endif
                                    @if (isset($product->subtitle))
                                        <p class="prod__name">{{ $product->subtitle['ru'] }}</p>
                                    @endif
                                    <div class="prod__bottom postion:absolute bottom:0 right:0 " style="position: absolute bottom:0px right:absolute align-items:flex-end justify-content: space-between align-content:normal  flex-wrap:nowrap ">
                                        @if (isset($product->price))
                                            <p class="prod__price">
                                                {{ $product->price }} <span class="small__txt">сум</span>
                                            </p>
                                        @endif
                                        <a href="{{ route('inner_page', ['id' => $product->id]) }}"
                                            class="order__btn right main-content d-flex">
                                            подробнее
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="prod__content " >
                                    @if (isset($product->title))
                                        <p class="prod__sup">{{ $product->title['ru'] }}</p>
                                    @endif
                                    @if (isset($product->subtitle))
                                        <p class="prod__name">{{ $product->subtitle['ru'] }}</p>
                                    @endif
                                    <div class="prod__bottom">
                                        @if (isset($product->price))
                                            <p class="prod__price">
                                                {{ $product->price }} <span class="small__txt">сум</span>
                                            </p>
                                        @endif
                                        <a href="{{ route('inner_page', ['id' => $product->id]) }}"
                                            class="order__btn">
                                            подробнее
                                        </a>
                                    </div>
                                </div>
                            @endif --}}

                            <div class="prod__content ">
                                <div class="pb-5">

                                    @if (isset($product->category->title))
                                    <p class="prod__sup">{{ $product->category->title['ru']}}</p>
                                    @endif
                                    @if (isset($product->title))
                                    <p class="prod__name">{{ $product->title['ru'] }}</p>
                                    @endif
                                </div>
                                    <div class="prod__bottom row"
                                    style="position: relative top:40px left:40px margin-left:auto">
                                    <div class="col-md-8">

                                        @if (isset($product->price))
                                            <p class="prod__price" style="margin-left: 12px">
                                                {{ $product->price }} <span class="small__txt">сум</span>
                                            </p>
                                        @endif
                                    </div>
                                    <div class="col-md-4">

                                        <a href="{{ route('inner_page', ['id' => $product->id]) }}"
                                            class="order__btn">
                                            подробнее
                                        </a>
                                    </div>
                                </div>
                            </div>


                            {{-- <div class="prod__content ">
                                @if (isset($product->title))
                                    <p class="prod__sup">{{ $product->title['ru'] }}</p>
                                @endif
                                @if (isset($product->subtitle))
                                    <p class="prod__name">{{ $product->subtitle['ru'] }}</p>
                                @endif
                                <div class="prod__bottom">
                                    @if (isset($product->price))
                                        <p class="prod__price">
                                            {{ $product->price }} <span class="small__txt">сум</span>
                                        </p>
                                    @endif
                                    <a href="{{ route('inner_page', ['id' => $product->id]) }}" class="order__btn">
                                        подробнее
                                    </a>
                                </div>
                            </div> --}}

                            {{-- @endforeach --}}
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (isset($abouts->telegram_user))
        <section class="order">
            <div class="order__container container">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <h2 class="order__title">
                            У Вас есть <br />
                            индивидуальный заказ?
                        </h2>
                        <p class="order__txt">
                            Позвоните или напишите в
                            <span class="orange__txt">Telegram</span> — cделаем расчет <br />
                            металлической конструкции за 5 минут!
                        </p>
                        <a href="{{ $abouts->telegram_user }}" class="home__btn aespa__btn">
                            <i class="bx bxl-telegram"></i> Написать в Telegram
                        </a>
                    </div>
                    <div class="col-md-6 col-xs-12 mamba">
                        <img src="{{ asset('img/home.png') }}" alt="" class="order__pic" />
                    </div>
                </div>
            </div>
        </section>
    @endif



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
                            <a class="footer__link @if (request()->is('abouts') || request()->is('abouts/*')) active @endif"
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
                                {{ $abouts->address1 ? $abouts->address1 : '' }}
                                {{ $abouts->address2 ? ', ' . $abouts->address2 : '' }}
                                {{ $abouts->address3 ? ', ' . $abouts->address3 : '' }}</p>
                        </div>
                    @endif
                    @if (isset($abouts->telegram_link) || isset($abouts->instagram))
                        <div class="info__item">
                            <p class="info__sup">Социальные сети:</p>
                            <div class="socials">
                                @if (isset($abouts->telegram_link))
                                    <a class="foot-info__txt social" href="{{ $abouts->telegram_link }}">
                                        <i class="bx bxl-telegram"></i>
                                    </a>
                                @endif
                                @if (isset($abouts->instagram))
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
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('app/notyf.min.js') }}"></script>
</body>

</html>
