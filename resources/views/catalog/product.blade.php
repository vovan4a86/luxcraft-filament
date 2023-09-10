@extends('template')
@section('content')
    <section class="product">
        <div class="product__container container">
            @include('blocks.bread')
            <div class="product__body" data-aos="fade-up" data-aos-duration="600" data-aos-delay="150">
                @if (count($images))
                    <div class="product__views">
                        <div class="product__nav">
                            <button class="product__arrow product__arrow--prev btn-reset" type="button"
                                    aria-label="Предыдущий слайд" data-product-prev="data-product-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="12" fill="none">
                                    <path fill="currentColor"
                                          d="M26.29 10.98 13.94.18a.614.614 0 0 0-.456-.18.614.614 0 0 0-.455.18L.68 10.98a.526.526 0 0 0-.195.42c0 .36.26.6.65.6.195 0 .325-.06.455-.18L13.484 1.44 25.38 11.82c.13.12.26.18.455.18.39 0 .65-.24.65-.6 0-.18-.065-.3-.195-.42Z"
                                    />
                                </svg>
                            </button>
                            <div class="product__slider-nav swiper" data-product-slider-nav="data-product-slider-nav">
                                <div class="product__wrapper product__wrapper--nav swiper-wrapper">
                                    @foreach($images as $image)
                                        <div class="product__slide-nav swiper-slide">
                                            <img class="product__thumb" src="{{ $image->getUrl('slider_small') }}"
                                                 width="135" height="90" alt="{{ $product->name }}"/>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button class="product__arrow product__arrow--next btn-reset" type="button"
                                    aria-label="Следующий слайд" data-product-next="data-product-next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="13" fill="none">
                                    <path fill="currentColor"
                                          d="m26.29 1.495-12.35 10.8c-.13.12-.26.18-.456.18a.614.614 0 0 1-.455-.18L.68 1.495a.526.526 0 0 1-.195-.42c0-.36.26-.6.65-.6.195 0 .325.06.455.18l11.895 10.38L25.38.655c.13-.12.26-.18.455-.18.39 0 .65.24.65.6 0 .18-.065.3-.195.42Z"
                                    />
                                </svg>
                            </button>
                        </div>
                        <div class="product__view swiper" data-product-slider="data-product-slider">
                            <div class="product__wrapper product__wrapper--product swiper-wrapper">
                                @foreach($images as $image)
                                    <div class="product__slide-prod swiper-slide">
                                        <a class="product__link" href="{{ $image->getUrl('slider_wide') }}"
                                           data-fancybox="data-fancybox" data-caption="{{ $product->name }}">
                                            <img class="product__picture" src="{{ $image->getUrl('slider_wide') }}"
                                                 width="616" height="441" alt="{{ $product->name }}"/>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <div class="product__info">
                    <div class="product__title">Короб 4-х клапанный, бурый, профиль В, Т-23</div>
                    <div class="product__instock">{{ $product->in_stock ? 'в наличии' : 'нет в наличии' }}</div>
                    <div class="product__params">
                        <div class="product__params-title">Внутренний размер ящиков</div>
                        <div class="product__params-grid">
                            @if ($product->inner_length)
                                <div class="product__params-item">
                                    <div class="product__params-icon lazy"
                                         data-bg="/static/images/common/ico_length.svg"></div>
                                    <div class="product__params-label">Длина {{ $product->inner_length }} мм.</div>
                                </div>
                            @endif
                            @if ($product->inner_wide)
                                <div class="product__params-item">
                                    <div class="product__params-icon lazy"
                                         data-bg="/static/images/common/ico_width.svg"></div>
                                    <div class="product__params-label">Ширина {{ $product->inner_wide }} мм.</div>
                                </div>
                            @endif
                            @if ($product->inner_height)
                                <div class="product__params-item">
                                    <div class="product__params-icon lazy"
                                         data-bg="/static/images/common/ico_height.svg"></div>
                                    <div class="product__params-label">Высота {{ $product->inner_height }} мм.</div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="product__actions">
                        <div class="product__price">{{ $product->price ?: 'нет' }} ₽</div>
                        <button class="product__action btn-reset" type="button">
                            <span>выбрать</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="related" data-aos="fade-up" data-aos-duration="600">
        <div class="related__container container">
            <div class="related__heading">
                <div class="page-title oh">
                    <span data-aos="fade-down" data-aos-duration="900">Ещё товары из каталога</span>
                </div>
            </div>
            <div class="related__grid">
                <!--._item-->
                <div class="related__item" data-aos="fade-down" data-aos-duration="900" data-aos-delay="150">
                    <div class="prod">
                        <a href="javascript:void(0)" title="Короб 4-х клапанный, бурый, профиль В, Т-23">
                            <img class="prod__pic lazy"
                                 src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                 data-src="static/images/common/card-3.png" width="250" height="208" alt=""/>
                        </a>
                        <div class="prod__body">
                            <a class="prod__title" href="javascript:void(0)"
                               title="Короб 4-х клапанный, бурый, профиль В, Т-23">Короб 4-х клапанный, бурый, профиль
                                В, Т-23</a>
                            <div class="prod__descr">Внутренний размер ящиков, мм. Д х Ш х В:250х145х145</div>
                            <div class="prod__action">
                                <button class="prod__btn btn-reset" data-request="data-request" data-src="#calc"
                                        data-label="Короб 4-х клапанный, бурый, профиль В, Т-23"
                                        aria-label="Расчёт цены">
                                    <span class="prod__btn-icon lazy"
                                          data-bg="static/images/common/ico_calc.svg"></span>
                                    <span class="prod__btn-label">Расчёт цены</span>
                                    <svg width="86" height="19" viewBox="0 0 86 19" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M73.286 18L85.0001 9.5M85.0001 9.5L73.0001 0.999993M85.0001 9.5L6.02921e-05 9.5"
                                            stroke="currentColor"/>
                                    </svg>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--._item-->
                <div class="related__item" data-aos="fade-down" data-aos-duration="900" data-aos-delay="200">
                    <div class="prod">
                        <a href="javascript:void(0)" title="Короб 4-х клапанный">
                            <img class="prod__pic lazy"
                                 src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                 data-src="static/images/common/card-4.png" width="250" height="208" alt=""/>
                        </a>
                        <div class="prod__body">
                            <a class="prod__title" href="javascript:void(0)" title="Короб 4-х клапанный">Короб 4-х
                                клапанный</a>
                            <div class="prod__descr">Внутренний размер ящиков, мм. Д х Ш х В:250х145х145</div>
                            <div class="prod__action">
                                <button class="prod__btn btn-reset" data-request="data-request" data-src="#calc"
                                        data-label="Короб 4-х клапанный" aria-label="Расчёт цены">
                                    <span class="prod__btn-icon lazy"
                                          data-bg="static/images/common/ico_calc.svg"></span>
                                    <span class="prod__btn-label">Расчёт цены</span>
                                    <svg width="86" height="19" viewBox="0 0 86 19" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M73.286 18L85.0001 9.5M85.0001 9.5L73.0001 0.999993M85.0001 9.5L6.02921e-05 9.5"
                                            stroke="currentColor"/>
                                    </svg>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--._item-->
                <div class="related__item" data-aos="fade-down" data-aos-duration="900" data-aos-delay="250">
                    <div class="prod">
                        <a href="javascript:void(0)" title="Короб 4-х клапанный, бурый, профиль В, Т-23">
                            <img class="prod__pic lazy"
                                 src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                 data-src="static/images/common/card-5.png" width="250" height="208" alt=""/>
                        </a>
                        <div class="prod__body">
                            <a class="prod__title" href="javascript:void(0)"
                               title="Короб 4-х клапанный, бурый, профиль В, Т-23">Короб 4-х клапанный, бурый, профиль
                                В, Т-23</a>
                            <div class="prod__descr">Внутренний размер ящиков, мм. Д х Ш х В:250х145х145</div>
                            <div class="prod__action">
                                <button class="prod__btn btn-reset" data-request="data-request" data-src="#calc"
                                        data-label="Короб 4-х клапанный, бурый, профиль В, Т-23"
                                        aria-label="Расчёт цены">
                                    <span class="prod__btn-icon lazy"
                                          data-bg="static/images/common/ico_calc.svg"></span>
                                    <span class="prod__btn-label">Расчёт цены</span>
                                    <svg width="86" height="19" viewBox="0 0 86 19" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M73.286 18L85.0001 9.5M85.0001 9.5L73.0001 0.999993M85.0001 9.5L6.02921e-05 9.5"
                                            stroke="currentColor"/>
                                    </svg>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--._item-->
                <div class="related__item" data-aos="fade-down" data-aos-duration="900" data-aos-delay="300">
                    <div class="prod">
                        <a href="javascript:void(0)" title="Короб 4-х клапанный, бурый, профиль В, Т-24">
                            <img class="prod__pic lazy"
                                 src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                 data-src="static/images/common/card-8.png" width="250" height="208" alt=""/>
                        </a>
                        <div class="prod__body">
                            <a class="prod__title" href="javascript:void(0)"
                               title="Короб 4-х клапанный, бурый, профиль В, Т-24">Короб 4-х клапанный, бурый, профиль
                                В, Т-24</a>
                            <div class="prod__descr">Внутренний размер ящиков, мм. Д х Ш х В:250х145х145</div>
                            <div class="prod__action">
                                <button class="prod__btn btn-reset" data-request="data-request" data-src="#calc"
                                        data-label="Короб 4-х клапанный, бурый, профиль В, Т-24"
                                        aria-label="Расчёт цены">
                                    <span class="prod__btn-icon lazy"
                                          data-bg="static/images/common/ico_calc.svg"></span>
                                    <span class="prod__btn-label">Расчёт цены</span>
                                    <svg width="86" height="19" viewBox="0 0 86 19" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M73.286 18L85.0001 9.5M85.0001 9.5L73.0001 0.999993M85.0001 9.5L6.02921e-05 9.5"
                                            stroke="currentColor"/>
                                    </svg>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--._item-->
                <div class="related__item" data-aos="fade-down" data-aos-duration="900" data-aos-delay="350">
                    <div class="prod">
                        <a href="javascript:void(0)"
                           title="Короб 4-х клапанный, бурый, профиль В, Т-23 в Екатеринбурге">
                            <img class="prod__pic lazy"
                                 src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                 data-src="static/images/common/card-1.png" width="250" height="208" alt=""/>
                        </a>
                        <div class="prod__body">
                            <a class="prod__title" href="javascript:void(0)"
                               title="Короб 4-х клапанный, бурый, профиль В, Т-23 в Екатеринбурге">Короб 4-х клапанный,
                                бурый, профиль В, Т-23 в Екатеринбурге</a>
                            <div class="prod__descr">Внутренний размер ящиков, мм. Д х Ш х В:250х145х145</div>
                            <div class="prod__action">
                                <button class="prod__btn btn-reset" data-request="data-request" data-src="#calc"
                                        data-label="Короб 4-х клапанный, бурый, профиль В, Т-23 в Екатеринбурге"
                                        aria-label="Расчёт цены">
                                    <span class="prod__btn-icon lazy"
                                          data-bg="static/images/common/ico_calc.svg"></span>
                                    <span class="prod__btn-label">Расчёт цены</span>
                                    <svg width="86" height="19" viewBox="0 0 86 19" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M73.286 18L85.0001 9.5M85.0001 9.5L73.0001 0.999993M85.0001 9.5L6.02921e-05 9.5"
                                            stroke="currentColor"/>
                                    </svg>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="features">
        <div class="features__container container">
            <div class="features__heading">
                <div class="page-title oh">
                    <span data-aos="fade-down" data-aos-duration="900">Почему мы?</span>
                </div>
            </div>
            <div class="features__grid" data-aos="fade-up" data-aos-duration="600" data-aos-delay="150">
                <div class="features__item">
                    <div class="features__icon lazy" data-bg="static/images/common/ico_timer.svg"></div>
                    <div class="features__title">Быстро</div>
                    <div class="features__body">Изготовление любых типоразмеров гофроящиков в течении 3–7 дней</div>
                </div>
                <div class="features__item">
                    <div class="features__icon lazy" data-bg="static/images/common/ico_size.svg"></div>
                    <div class="features__title">Любые размеры</div>
                    <div class="features__body">Нанесение на упаковку логотипов и рекламы заказчика</div>
                </div>
                <div class="features__item">
                    <div class="features__icon lazy" data-bg="static/images/common/ico_sert.svg"></div>
                    <div class="features__title">Сертификация</div>
                    <div class="features__body">Наличие всех необходимых сертификатов и сопроводительных документов
                    </div>
                </div>
                <div class="features__item">
                    <div class="features__icon lazy" data-bg="static/images/common/ico_price.svg"></div>
                    <div class="features__title">Скидки</div>
                    <div class="features__body">Действующая гибкая система скидок в зависимости от объёмов
                        производства
                    </div>
                </div>
                <div class="features__item">
                    <div class="features__icon lazy" data-bg="static/images/common/ico_count.svg"></div>
                    <div class="features__title">Страховой запас</div>
                    <div class="features__body">Страховой запас гофрокартона и гофроящиков для постоянных клиентов</div>
                </div>
            </div>
        </div>
    </section>
    <section class="content-view">
        <!-- обёртка для спойлера в контенте-->
        <!-- высота по-умолчанию, вынесена inline, чтобы можно было добавить поле в админке (может быть любым)-->
        <!-- (style="height: 800px")-->
        <div class="content-view__container container container--small js-hide_container" data-aos="fade-down"
             data-aos-duration="1200">
            <div class="text-block js-hide_container__inn" style="height: 800px">
                <h1>Гофротара в Екатеринбурге</h1>
                <p>В каталоге представлена продукция завода «ЛюксКрафт» - высококачественная гофротара, комплектующие из
                    гофрокартона, гофролисты (трехслойный и пятислойный гофрокартон), упаковка из картона на заказ.
                    Гофрокартон от производителя вы можете заказать
                    прямо на сайте — продукция стандартных размеров представлена в нашем каталоге. Мы изготовим
                    оптимальную гофроупаковку для любой продукции в кратчайшие сроки. Упаковка из картона на заказ может
                    быть изготовлена небольшими партиями. Наша продукция
                    не уступает европейским образцам и проходит регулярные проверки качества.</p>
                <blockquote>Качественная гофротара дёшево — напрямую от производителя, с гарантией качества!
                </blockquote>
                <p>Гофротара является широко распространённой разновидностью упаковки. Она изготавливается из
                    гофрокартона и используется для упаковки товаров как пищевого, так непродовольственного назначения.
                    Помимо основного назначения — транспортировки и хранения
                    товаров, гофроупаковка позволяет выгодного представить продукцию, информировать потребителей о
                    преимуществах компании и особенностях конкретного продукта.</p>
                <h2>Разновидности и назначение гофротары</h2>
                <p>По назначению выделяют потребительскую упаковку (в ней товары поставляются конечным потребителям), а
                    также упаковку производственного и транспортного назначения.</p>
                <ul>
                    <li>Целевой объект сделайте достаточно большим</li>
                    <li>Сократите расстояние от одной важной точки до другой (если они находятся в одном
                        пользовательском сценарии)
                    </li>
                    <li>Увеличьте область клика для чекбоксов и переключателей</li>
                    <li>Cтремитесь сделать больше отступ между взаимно нежелательными кнопками, например «Сохранить» и
                        «Удалить»
                    </li>
                    <li>Для списка ссылок сделайте кликабельными не только надписи, но и все строки целиком</li>
                </ul>
                <p>На лицевой слой потребительской гофротары обычно наносится многоцветная печать. Печать информирует о
                    компании-производителе и особенностях данного продукта. Название и характеристики, и другие данные,
                    указанные на упаковке позволяют потребителям
                    сориентироваться в выборе товаров.</p>
                <p>Гофротара производственного назначения применяется для хранения товаров одного вида, имеющих
                    индивидуальную упаковку. На такую гофротару может наноситься одноцветная печать, содержащая
                    информацию о продукции.</p>
                <h3>Назначение гофротары</h3>
                <p>По назначению выделяют потребительскую упаковку (в ней товары поставляются конечным потребителям), а
                    также упаковку производственного и транспортного назначения.</p>
                <ol>
                    <li>Целевой объект сделайте достаточно большим</li>
                    <li>Сократите расстояние от одной важной точки до другой (если они находятся в одном
                        пользовательском сценарии)
                    </li>
                    <li>Увеличьте область клика для чекбоксов и переключателей</li>
                    <li>Cтремитесь сделать больше отступ между взаимно нежелательными кнопками, например «Сохранить» и
                        «Удалить»
                    </li>
                    <li>Для списка ссылок сделайте кликабельными не только надписи, но и все строки целиком</li>
                </ol>
                <table>
                    <thead>
                    <tr>
                        <th>Заголовок столбца 1</th>
                        <th>Заголовок столбца 2</th>
                        <th>Заголовок столбца 3</th>
                        <th>Заголовок столбца 4</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Ячейка 1</td>
                        <td>Ячейка 2</td>
                        <td>Ячейка 3</td>
                        <td>Ячейка 4</td>
                    </tr>
                    <tr>
                        <td>Ячейка 1</td>
                        <td>Ячейка 2</td>
                        <td>Ячейка 3</td>
                        <td>Ячейка 4</td>
                    </tr>
                    <tr>
                        <td>Ячейка 1</td>
                        <td>Ячейка 2</td>
                        <td>Ячейка 3</td>
                        <td>Ячейка 4</td>
                    </tr>
                    <tr>
                        <td>Ячейка 1</td>
                        <td>Ячейка 2</td>
                        <td>Ячейка 3</td>
                        <td>Ячейка 4</td>
                    </tr>
                    <tr>
                        <td>Ячейка 1</td>
                        <td>Ячейка 2</td>
                        <td>Ячейка 3</td>
                        <td>Ячейка 4</td>
                    </tr>
                    </tbody>
                </table>
                <h4>Гофротара в Екатеринбурге</h4>
                <p>В каталоге представлена продукция завода «ЛюксКрафт» - высококачественная гофротара, комплектующие из
                    гофрокартона, гофролисты (трехслойный и пятислойный гофрокартон), упаковка из картона на заказ.
                    Гофрокартон от производителя вы можете заказать
                    прямо на сайте — продукция стандартных размеров представлена в нашем каталоге. Мы изготовим
                    оптимальную гофроупаковку для любой продукции в кратчайшие сроки. Упаковка из картона на заказ может
                    быть изготовлена небольшими партиями. Наша продукция
                    не уступает европейским образцам и проходит регулярные проверки качества.</p>
            </div>
            <button class="btn-reset js-hide_container__btn" type="button" aria-label="показать/скрыть текст">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="none">
                    <circle cx="30" cy="30" r="30" fill="#8A847F"/>
                    <path fill="#fff"
                          d="M42.35 25a.59.59 0 0 0-.455.195L30 36.443 18.105 25.195A.59.59 0 0 0 17.65 25c-.39 0-.65.26-.65.65a.59.59 0 0 0 .195.455l12.35 11.704c.13.13.26.195.455.195a.59.59 0 0 0 .455-.195l12.35-11.704A.59.59 0 0 0 43 25.65c0-.39-.26-.65-.65-.65Z"
                    />
                </svg>
            </button>
        </div>
    </section>
@endsection
