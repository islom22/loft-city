@extends('layouts.web')


@section('connect')
    {{-- @dd($products);
    <section>
        <div class="container__size">
            <div class="slider__grid">
                <div>
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            @foreach ($products->productImage as $product)
                                <div class="swiper-slide">
                                    <div class="slider__container">
                                        <div>
                                            <img src="{{ asset($product->img) }}" />
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($products->productImage as $product)
                                <div class="swiper-slide">
                                    <img src="{{ asset($product->img) }}" />
                                    {{-- <img src="{{asset($product->productImage[o]->img)}}" /> --}}
    {{-- </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="grid__sec__half">
                    <div>
                        {{-- <h3 class="grid__sec__half__accessoies">{{ $products->category->title['ru'] }}</h3> --}}
    {{-- <h1 class="grid__sec__half__title mb-2">{{ $products->title['ru'] }}</h1>
                        <h3 class="grid__sec__half__price"> {{ $products->price }} <span class="small__txt">сум</h3>
                        <div class="clock__div">
                            <img src="{{ asset('icons/icons8-alarm-clock-50.png') }}" alt="clock" />
                            <h4>Only <span>{{ $products->left }}</span> Left in Stock</h4>
                        </div>
                        <div class="slider__description">
                            <p>
                                {{ $products->subtitle['ru'] }}
                            </p>
                        </div>

                        <div class="finished_pay">
                            <form action="{{ route('to_basket') }}" method="get">
                                @csrf
                                <input type="hidden" value="{{ $products->id }}" name="product_id">
                                <div>
                                    <button class="mb-2" id="addToCat">Добавить в корзину</button>
                                </div>
                            </form>
                            <p class="pt-5">Способ оплаты при заказе</p>
                            <div class="pay__card__icons">
                                <div class="payCard__imgWrapper">
                                    <img src="{{ asset('img/p1.png') }}" alt="visa" />
                                </div>
                                <div class="payCard__imgWrapper">
                                    <img src="{{ asset('img/p-2.svg') }}" alt="visa" />
                                </div>
                                <div class="payCard__imgWrapper">
                                    <img src="{{ asset('img/p3.png') }}" alt="visa" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>
    <section>

    </section>
    <section>
        <div class="container__size">
            <div class="inter__page__tab">
                <div class="product__tab__wrapper">
                    <button class="product__tab active__link__product" onclick="infofunc(event, 'dates')">
                        Description
                    </button>
                </div>
                <div class="inter__page__tab__content">
                    <div id="dates" class="product__tab__content">
                        <div class="product__tab__content__itemOne">

                            {{-- {{-- <div class="product__tab__content__itemOne__imgDiv">
                                <img {{-- src="{{asset($products->productImage[0]->img)}}" src="{{ asset('img/poster.png') }}"
                                    alt="product__tab__content__img" />
                            </div>

                            <div class="product__tab__content__itemOne__p__wrapper">
                                <h4
                                    style="
                        font-size: 40px;
                        font-weight: 800;
                        margin-bottom: 2rem;
                      ">
                                    Description
                                </h4>
                                <p>
                                    {!! $products->desc['ru'] !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section>
        <div class="container__size">
            <div class="like__content__title__wrapper">
                <h1>Похожие продукты</h1>
            </div>
            <div>

                <div class="prod__items">
                    {{-- @dd($products); --}}
    {{-- @foreach ($admins as $product)
                        <div class="prod__item">
                            <a href="{{ route('inner_page', ['id' => $product->id]) }}" class="prod__item-link">
                                {{-- @foreach ($product->productImage as $item) --}}
    {{-- <div class="prod__img">
                                    @if ($product->productImage)
                                        <img src="{{ asset($product->productImage[0]->img) }}" alt=""
                                            class="prod__pic" />
                                    @endif
                                </div>
                            </a>
                            <div class="prod__content">
                                <p class="prod__sup">{{ $product->title['ru'] }}</p>
                                <p class="prod__name">{{ $product->subtitle['ru'] }}</p>
                                <div class="prod__bottom">
                                    <p class="prod__price">
                                        {{ $product->price }} <span class="small__txt">сум</span>
                                    </p>
                                    <a href="{{ route('inner_page', ['id' => $product->id]) }}" class="order__btn">
                                        подробнее
                                    {{-- </a>
                                </div> --}}
    {{-- </div>
                            {{-- @endforeach --}}
    {{-- </div>
                    {{-- @endforeach
                {{-- </div> --}}
    {{-- </div>
        </div>
    </section> --}}

    <style type="text/css">
        body {
            overflow-x: hidden !important;
        }

        h1,
        h2,
        h3,
        h4,
        p,
        a {
            font-family: "Inter" !important;
        }

        .btn {
            width: 40% !important;
        }

        .like__card__grid {
            margin-bottom: 120px;
        }

        .swiper-slide {
            /*height: 600px !important;*/
        }

        .mySwiper .swiper-slide {
            height: 150px !important;
        }

        .fslightbox-source {
            width: 500px !important;
            height: auto !important;
            object-fit: contain !important;
        }

        .slider__grid {
            grid-template-columns: 20% 40% 35%;
            gap: 2rem;
        }

        .card-title {
            font-size: 32px !important;
            font-weight: 700;
        }

        .name {
            font-size: 48px;
            font-weight: 800;
        }

        .sider {
            background: #f7f7f7;
            padding: 32px;
        }

        @media screen and (max-width: 992px) {
            .slider__grid {
                grid-template-columns: repeat(1, 1fr);
            }

            .swiper-slide img {
                width: initial !important;
                height: initial !important;
            }

            .btn {
                width: 300px !important;
            }

            .widher {
                width: 500px !important;
            }
        }

        @media screen and (max-width: 767px) {
            .widher {
                width: 370px !important;
            }
        }

        @media screen and (max-width: 400px) {
            .widher {
                width: 280px !important;
            }

            .swiper-slide {
                height: auto !important;
            }

            .btn {
                width: 200px !important;
            }
        }
    </style>

    <section>
        <div class="container">

            <div class="slider__grid">
                @if (isset($categories[0]))
                    <div class="primary-sidebar sidebar-sticky" id="sidebar">
                        <div class="primary-sidebar-inner" style="position: static; left: auto;">
                            <div class="card border-0 mb-7 sider">
                                <div class="card-header bg-transparent border-0 p-0">
                                    <h3 class="card-title fs-20 mb-0">Каталог</h3>
                                </div>
                                <div class="card-body px-0 pt-4 pb-0">
                                    <ul class="list-unstyled mb-0">
                                        @foreach ($categories as $category)
                                            <li class="mb-3">
                                                <a href="{{ route('categories_show', ['category_id' => $category->id]) }}"
                                                    class="text-secondary hover-primary border-bottom border-white border-hover-primary d-inline-block lh-12">
                                                    {{ $category->title['ru'] }} </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="widher">
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            @foreach ($products->productImage as $product)
                                <div class="swiper-slide">
                                    <div class="slider__container">
                                        <a data-fslightbox="gallery" {{-- href="https://loftcity.uz/upload/product_image/f4661398cb1a3abd3ffe58600bf11322.jpg" --}}>
                                            <div>
                                                <img src="{{ asset($product->img) }}" />
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($products->productImage as $product)
                                <div class="swiper-slide">
                                    <a data-fslightbox="gallery" {{-- href="https://loftcity.uz/upload/product_image/f4661398cb1a3abd3ffe58600bf11322.jpg" --}}>
                                        <div>
                                            <img src="{{ asset($product->img) }}" />
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="grid__sec__half">
                    <div class="widher">
                        @if (isset($products->category->title))
                            <h3 class="grid__sec__half__accessoies">{{ $products->category->title['ru'] }}</h3>
                        @endif
                        @if (isset($products->title))
                            <h1 class="grid__sec__half__title mb-2 name">{{ $products->title['ru'] }}</h1>
                        @endif
                        @if (isset($products->price))
                            <h3 class="grid__sec__half__price"> {{ $products->price }} <span class="small__txt">сум</h3>
                        @endif
                        @if (isset($products->left))
                            <div class="clock__div">
                                <h4 class="mb-0 ms-0">В наличии осталось: <span>{{ $products->left }}</span></h4>
                            </div>
                        @endif
                        @if (isset($products->subtitle))
                            <div class="slider__description">
                                <p>
                                    {{ $products->subtitle['ru'] }}
                                </p>
                            </div>
                        @endif
                        <div class="finished_pay">
                            <div>
                                <form action="{{ route('to_basket') }}" method="get">
                                    @csrf
                                    <input type="hidden" value="{{ $products->id }}" name="product_id">
                                    <div>
                                        <button class="mb-2" id="addToCat">Добавить в корзину</button>
                                    </div>
                                </form>
                            </div>
                            <p class="pt-5">Способы оплаты при заказе</p>
                            <div class="pay__card__icons">
                                <div class="payCard__imgWrapper">
                                    <img src="https://loftcity.uz/img/p1.png" alt="visa" />
                                </div>
                                <div class="payCard__imgWrapper">
                                    <img src="https://loftcity.uz/img/p-2.svg" alt="visa" />
                                </div>
                                <div class="payCard__imgWrapper">
                                    <img src="https://loftcity.uz/img/p3.png" alt="visa" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>

    <section style="margin-bottom: 40px;">
        <div class="container__size">
            <div class="inter__page__tab">
                <div class="product__tab__wrapper">
                    <h4
                        style="
                        font-size: 40px;
                        font-weight: 800;
                        margin-bottom: .5rem;
                      ">
                        Описание
                    </h4>
                </div>
                <div class="inter__page__tab__content">
                    <div id="dates" class="product__tab__content">
                        <div class="product__tab__content__itemOne">

                            <div class="product__tab__content__itemOne__imgDiv">
                                <img src="https://loftcity.uz/img/poster.png" alt="product__tab__content__img" />
                            </div>
                            @if (isset($products->desc))
                                <div class="product__tab__content__itemOne__p__wrapper">
                                    <p>
                                        {!! $products->desc['ru'] !!}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </section>

    @if (isset($admins[0]))
        <section>
            <div class="container__size">
                <div class="like__content__title__wrapper">
                    <h1>Похожие продукты</h1>
                </div>
                <div>

                    <div class="like__card__wrapper">
                        <div class="like__card__grid">
                            @foreach ($admins as $product)
                                <div class="prod__item">
                                    <a href="{{ route('inner_page', ['id' => $product->id]) }}" class="prod__item-link">
                                        <div class="prod__img">
                                            @if ($product->productImage)
                                                <img src="{{ asset($product->productImage[0]->img) }}" alt=""
                                                    class="prod__pic" />
                                            @endif
                                        </div>

                                        <div class="prod__content">
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
                                                <button class="order__btn">
                                                    Подробнее
                                                    <!-- <i class="bx bx-cart-add"></i> -->
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });

        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            thumbs: {
                swiper: swiper,
            },
        });
    </script>
    <script src="https://loftcity.uz/js/inter-page.js"></script>
    <script src="https://loftcity.uz/js/fslightbox.js"></script>



    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });

        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            thumbs: {
                swiper: swiper,
            },
        });
    </script>
    <script src="{{ asset('js/inter-page.js') }}"></script>
@endsection

{{-- @section('script')
      <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script>
        $(document).ready(function(){
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $('#addToCat').click(function(){
            $.ajax({
              method: 'POST',
              url: "{{route('to_basket')}}",
              dataType: "json",
              data: {product_id: 3},
              success(data){
                console.log(data);
              },
              error(er){
                console.log(er)
              }
            });
          })
          
        });
      </script>
   @endsection --}}
