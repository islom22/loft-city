@extends('layouts.web')


@section('connect')
    <style>
        .active {
            font-weight: bold
        }
    </style>

    <style>
        ul.pagination {
            justify-content: center;
            margin-top: 48px;
        }

        .cat__header {
            background: #f7f7f7;
            padding: 120px 0;
        }

        .header__title {
            font-size: 40px;
            font-weight: 800;
            text-align: center;
            text-transform: uppercase;
        }

        .crumbs {
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 20px;
        }

        .last__page {
            color: var(--orange);
        }

        .sider {
            background: #f7f7f7;
            padding: 32px;
        }

        .cat__title {
            font-size: 32px;
        }

        @media screen and (max-width: 767px) {
            .header__title {
                font-size: 24px;
            }

            .cat__header {
                padding: 100px 0 60px 0;
            }

            #sidebar {
                padding: 0 !important;
            }

            /*.row{
                                              width: initial !important;
                                            }*/
            .primary-sidebar-inner {
                width: 100% !important;
            }

            .sider {
                margin-bottom: 0 !important;
            }

            .no__padding {
                padding: 0 !important;
            }
        }
    </style>

    <section class="cat__header">
        <div class="container">
            <div class="crumbs">
                <a class="last__page" href="{{ route('index') }}">
                    Главная
                </a>
                <p>
                    /
                </p>
                <p class="this__page">
                    {{ $category->title['ru'] }}
                </p>
            </div>
            <h4 class="header__title">
                {{ $category->title['ru'] }}
            </h4>
        </div>
    </section>

    <section class="pt-10 pb-11 pb-lg-14" data-animated-id="2">
        <div class="container">
            <div class="row overflow-hidden d-flex">
                @if (isset($categories[0]))
                    <div class="col-md-3 mb-10 mb-md-0 primary-sidebar sidebar-sticky stop" id="sidebar">
                        <div class="primary-sidebar-inner" style="position: static; left: auto; width: 270px">
                            <div class="card border-0 mb-7 sider">
                                <div class="card-header bg-transparent border-0 p-0">
                                    <h3 class="card-title fs-20 mb-0 cat__title">Каталог</h3>
                                </div>
                                <div class="card-body px-0 pt-4 pb-0">
                                    <ul class="list-unstyled mb-0">
                                        @foreach ($categories as $category)
                                            <li class="mb-3">
                                                <a href="{{ route('categories_show', ['category_id' => $category->id]) }}"
                                                    class="text-secondary hover-primary border-bottom border-white border-hover-primary d-inline-block lh-12
                                                    @if (request()->is("categories/$category->id")) active @endif ">
                                                    {{ $category->title['ru'] }} </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-md-9">
                    <div class="card border-0">
                    </div>
                    <div class="d-flex ">
                        {{-- <div class="d-flex align-items-center text-primary">
                Showing 1-15 of 90 results  
              </div> --}}
                    </div>
                    @if (isset($products[0]))
                        <div class="prod__items inner-items">
                            {{-- @dd($products); --}}
                            @foreach ($products as $product)
                                <div class="prod__item">

                                    <a href="{{ route('inner_page', ['id' => $product->id]) }}" class="prod__item-link">
                                        {{-- <a href="#" class="prod__item-link"> --}}

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
                                            {{-- <img src="{{ asset($product->productImage()->exists() ? $product->productImage[0]->img : '') }}"
                                                alt="" class="prod__pic" /> --}}
                                        </div>

                                        @if (!isset($product->subtitle) || !isset($product->price))
                                            <div class="prod__content d-flex justify-content-between">
                                                @if (isset($product->category->title))
                                                    <p class="prod__sup">{{ $product->category->title['ru'] }}</p>
                                                @endif
                                                @if (isset($product->title))
                                                    <p class="prod__name">{{ $product->title['ru'] }}</p>
                                                @endif
                                                <div class="prod__bottom">
                                                    @if (isset($product->price))
                                                        <p class="prod__price" style="margin-left: 12px">
                                                            {{ $product->price }} <span class="small__txt">сум</span>
                                                        </p>
                                                    @endif
                                                    <a href="{{ route('inner_page', ['id' => $product->id]) }}"
                                                        class="order__btn">
                                                        подробнее
                                                    </a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="prod__content ">
                                                @if (isset($product->category->title))
                                                    <p class="prod__sup">{{ $product->category->title['ru'] }}</p>
                                                @endif
                                                @if (isset($product->title))
                                                    <p class="prod__name" style="padding-bottom: 50px">{{ $product->title['ru'] }}</p>
                                                @endif
                                                <div class="prod__bottom">
                                                    @if (isset($product->price))
                                                        <p class="prod__price" style="margin-left: 12px">
                                                            {{ $product->price }} <span class="small__txt">сум</span>
                                                        </p>
                                                    @endif
                                                    <a href="{{ route('inner_page', ['id' => $product->id]) }}"
                                                        class="order__btn">
                                                        подробнее
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                        {{-- @endforeach --}}

                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>

    @if (isset($abouts))
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
                            <span class="orange__txt">Telegram</span> — cделаем расчет
                            <br />
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
@endsection
