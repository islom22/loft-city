
@extends('layouts.web')


@section('connect')
      <section>
        <div class="container__size">
          <div class="divider__wrapper">
            <a href="{{ route('index') }}" class="divider__main">Главная</a>
            <p class="divider__line">/</p>
            <a href="#" class="divider__about">Корзина</a>
            <p class="divider__line">/</p>
            <a href="#" class="divider__about">Оформить заказ</a>
          </div>
        </div>
      </section>
      <section>
        <div class="container__size">
          <div>
            <h1 class="reservation__title">Оформить заказ</h1>
          </div>
          <div class="reservation__wrapper">
            <div>
              <form class="form__wrapper"  action="{{ route('orders.store') }}" method="post" enctype='multipart/form-data' >
                <div class="input__flex__box__wrapper">
                  <div class="input__flex__wrapper">
                    <div>
                      <p class="reservation__input__label">Ф.И.О<sup>*</sup></p>
                      <input
                        class="reservation__input"
                        placeholder="Ф.И.О"
                        type="text"
                        name="name"
                      />
                    </div>
                    <div class="e__mail__box">
                      <p class="reservation__input__label">Электронная почта</p>
                      <input
                        class="reservation__input"
                        placeholder="Электронная почта"
                        type="email"
                        name="email"
                      />
                    </div>
                  </div>
                  <div
                    class="input__flex__wrapper input__flex__wrapper__second"
                  >
                    <div class="input__box__second telephone__box">
                      <p class="reservation__input__label">
                        Телефон<sup>*</sup>
                      </p>
                      <input
                        class="reservation__input"
                        placeholder="Телефон"
                        type="number"
                        name="phone"
                      />
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
                    <textarea placeholder="Адрес" name="address"></textarea>
                  </div>
                </div>
                <div>
                  <div class="payment">
                    <div>
                      <h1>Способ оплаты</h1>
                    </div>
                    <div class="pay__radio__wrapper" >
                      <div class="pay__choose">
                        <label>
                          <input type="radio" name="role" checked />
                          <span class="redio__design"></span>
                          <span class="radio__name" value="Наличка">Наличка</span>
                        </label>
                      </div>
                      <div class="pay__choose pay__choose__second">
                        <label>
                          <input type="radio" name="role" />
                          <span class="redio__design"></span>
                          <span class="radio__name" value="С картой">С картой</span>
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
                          <input type="radio" name="how_to_buy" checked />
                          <span class="redio__design"></span>
                          <span class="radio__name" value="Забрать от шоу рума" >Забрать от шоу рума</span>
                        </label>
                      </div>
                      <div class="pay__choose pay__for__buy">
                        <label>
                          <input type="radio" name="how_to_buy" />
                          <span class="redio__design"></span>
                          <span class="radio__name" value="С доставкой?" >С доставкой?</span>
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
              <div class="reservation__second__half">
                <div>
                  <h2 class="reservation__second__half__title">
                    В корзине 2 товара
                  </h2>
                  <div class="reservation__second__half__card">
                    <div>
                      <div class="reservation__second__half__image__wrapper">
                        <img src="./img/form__img.png" alt="form__img" />
                      </div>
                    </div>
                    <div class="reservation__second__half__desctiptions">
                      <h4>Стол LOFT Берёзка</h4>
                      <h5>Столы LOFT</h5>
                      <h4>950 000 сум</h4>
                    </div>
                  </div>
                  <div
                    class="reservation__second__half__card reservation__second__card"
                  >
                    <div>
                      <div class="reservation__second__half__image__wrapper">
                        <img src="./img/form__img.png" alt="form__img" />
                      </div>
                    </div>
                    <div class="reservation__second__half__desctiptions">
                      <h4>Стол LOFT Берёзка</h4>
                      <h5>Столы LOFT</h5>
                      <h4>950 000 сум</h4>
                    </div>
                  </div>
                  <div>
                    <hr class="reservation__second__half__hr" />
                  </div>
                  <div class="prices__wrapper prices__wrapper__first">
                    <h3>Итого по заказу:</h3>
                    <h3>740 000 so’m</h3>
                  </div>
                  <div class="prices__wrapper prices__wrapper__second">
                    <h3>Доставка:</h3>
                    <h3>20 000 so’m</h3>
                  </div>
                  <div>
                    <hr class="reservation__second__half__hr" />
                  </div>
                  <div class="total__price">
                    <h3>Итог заказа:</h3>
                    <h3>760 000 so’m</h3>
                  </div>
                </div>
              </div>
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
                <span class="orange__txt">Telegram</span> — cделаем расчет
                <br />
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