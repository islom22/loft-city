@extends('layouts.web')


@section('connect')

    <section>
        <div class="container__size">
            <div class="divider__wrapper">
                <a href="{{ route('index') }}" class="divider__main">Главная</a>
                <p class="divider__line">/</p>
                <a href="{{ route('about_company') }}" class="divider__about">О компании</a>
            </div>
        </div>
    </section>
    <section>
        <div class="container__size">
            <div class="about__company__wrapper">
                <div class="about__company__size__div">
                    <h1>О компании</h1>
                    <p>
                        sutdio marani, communication agency based in milan, has been
                        created in 2011 from maurizio marani after his long term
                        experience with the uberfamous mccann erickson. many of his
                        clients, like l’espresso group and radio deejay, will follow him
                        in this new adventure and many others such as radio capital.
                    </p>
                    <p>
                        After a fortunate encounter with the copywriter and content
                        manager Anna Scardovelli, Studio Marani gains another
                        fundamental member of his creative team. Anna, at that time, was
                        already collaborating with big international brands like
                        Barilla, Volkswagen, Campari, Vodafone, Philips, Kraft, Intesa
                        SanPaolo and Fila, she is a TV / ADV / Theatre author and
                        founder of the firm "ScrittoMisto" in 2000. Valentina De Franco,
                        Project Manager, completes Studio Marani creative team.
                    </p>
                </div>
            </div>
        </div>
    </section>
    @if (isset($abouts->video))
        <section>
            {{-- @foreach ($abouts as $about) --}}
            <div class="container__size">
                <div class="video__wrapper">
                    {{-- <video src="{{ asset('uploads/about/'.$abouts->video) }}"  poster="{{ asset('img/poster__image.png') }}" controls poster
            ></video> --}}
                    {{-- <video  src="{{ asset($abouts->video) }}" class="inner__video" id="video" width="100%"  autoplay muted loop></video> --}}
                    <video {{-- src="./video/video_2021-10-04_15-59-56.mp4" --}} src="{{ asset('uploads/video/' . $abouts->video) }}" {{-- src="{{ asset($abouts->video) }}" --}}
                        {{-- poster="{{ asset('./img/poster__image.png') }}" --}} controls poster></video>
                </div>
            </div>
            {{-- @endforeach --}}
        </section>
    @endif

    <section>
        <div class="container__size py-2" >
            <div class="grid__helf__wrapper">
                {{-- @foreach ($abouts as $about) --}}
                @if (isset($abouts->img1) || isset($abouts->img2) || isset($abouts->img3))
                    <div class="grid__wrapper">
                        @if (isset($abouts->img1))
                            <div class="grid__first grid__item__cover">
                                <img src="{{ asset('uploads/about/' . $abouts->img1) }}" alt="grid__img" />
                            </div>
                        @endif
                        @if (isset($abouts->img2))
                            <div class="grid__second grid__item__cover">
                                <img src="{{ asset('uploads/about1/' . $abouts->img2) }}" alt="grid__img" />
                            </div>
                        @endif
                        @if (isset($abouts->img3))
                            <div class="grid__third grid__item__cover">
                                <img src="{{ asset('uploads/about2/' . $abouts->img3) }}" />
                            </div>
                        @endif
                    </div>
                @endif
                {{-- @endforeach --}}
                <div class="grid__helf__second">
                    <div>
                        <h1>The team.</h1>
                        <p class="grid__helf__first__paragraph">
                            All art is quite useless. one can never consent to creep
                            whenone feels an impulse to soar. words do not express
                            thoughtsvery well. they always become a little different
                            immediately after they are expressed, a little distorted, a
                            little foolish.
                        </p>
                        <p>
                            He had a word, too. love, he called it. but i had been used to
                            words for a long time. i knew that that word was like the
                            other, just a shape to fill a lack; that when the right time
                            came, you wouldn't need a word for that any more than for
                            pride or fear.He had a word, too. love, he called it. but i
                            had been used to words for a long time.
                        </p>
                        <div class="desctiption__items__wrapper">
                            <div class="desctiption__items">
                                <h2>60</h2>
                                <p>million sq km of work place</p>
                            </div>
                            <div class="desctiption__items">
                                <h2>60</h2>
                                <p>million sq km of work place</p>
                            </div>
                            <div class="desctiption__items">
                                <h2>60</h2>
                                <p>million sq km of work place</p>
                            </div>
                            <div class="desctiption__items">
                                <h2>60</h2>
                                <p>million sq km of work place</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
