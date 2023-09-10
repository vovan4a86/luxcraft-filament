@extends('template')
@section('content')
<section class="hero">
    <div class="hero__promo lazy" data-bg="/static/images/common/hero.jpg">
        @if ($hero_video)
            <video class="hero__video" src="{{ $hero_video }}" autoplay muted loop playsinline></video>
        @endif
    </div>
    <div class="hero__container container">
        <div class="hero__body">
            <div class="hero__brand">
                <span data-aos="fade-down" data-aos-duration="1100" data-aos-delay="0">{{ $hero->hero_title }}</span>
            </div>
            <div class="hero__actions">
                <div class="hero__title">
                    <span data-aos="fade-up" data-aos-duration="900" data-aos-delay="300">{{ $hero->hero_brand }}</span>
                </div>
                <a class="hero__action" href="javascript:void(0)" title="запросить прайс-лист">
                    <span data-aos="flip-up" data-aos-duration="650" data-aos-delay="1600">запросить прайс-лист</span>
                    <svg width="86" height="19" viewBox="0 0 86 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M73.2859 18L85 9.5M85 9.5L73 0.999993M85 9.5L-7.43094e-07 9.5" stroke="currentColor" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="hero__socials">
            <div class="hero__socials-wrapper" data-aos="flip-up" data-aos-duration="650" data-aos-delay="1600">
                <div class="social-links">
                    <div class="social-links__label">social media</div>
                    <a class="social-links__icon" href="https://{{ $hero->hero_social_yt }}" title="Люкскрафт Youtube">
                        <span class="iconify" data-icon="ant-design:youtube-filled"></span>
                    </a>
                    <a class="social-links__icon" href="https://{{ $hero->hero_social_vk }}" title="Люкскрафт ВКонтакте">
                        <span class="iconify" data-icon="ion:logo-vk"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="s-about">
    <img class="s-about__decor lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/s-about-decor.svg" width="320" height="690" alt="" data-aos="zoom-out" data-aos-duration="1500" data-aos-delay="450">
    <div class="s-about__container container">
        <div class="s-about__grid">
            <div class="s-about__company oh">
                <div class="s-about__title">
                    <div class="page-title oh">
                        <span data-aos="fade-down" data-aos-duration="900">О компании</span>
                    </div>
                </div>
                <div class="s-about__text page-body" data-aos="fade-down" data-aos-duration="900" data-aos-delay="50">
                    <p>В компании «Люкскрафт» создана команда настоящих профессионалов и квалифицированных специалистов.</p>
                    <p>Современный завод гофротары — это высокоэффективное предприятие, на котором производство гофрокартона и другой упаковки осуществляется под строгим контролем качества.</p>
                </div>
                <div class="s-about__link" data-aos="fade-down" data-aos-duration="900" data-aos-delay="70">
                    <a class="page-link" href="javascript:void(0)" title="подробнее">
                        <span>подробнее</span>
                        <svg width="86" height="19" viewBox="0 0 86 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M73.286 18L85.0001 9.5M85.0001 9.5L73.0001 0.999993M85.0001 9.5L6.02921e-05 9.5" stroke="currentColor" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="s-about__content">
                <div class="s-about__row">
                    <img class="s-about__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/s-about.jpg" width="486" height="725" alt="" data-aos="flip-right" data-aos-duration="1000">
                    <div class="s-about__data">
                        <div class="about-data">
                            <div class="about-data__subtitle">
											<span data-aos="fade-down" data-aos-duration="800" data-aos-delay="50">
												Почему мы?</span>
                            </div>
                            <ul class="about-data__list list-reset oh">
                                <li class="about-data__item" data-aos="fade-down" data-aos-duration="800" data-aos-delay="0">
                                    <span class="about-data__icon lazy" data-bg="/static/images/common/ico_time.svg"></span>
                                    <span class="about-data__label">Изготовление любых типоразмеров гофроящиков в течении 3-7 дней</span>
                                </li>
                                <li class="about-data__item" data-aos="fade-down" data-aos-duration="800" data-aos-delay="50">
                                    <span class="about-data__icon lazy" data-bg="/static/images/common/ico_sticker.svg"></span>
                                    <span class="about-data__label">Нанесение на упаковку логотипов и рекламы заказчика</span>
                                </li>
                                <li class="about-data__item" data-aos="fade-down" data-aos-duration="800" data-aos-delay="100">
                                    <span class="about-data__icon lazy" data-bg="/static/images/common/ico_quality.svg"></span>
                                    <span class="about-data__label">Наличие всех необходимых сертификатов и сопроводительных документов</span>
                                </li>
                                <li class="about-data__item" data-aos="fade-down" data-aos-duration="800" data-aos-delay="150">
                                    <span class="about-data__icon lazy" data-bg="/static/images/common/ico_discount.svg"></span>
                                    <span class="about-data__label">Действующая гибкая система скидок в зависимости от объёмов производства</span>
                                </li>
                                <li class="about-data__item" data-aos="fade-down" data-aos-duration="800" data-aos-delay="200">
                                    <span class="about-data__icon lazy" data-bg="/static/images/common/ico_warehouse.svg"></span>
                                    <span class="about-data__label">Страховой запас гофрокартона и гофроящиков для постоянных клиентов</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="s-catalog">
    <div class="s-catalog__container container">
        <div class="page-title oh">
            <span data-aos="fade-down" data-aos-duration="900">Каталог продукции</span>
        </div>
        <div class="s-catalog__grid">
            <div class="s-catalog__item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="0">
                <div class="s-catalog__view">
                    <a href="javascript:void(0)" title="Комплектующие из гофрокартона">
                        <img class="s-catalog__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/s-cat-1.png" width="215" height="215" alt="">
                    </a>
                </div>
                <div class="s-catalog__body">
                    <div class="s-catalog__title">
                        <a href="javascript:void(0)">Комплектующие из гофрокартона</a>
                    </div>
                    <div class="s-catalog__text">Вкладыши и прокладки из гофрокартона относятся к вспомогательным средствам.</div>
                    <div class="s-catalog__action">
                        <a class="page-link" href="javascript:void(0)" title="Перейти">
                            <span>Перейти</span>
                            <svg width="86" height="19" viewBox="0 0 86 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M73.286 18L85.0001 9.5M85.0001 9.5L73.0001 0.999993M85.0001 9.5L6.02921e-05 9.5" stroke="currentColor" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="s-catalog__item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
                <div class="s-catalog__view">
                    <a href="javascript:void(0)" title="Гофролоток, гофроподдон">
                        <img class="s-catalog__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/s-cat-2.png" width="215" height="215" alt="">
                    </a>
                </div>
                <div class="s-catalog__body">
                    <div class="s-catalog__title">
                        <a href="javascript:void(0)">Гофролоток, гофроподдон</a>
                    </div>
                    <div class="s-catalog__text">Гофролоток (гофроподдон) — это упаковка без крышки, которая используется для хранения и транспортировки товаров. Материалом для производства гофролотков является трехслойный гофрокартон и пятислойный гофрокартон.</div>
                    <div class="s-catalog__action">
                        <a class="page-link" href="javascript:void(0)" title="Перейти">
                            <span>Перейти</span>
                            <svg width="86" height="19" viewBox="0 0 86 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M73.286 18L85.0001 9.5M85.0001 9.5L73.0001 0.999993M85.0001 9.5L6.02921e-05 9.5" stroke="currentColor" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="s-catalog__item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                <div class="s-catalog__view">
                    <a href="javascript:void(0)" title="Гофрокороб 4-х клапанный">
                        <img class="s-catalog__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/s-cat-3.png" width="215" height="215" alt="">
                    </a>
                </div>
                <div class="s-catalog__body">
                    <div class="s-catalog__title">
                        <a href="javascript:void(0)">Гофрокороб 4-х клапанный</a>
                    </div>
                    <div class="s-catalog__text">4-х клапанный гофрокороб в Екатеринбурге является универсальной разновидностью упаковки. Эта упаковка имеет простую конструкцию, очень удобна и экономична.</div>
                    <div class="s-catalog__action">
                        <a class="page-link" href="javascript:void(0)" title="Перейти">
                            <span>Перейти</span>
                            <svg width="86" height="19" viewBox="0 0 86 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M73.286 18L85.0001 9.5M85.0001 9.5L73.0001 0.999993M85.0001 9.5L6.02921e-05 9.5" stroke="currentColor" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="s-catalog__item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="450">
                <div class="s-catalog__view">
                    <a href="javascript:void(0)" title="Гофрокартон, гофролисты">
                        <img class="s-catalog__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/s-cat-4.png" width="215" height="215" alt="">
                    </a>
                </div>
                <div class="s-catalog__body">
                    <div class="s-catalog__title">
                        <a href="javascript:void(0)">Гофрокартон, гофролисты</a>
                    </div>
                    <div class="s-catalog__text">Гофрокартон — отличный упаковочный материал, который обладает прочностью, легкостью и высокими гигиеническими свойствами.</div>
                    <div class="s-catalog__action">
                        <a class="page-link" href="javascript:void(0)" title="Перейти">
                            <span>Перейти</span>
                            <svg width="86" height="19" viewBox="0 0 86 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M73.286 18L85.0001 9.5M85.0001 9.5L73.0001 0.999993M85.0001 9.5L6.02921e-05 9.5" stroke="currentColor" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--class=(contactsPage && 'b-calc--small')-->
