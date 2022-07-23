@extends('layouts.web')


@section('connect')
    <section class="pt-10 pb-11 pb-lg-14" data-animated-id="2">
        <div class="container">
            <div class="row overflow-hidden">
                <div class="col-md-3 mb-10 mb-md-0 primary-sidebar sidebar-sticky" id="sidebar">
                    <div class="primary-sidebar-inner" style="position: static; left: auto; width: 270px">
                        <div class="card border-0 mb-7">
                            <div class="card-header bg-transparent border-0 p-0">
                                <h3 class="card-title fs-20 mb-0">Categories</h3>
                            </div>
                            <div class="card-body px-0 pt-4 pb-0">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($categories as $category)
                                        <li class="mb-3">
                                            <a href="{{ route('categories_show', ['category_id' => $category->id]) }}"
                                                class="text-secondary hover-primary border-bottom border-white border-hover-primary d-inline-block lh-12">{{ $category->title['ru'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card border-0">
                    </div>
                    <div class="d-flex mb-6">
                        <div class="d-flex align-items-center text-primary">
                            Showing 1-15 of 90 results
                        </div>
                    </div>
                    {{-- @if(isset($products[0])) --}}
                    <div class="prod__items inner-items">
                        @foreach ($products as $product)
                            <div class="prod__item">

                                <a href="{{ route('inner_page', ['id' => $product->id]) }}" class="prod__item-link">

                                    <div class="prod__img">
                                        <img src="{{ asset($product->productImage[0]->img) }}" alt=""
                                            class="prod__pic" />
                                    </div>

                                    <div class="prod__content">
                                        <p class="prod__sup">{{ $product->title['ru'] }}</p>
                                        <p class="prod__name">{{ $product->subtitle['ru'] }}</p>
                                        <div class="prod__bottom">
                                            <p class="prod__price">
                                                {{ $product->price }} <span class="small__txt">сум</span>
                                            </p>
                                            <button class="order__btn">
                                                В корзину <i class="bx bx-cart-add"></i>
                                            </button>
                                        </div>
                                    </div>

                                </a>
                            </div>
                        @endforeach
                    </div>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </section>

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
                    <a href="#" class="home__btn aespa__btn">
                        <i class="bx bxl-telegram"></i> Написать в Telegram
                    </a>
                </div>
                <div class="col-md-6 col-xs-12 mamba">
                    <img src="./img/home.png" alt="" class="order__pic" />
                </div>
            </div>
        </div>
    </section>
@endsection
