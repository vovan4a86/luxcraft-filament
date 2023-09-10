<!doctype html>
<html lang="ru">
@include('blocks.head')
<body x-data="{ menuOverlayIsOpen: false }" :class="menuOverlayIsOpen &amp;&amp; 'no-scroll'">
<!--if !textPage-->
<h1 class="v-hidden">{{ isset($h1) && $h1 ?: '' }}</h1>
<!-- homepage && 'header--home'-->
<!-- innerPage && 'header--inner'-->
@include('blocks.header')

<main>
@yield('content')
</main>

@include('blocks.footer')
@include('blocks.cookie')
@include('blocks.popups')

<div class="v-hidden" id="company" itemprop="branchOf" itemscope itemtype="https://schema.org/Corporation" aria-hidden="true" tabindex="-1">
    <article itemscope itemtype="https://schema.org/LocalBusiness" itemref="company">
        <div itemprop="name">Наименование организации
            <img itemprop="image" src="http://v2.fanky.ru/luxcraft-2023/static/images/common/logo.svg" alt="logo">
            <a itemprop="url" href="https://example.com"></a>
            <div itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                <span itemprop="addressCountry">Страна</span>
                <span itemprop="addressRegion">Область обл.</span>
                <span itemprop="postalCode">Индекс</span>
                <span itemprop="addressLocality">г. Город</span>
                <span itemprop="streetAddress">ул. Улица, 1</span>
            </div>
            <div itemprop="email">info@example.com</div>
            <div itemprop="telephone">+74950000000</div>
            <div itemprop="priceRange">RUB</div>
            <div itemprop="openingHours" content="Mo-Fr 9:00−18:00">Пн.-Пт.: 9.00-18.00 Сб., Вс.: выходной</div>
        </div>
    </article>
</div>
</body>
</html>
