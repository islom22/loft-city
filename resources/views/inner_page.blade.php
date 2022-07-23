@extends('layouts.web')


@section('connect')
  @dd($products);
      <section>
        <div class="container__size">
          <div class="slider__grid">
            <div>
              <div class="swiper mySwiper2">
                <div class="swiper-wrapper">
                  
                  @foreach($products->productImage as $product)
                    <div class="swiper-slide">
                      <div class="slider__container">
                        <div>
                          <img
                          src="{{ asset($product->img) }}"
                          />
                        </div>
                      </div>
                    </div>
                  @endforeach
                  {{-- <div class="swiper-slide">
                    <div class="slider__container">
                      <div>
                        <img
                          src="{{ asset('https://swiperjs.com/demos/images/nature-2.jpg') }}"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="slider__container">
                      <div>
                        <img
                          src="{{ asset('https://swiperjs.com/demos/images/nature-3.jpg') }}"
                        />
                      </div>
                    </div>
                  </div> --}}
                </div>
              </div>
              <div thumbsSlider="" class="swiper mySwiper">
                  <div class="swiper-wrapper">
                    @foreach($products->productImage as $product)
                      <div class="swiper-slide">
                        <img
                        src="{{ asset($product->img) }}"
                        />
                        {{-- <img src="{{asset($product->productImage[o]->img)}}" /> --}}
                      </div>
                    @endforeach
                  </div>
                  {{-- <div class="swiper-slide">
                    <img src="{{ asset('https://swiperjs.com/demos/images/nature-2.jpg') }}" />
                  </div>
                  <div class="swiper-slide">
                    <img src="{{ asset('https://swiperjs.com/demos/images/nature-3.jpg') }}" />
                  </div> --}}
              </div>
            </div>
            <div class="grid__sec__half">
              <div>
             
                <h3 class="grid__sec__half__accessoies">{{ $products->category->title['ru'] }}</h3>
                <h1 class="grid__sec__half__title mb-2">{{ $products->title['ru'] }}</h1>
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
                  <div>
                    <button class="mb-2">Добавить в корзину</button>
                  </div>
                  <p class="pt-5">Способ оплаты при заказе</p>
                  <div class="pay__card__icons">
                    <div class="payCard__imgWrapper">
                      <img src="{{ asset('img/p1.png')}}"  alt="visa" />
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
              <button
                class="product__tab active__link__product"
                onclick="infofunc(event, 'dates')"
              >
                Description
              </button>
            </div>
            <div class="inter__page__tab__content">
              <div id="dates" class="product__tab__content">
                <div class="product__tab__content__itemOne">
               
                  <div class="product__tab__content__itemOne__imgDiv">
                    <img
                      {{-- src="{{asset($products->productImage[0]->img)}}" --}}
                      src="{{ asset('img/poster.png') }}"
                      alt="product__tab__content__img"
                    />
                  </div>
                 
                  <div class="product__tab__content__itemOne__p__wrapper">
                    <h4
                      style="
                        font-size: 40px;
                        font-weight: 800;
                        margin-bottom: 2rem;
                      "
                    >
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
      </section>
      <section>
        <div class="container__size">
          <div class="like__content__title__wrapper">
            <h1>May You Like This</h1>
          </div>
          <div>
            {{-- @foreach($products as $product) --}}
            {{-- @dd($products) --}}
            <div class="like__card__wrapper">
              <div class="like__card__grid">
                <div class="link__card__wrapper">
                  <a href="{{ route('products') }}">
                    <div class="like__card__img">
                      <img src="{{asset($products->productImage[0]->img)}}" alt="chair" />
                      <div class="like__img__content">
                        <div class="bascket__icon__div">
                          <img src="{{ asset('icons/basket.svg') }}" alt="basket" />
                        </div>
                      </div>
                      <div class="like__img__content2">
                        <p>{{ $products->price }} <span class="small__txt">сум</span></p>
                      </div>
                      <div class="like__img__content3">
                        <a href="{{ route('products') }}">{{ $products->category->title['ru'] }}</a>
                        <a href="{{ route('products') }}">{{ $products->title['ru'] }}</a>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            {{-- @endforeach --}}
          </div>
        </div>
      </section>

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