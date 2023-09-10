@extends('template')
@section('content')
    <section class="catalog-view">
        <div class="catalog-view__container container">
            @include('blocks.bread')
            <div class="catalog-view__heading">
                <div class="page-title oh">
                    <span data-aos="fade-down" data-aos-duration="900">каталог продукции</span>
                </div>
            </div>
            @if (count($categories))
                <div class="catalog-view__grid">
                    @foreach($categories as $category)
                        <div class="catalog-view__item" data-aos="fade-down" data-aos-duration="900"
                             data-aos-delay="150">
                            <div class="card">
                                <img class="card__pic lazy"
                                     src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                     data-src="{{ $category->getFirstMediaUrl('default', 'catalog_item') }}" width="250" height="208" alt=""/>
                                <div class="card__body">
                                    <a class="card__title" href="{{ $category->url }}"
                                       title="{{ $category->name }}">
                                        {{ $category->name }}
                                    </a>
                                    <div class="card__txt">
                                        {!! $category->announce !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
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
                    <div class="features__icon lazy" data-bg="/static/images/common/ico_timer.svg"></div>
                    <div class="features__title">Быстро</div>
                    <div class="features__body">Изготовление любых типоразмеров гофроящиков в течении 3–7 дней</div>
                </div>
                <div class="features__item">
                    <div class="features__icon lazy" data-bg="/static/images/common/ico_size.svg"></div>
                    <div class="features__title">Любые размеры</div>
                    <div class="features__body">Нанесение на упаковку логотипов и рекламы заказчика</div>
                </div>
                <div class="features__item">
                    <div class="features__icon lazy" data-bg="/static/images/common/ico_sert.svg"></div>
                    <div class="features__title">Сертификация</div>
                    <div class="features__body">Наличие всех необходимых сертификатов и сопроводительных документов
                    </div>
                </div>
                <div class="features__item">
                    <div class="features__icon lazy" data-bg="/static/images/common/ico_price.svg"></div>
                    <div class="features__title">Скидки</div>
                    <div class="features__body">Действующая гибкая система скидок в зависимости от объёмов
                        производства
                    </div>
                </div>
                <div class="features__item">
                    <div class="features__icon lazy" data-bg="/static/images/common/ico_count.svg"></div>
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
                {!! $text !!}
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