<section class="b-calc">
    <div class="b-calc__container container">
        <div class="b-calc__body lazy" data-bg="/static/images/common/b-calc-decor.svg" data-aos="flip-up">
            <div class="b-calc__title" data-aos="fade-left" data-aos-delay="650">Получить расчёт цены</div>
            <button class="b-calc__btn btn-reset" type="button" aria-label="Получить расчёт цены" data-popup data-src="#calc" data-aos="fade-right" data-aos-delay="650">
                <span>Получить</span>
            </button>
        </div>
    </div>
</section>
<section class="s-reviews lazy" data-bg="/static/images/common/reviews-decor.svg">
    <div class="s-reviews__container">
        <div class="s-reviews__body">
            <div class="page-title oh">
                <span data-aos="fade-down" data-aos-duration="900">Отзывы</span>
            </div>
            <div class="s-reviews__text page-body" data-aos="fade-down" data-aos-delay="500">
                <p>Мы работаем для того чтобы предлагать своим клиентам качественный товар по максимально выгодной стоимости.</p>
                <p>Производство гофрокартона, производство картонной упаковки для любой продукции</p>
            </div>
        </div>
        <div class="s-reviews__slider swiper" data-reviews data-aos="fade-left" data-aos-delay="600">
            <div class="s-reviews__wrapper swiper-wrapper">
                <div class="s-reviews__slide swiper-slide">
                    <div class="s-reviews__name">Отзыв «DoorHan»</div>
                    <div class="s-reviews__brand">
                        <img class="s-reviews__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/doorhan.svg" width="198" height="22" alt="">
                    </div>
                    <div class="s-reviews__text page-body">
                        <p>Выражаем искреннюю благодарность и глубокую признательность коллективу</p>
                    </div>
                    <div class="s-reviews__action">
                        <a class="s-reviews__link" href="javascript:void(0)" title="Отзыв «DoorHan»">
                            <span>Читать отзыв</span>
                        </a>
                    </div>
                </div>
                <div class="s-reviews__slide swiper-slide">
                    <div class="s-reviews__name">Отзыв «Свит презент»</div>
                    <div class="s-reviews__brand">
                        <img class="s-reviews__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/present.png" width="157" height="147" alt="">
                    </div>
                    <div class="s-reviews__text page-body">
                        <p>Коллектив ООО “СвитПрезент” искренне благодарит коллектив компании ООО “ЛюксКрафт”</p>
                    </div>
                    <div class="s-reviews__action">
                        <a class="s-reviews__link" href="javascript:void(0)" title="Отзыв «Свит презент»">
                            <span>Читать отзыв</span>
                        </a>
                    </div>
                </div>
                <div class="s-reviews__slide swiper-slide">
                    <div class="s-reviews__name">Отзыв «DoorHan»</div>
                    <div class="s-reviews__brand">
                        <img class="s-reviews__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/doorhan.svg" width="198" height="22" alt="">
                    </div>
                    <div class="s-reviews__text page-body">
                        <p>Выражаем искреннюю благодарность и глубокую признательность коллективу</p>
                    </div>
                    <div class="s-reviews__action">
                        <a class="s-reviews__link" href="javascript:void(0)" title="Отзыв «DoorHan»">
                            <span>Читать отзыв</span>
                        </a>
                    </div>
                </div>
                <div class="s-reviews__slide swiper-slide">
                    <div class="s-reviews__name">Отзыв «Свит презент»</div>
                    <div class="s-reviews__brand">
                        <img class="s-reviews__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/present.png" width="157" height="147" alt="">
                    </div>
                    <div class="s-reviews__text page-body">
                        <p>Коллектив ООО “СвитПрезент” искренне благодарит коллектив компании ООО “ЛюксКрафт”</p>
                    </div>
                    <div class="s-reviews__action">
                        <a class="s-reviews__link" href="javascript:void(0)" title="Отзыв «Свит презент»">
                            <span>Читать отзыв</span>
                        </a>
                    </div>
                </div>
                <div class="s-reviews__slide swiper-slide">
                    <div class="s-reviews__name">Отзыв «DoorHan»</div>
                    <div class="s-reviews__brand">
                        <img class="s-reviews__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/doorhan.svg" width="198" height="22" alt="">
                    </div>
                    <div class="s-reviews__text page-body">
                        <p>Выражаем искреннюю благодарность и глубокую признательность коллективу</p>
                    </div>
                    <div class="s-reviews__action">
                        <a class="s-reviews__link" href="javascript:void(0)" title="Отзыв «DoorHan»">
                            <span>Читать отзыв</span>
                        </a>
                    </div>
                </div>
                <div class="s-reviews__slide swiper-slide">
                    <div class="s-reviews__name">Отзыв «Свит презент»</div>
                    <div class="s-reviews__brand">
                        <img class="s-reviews__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/present.png" width="157" height="147" alt="">
                    </div>
                    <div class="s-reviews__text page-body">
                        <p>Коллектив ООО “СвитПрезент” искренне благодарит коллектив компании ООО “ЛюксКрафт”</p>
                    </div>
                    <div class="s-reviews__action">
                        <a class="s-reviews__link" href="javascript:void(0)" title="Отзыв «Свит презент»">
                            <span>Читать отзыв</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <button class="s-reviews__next btn-reset" type="button" data-review-next aria-label="следующий отзыв">
            <svg width="86" height="19" viewBox="0 0 86 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M73.2859 17.873L85 9.37304M85 9.37304L73 0.87304M85 9.37304L-7.43094e-07 9.37305" stroke="currentColor" />
            </svg>

        </button>
    </div>
