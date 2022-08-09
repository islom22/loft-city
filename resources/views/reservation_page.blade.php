@extends('layouts.web')


@section('connect')
    <section>
        <div class="container__size">
            <div class="divider__wrapper">
                <a href="{{ route('index') }}" class="divider__about">Главная</a>
                <p class="divider__line">/</p>
                <a href="{{ route('reservation_page') }}" class="divider__about">Корзина</a>
                <p class="divider__line">/</p>
                <a href="#" class="divider__main">Оформить заказ</a>
            </div>
        </div>
    </section>
    <section>
        <div class="container__size">
            <div>
                <h1 class="reservation__title">Оформить заказ</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif --}}
            </div>
            <div class="reservation__wrapper">
                <div>
                    <form class="form__wrapper" action="{{ route('order') }}" method="get" enctype='multipart/form-data'>
                        @csrf
                        <div class="input__flex__box__wrapper">
                            <div class="input__flex__wrapper">
                                <div>
                                    <p class="reservation__input__label">Ф.И.О<sup>*</sup></p>
                                    <input class="reservation__input" value="{{ old('name') }}" required
                                        placeholder="Ф.И.О" type="text" name="name" />
                                </div>
                                <div class="e__mail__box">
                                    <p class="reservation__input__label">Электронная почта</p>
                                    <input class="reservation__input" value="{{ old('email') }}"
                                        placeholder="Электронная почта" type="email" name="email" />
                                </div>
                            </div>
                            <div class="input__flex__wrapper input__flex__wrapper__second">
                                <div class="input__box__second telephone__box">
                                    <p class="reservation__input__label">
                                        Телефон<sup>*</sup>
                                    </p>
                                    <input class="reservation__input" value="{{ old('phone') }}" required
                                        placeholder="Телефон" type="number" name="phone" />
                                </div>
                                <div class="input__box__second select__box">
                                    <p class="reservation__input__label">
                                        Город / Район<sup>*</sup>
                                    </p>
                                    <select class="reservation__input select__bg" name="city">
                                        <option value="Республика Каракалпакстан">Республика Каракалпакстан</option>
                                        <option value="Андижанская область">Андижанская область</option>
                                        <option value="Бухарская область">Бухарская область</option>
                                        <option value="Джизакская область">Джизакская область</option>
                                        <option value="Кашкадарьинская область">Кашкадарьинская область</option>
                                        <option value="Навоийская област">Навоийская област</option>
                                        <option value="Наманганская область">Наманганская область</option>
                                        <option value="Самаркандская область">Самаркандская область</option>
                                        <option value="Сурхандарьинская область">Сурхандарьинская область</option>
                                        <option value="Сырдарьинская область">Сырдарьинская область</option>
                                        <option value="Ташкентская область">Ташкентская область</option>
                                        <option value="Ферганская область">Ферганская область</option>
                                        <option value="Хорезмская область">Хорезмская область</option>
                                        <option value="Ташкент">Ташкент</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="textarea__wrapper">
                                <p class="reservation__input__label">Адрес<sup>*</sup></p>
                                <textarea placeholder="Адрес" name="address">{{ old('address') }}</textarea>
                            </div>
                        </div>
                        <div>
                            <div class="payment">
                                <div>
                                    <h1>Способ оплаты</h1>
                                </div>
                                <div class="pay__radio__wrapper">
                                    <div class="pay__choose">
                                        <label>
                                            <input type="radio" name="payment_method" checked value="cash"
                                                {{ old('payment_method') }} />
                                            <span class="redio__design"></span>
                                            <span class="radio__name">Наличка</span>
                                        </label>
                                    </div>
                                    <div class="pay__choose pay__choose__second">
                                        <label>
                                            <input type="radio" name="payment_method" value="card"
                                                {{ old('payment_method') }} />
                                            <span class="redio__design"></span>
                                            <span class="radio__name">С картой</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="payment payment__buy">
                                <div>
                                    <h1>Как купить?</h1>
                                </div>
                                <div class="pay__radio__wrapper">
                                    <div class="pay__choose">
                                        <label>
                                            <input type="radio" name="with_delivery" data-value="samovivoz"
                                                value="Забрать от шоу рума" {{ old('with_delivery') }} checked />
                                            <span class="redio__design"></span>
                                            <span class="radio__name">Забрать от шоу рума</span>
                                        </label>
                                    </div>
                                    <div class="pay__choose pay__for__buy">
                                        <label>
                                            <input type="radio" name="with_delivery" data-value="s_dostavkoy"
                                                value="С доставкой?" {{ old('with_delivery') }} />
                                            <span class="redio__design"></span>
                                            <span class="radio__name">С доставкой?</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="form__btn__wrapper">
                                <button href="{{ route('reservation_page') }}">Назад</button>
                                <button type="submit">Заказать</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                    @if (session()->get('products_id'))
                        <div class="reservation__second__half">
                            <div class="row">
                                <h2 class="reservation__second__half__title">
                                    В корзине {{ session()->get('products_count') }} товара
                                </h2>
                                @php $price = 0; @endphp
                                {{-- @foreach (session()->get('products_id') as $key => $value)
                                        {{-- @dd(session()->get('products_id')); --}}
                                {{-- @php
                                            $product = \App\Models\Product::find($value);
                                            if ($product) {
                                                $price += $product->price;
                                            }
                                        @endphp
                                        {{-- @dump($product) --}}
                                {{-- @endforeach --}}
                                @foreach (array_unique(session()->get('products_id')) as $key => $value)
                                    <form action="{{ route('from_basket') }}" method="post">
                                        @csrf
                                        @php
                                            $product = \App\Models\Product::find($value);
                                            if ($product) {
                                                $price += $product->price;
                                            }
                                        @endphp
                                        @if ($product)
                                            <input type="hidden" name="product_id" type=""
                                                value="{{ $value }}">
                                            <div class="reservation__second__half__card">
                                                <div>
                                                    <button class="x">
                                                        <i class="bx bx-x"></i>
                                                    </button>
                                                    <div class="reservation__second__half__image__wrapper">
                                                        @if (isset($product->productImage[0]))
                                                            <img src="{{ asset($product->productImage[0]->img) }}"
                                                                alt="form__img" />
                                                        @else
                                                            <img src="{{ asset('upload/product_image/default-image-720x530.jpg') }}"
                                                                alt="form__img" />
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="reservation__second__half__desctiptions">
                                                    @if (isset($product->title))
                                                        <h4>{{ $product->title['ru'] }}</h4>
                                                    @endif
                                                    @if (isset($product->subtitle))
                                                        <h5>{{ $product->subtitle['ru'] }}</h5>
                                                    @endif
                                                    @if (isset($product->price))
                                                        <h4>
                                                            {{ $product->price }} <span class="small__txt">сум</span>
                                                        </h4>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    </form>
                                @endforeach
                                <div>
                                    <hr class="reservation__second__half__hr" />
                                </div>
                                <div class="prices__wrapper prices__wrapper__first">
                                    <h3>Итого по заказу:</h3>
                                    <h3>{{ $price }} <span class="small__txt">сум</span> </h3>
                                </div>
                                <div class="prices__wrapper prices__wrapper__second d-none " id="delivery_price">
                                    <h3>Доставка:</h3>
                                    <h3>{{ $dast->dastavka }} <span class="small__txt">сум</span> </h3>
                                </div>
                                <div>
                                    <hr class="reservation__second__half__hr" />
                                </div>
                                <div class="total__price">
                                    <h3>Итог заказа:</h3>
                                    <div id="total_price_with_delivery" class="d-none">

                                        <h3>{{ $price + $dast->dastavka }} <span class="small__txt">сум</span>
                                        </h3>
                                    </div>

                                    <div id="total_price_without_delivery">

                                        <h3>{{ $price }} <span class="small__txt">сум</span>
                                        </h3>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- @dd(session()->get('products_id')); --}}
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


@section('script')
    <script>
        let xButtons = document.querySelectorAll(".x");
        xCard = document.querySelector(".cardo");

        function deleteProd() {
            xCard.remove();
        }

        var with_delivery_checkbox = document.querySelector('[data-value="s_dostavkoy"]');
        var without_delivery_checkbox = document.querySelector('[data-value="samovivoz"]');

        with_delivery_checkbox.addEventListener('change', function() {
            // document.getElementById('amount_without_delivery').classList.add('d-none');
            // document.getElementById('amount_with_delivery').classList.remove('d-none');
            document.getElementById('delivery_price').classList.remove('d-none');
            document.getElementById('total_price_without_delivery').classList.add('d-none');
            document.getElementById('total_price_with_delivery').classList.remove('d-none');
        });
        without_delivery_checkbox.addEventListener('change', function() {
            // document.getElementById('amount_without_delivery').classList.remove('d-none');
            // document.getElementById('amount_with_delivery').classList.add('d-none');
            document.getElementById('delivery_price').classList.add('d-none');
            document.getElementById('total_price_without_delivery').classList.remove('d-none');
            document.getElementById('total_price_with_delivery').classList.add('d-none');
        });
    </script>
    <script>
        let burger = document.getElementById("burger")
        let collapse = document.getElementById("collapse")

        if (burger) {
            burger.addEventListener('click', () => {
                collapse.classList.toggle('show-nav')
                burger.classList.toggle('x-button')
            })
        }
    </script>

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
@endsection