</section>
<section class="s-map lazy" data-bg="/static/images/common/map.png">
    <div class="s-map__container container">
        <div class="s-map__body">
            <div class="page-title oh">
                <span data-aos="fade-down" data-aos-duration="900">география продаж</span>
            </div>
            <div class="s-map__text page-body" data-aos="fade-down" data-aos-delay="400">
                <p>Наша упаковка отличается высокой надежностью, поможет Вам выгодно презентовать свой бренд, и транспортировать свою продукцию по всем миру.</p>
            </div>
            <div class="s-map__data" data-aos="fade-down" data-aos-delay="450">
                <div class="s-map__data-item">
                    <div class="s-map__data-icon lazy" data-bg="/static/images/common/ico_pin.svg"></div>
                    <div class="s-map__data-body">Современный завод гофротары может обеспечить качественной упаковкой из гофрокартона предприятия любых регионов России.</div>
                </div>
                <div class="s-map__data-item">
                    <div class="s-map__data-icon lazy" data-bg="/static/images/common/ico_time.svg"></div>
                    <div class="s-map__data-body">На сегодняшний день завод гофротары «ЛюксКрафт» - это передовое производственное предприятие с круглосуточным режимом работы.</div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="s-clients lazy" data-bg="/static/images/common/clients-bg.svg">
    <div class="s-clients__container container">
        <div class="s-clients__grid">
            <div class="s-clients__view lazy" data-bg="/static/images/common/clients.png"></div>
            <div class="s-clients__body">
                <div class="s-clients__head">
                    <div class="page-title oh">
                        <span data-aos="fade-down" data-aos-duration="900">Наши клиенты</span>
                    </div>
                    <a class="s-clients__link" href="javascript:void(0)" title="Наши клиенты">
                        <svg width="86" height="19" viewBox="0 0 86 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M73.286 18L85.0001 9.5M85.0001 9.5L73.0001 0.999993M85.0001 9.5L6.02921e-05 9.5" stroke="currentColor" />
                        </svg>
                    </a>
                    <div class="s-clients__list" data-aos="fade-down" data-aos-delay="500">
                        <div class="s-clients__preview">
                            <img class="s-clients__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/cli-1.png" width="145" height="120" alt="">
                        </div>
                        <div class="s-clients__preview">
                            <img class="s-clients__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/cli-2.png" width="145" height="120" alt="">
                        </div>
                        <div class="s-clients__preview">
                            <img class="s-clients__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/cli-3.png" width="145" height="120" alt="">
                        </div>
                        <div class="s-clients__preview">
                            <img class="s-clients__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/cli-1.png" width="145" height="120" alt="">
                        </div>
                        <div class="s-clients__preview">
                            <img class="s-clients__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/cli-2.png" width="145" height="120" alt="">
                        </div>
                        <div class="s-clients__preview">
                            <img class="s-clients__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/cli-3.png" width="145" height="120" alt="">
                        </div>
                        <div class="s-clients__preview">
                            <img class="s-clients__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/cli-1.png" width="145" height="120" alt="">
                        </div>
                        <div class="s-clients__preview">
                            <img class="s-clients__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/cli-2.png" width="145" height="120" alt="">
                        </div>
                        <div class="s-clients__preview">
                            <img class="s-clients__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/cli-3.png" width="145" height="120" alt="">
                        </div>
                        <div class="s-clients__preview">
                            <img class="s-clients__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/cli-1.png" width="145" height="120" alt="">
                        </div>
                        <div class="s-clients__preview">
                            <img class="s-clients__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/cli-2.png" width="145" height="120" alt="">
                        </div>
                        <div class="s-clients__preview">
                            <img class="s-clients__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/cli-3.png" width="145" height="120" alt="">
                        </div>
                        <div class="s-clients__preview">
                            <img class="s-clients__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/cli-1.png" width="145" height="120" alt="">
                        </div>
                        <div class="s-clients__preview">
                            <img class="s-clients__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/cli-2.png" width="145" height="120" alt="">
                        </div>
                        <div class="s-clients__preview">
                            <img class="s-clients__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/cli-3.png" width="145" height="120" alt="">
                        </div>
                        <div class="s-clients__preview">
                            <img class="s-clients__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/cli-1.png" width="145" height="120" alt="">
                        </div>
                        <div class="s-clients__preview">
                            <img class="s-clients__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/cli-2.png" width="145" height="120" alt="">
                        </div>
                        <div class="s-clients__preview">
                            <img class="s-clients__pic lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/static/images/common/cli-3.png" width="145" height="120" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="s-callback lazy" data-bg="/static/images/common/s-callback-decor.svg">
    <div class="s-callback__container container">
        <div class="s-callback__grid">
            <form class="s-callback__form" action="#">
                <div class="s-callback__form-body">
                    <div class="page-title oh">
                        <span data-aos="fade-down" data-aos-duration="900">Обратная связь</span>
                    </div>
                    <div class="field" data-aos="fade-down" data-aos-delay="350">
                        <input class="field__input" type="text" name="name" required>
                        <span class="field__highlight"></span>
                        <span class="field__bar"></span>
                        <label class="field__label">Ваше имя</label>
                    </div>
                    <div class="field" data-aos="fade-down" data-aos-delay="450">
                        <input class="field__input" type="text" name="email" required>
                        <span class="field__highlight"></span>
                        <span class="field__bar"></span>
                        <label class="field__label">Email</label>
                    </div>
                    <div class="field" data-aos="fade-down" data-aos-delay="550">
                        <textarea class="field__input" name="message" required rows="1"></textarea>
                        <span class="field__highlight"></span>
                        <span class="field__bar"></span>
                        <label class="field__label">Сообщение</label>
                    </div>
                    <div class="s-callback__submit" data-aos="fade-down" data-aos-delay="650">
                        <button class="submit btn-reset" aria-label="отправить">
                            <span>отправить</span>
                        </button>
                    </div>
                </div>
                <div class="s-callback__socials">
                    <div class="social-links social-links--accent">
                        <div class="social-links__label">social media</div>
                        <a class="social-links__icon" href="javascript:void(0)" title="Люкскрафт Youtube">
                            <span class="iconify" data-icon="ant-design:youtube-filled"></span>
                        </a>
                        <a class="social-links__icon" href="javascript:void(0)" title="Люкскрафт ВКонтакте">
                            <span class="iconify" data-icon="ion:logo-vk"></span>
                        </a>
                    </div>
                </div>
            </form>
            <div class="s-callback__view lazy" data-bg="/static/images/common/s-callback-bg.png"></div>
        </div>
    </div>
</section>
@endsection
