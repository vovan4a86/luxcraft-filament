<header class="header {{ Route::is('main') ? 'header--home' : 'header--inner' }}">
    <div class="header__container container" x-data="{ dialogIsOpen: false }">
        <div class="header__grid">
            <button class="header__burger btn-reset" type="button" aria-label="Открыть меню" @click="menuOverlayIsOpen = !menuOverlayIsOpen">
                <span class="iconify" data-icon="charm:menu-hamburger" data-width="40"></span>
            </button>
            <div class="header__logo">
                <div class="header__logo-desktop">
                    <div class="logo lazy" data-bg="/static/images/common/logo.svg"></div>
                </div>
                <div class="header__logo-mobile">
                    <!--homepage ? "logo--white.svg" : "logo.svg"-->
                    <div class="logo logo--mobile lazy"
                         data-bg="/static/images/common/{{ Route::is('main') ? 'logo--white.svg' : 'logo.svg' }}">
                    </div>
                </div>
            </div>
            <div class="header__body">
                <div class="header__top">
                    <div class="header__cities">
                        <div class="cities">
                            <a class="cities__current" href="cities.html" data-cities data-type="ajax" title="Изменить город">Екатеринбург
                                <span class="cities__drop iconify" data-icon="ph:caret-down"></span>
                            </a>
                        </div>
                    </div>
                    <div class="header__phone">
                        <a class="phone-link" href="tel:+73433517262">+7 (343) 351 72 62</a>
                    </div>
                    <div class="header__callback">
                        <button class="btn btn--white btn-reset" type="button" aria-label="Заказать звонок" data-popup data-src="#callback">
                            <span>Заказать звонок</span>
                        </button>
                    </div>
                </div>
                @if (isset($headerMenu) && count($headerMenu))
                    <div class="header__bottom">
                    <div class="header__nav">
                        <nav class="nav" itemscope itemtype="https://schema.org/SiteNavigationElement" aria-label="Меню">
                            <ul class="nav__list list-reset" itemprop="about" itemscope itemtype="https://schema.org/ItemList">
                                @foreach($headerMenu as $item)
                                <li class="nav__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ItemList">
                                    <a class="nav__link" href="{{ $item->url }}" itemprop="url" data-link>{{ $item->name }}</a>
                                    <meta itemprop="name" content="{{ $item->name }}">
                                </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
                @endif
            </div>
            <button class="header__dots btn-reset" type="button" aria-label="Показать контакты" @click="dialogIsOpen = true" x-cloak>
                <span class="iconify" data-icon="mdi:dots-vertical" data-width="30"></span>
            </button>
            <div class="header__dialog" x-show="dialogIsOpen" @click.away="dialogIsOpen = false" x-transition.duration.500ms :class="dialogIsOpen &amp;&amp; 'is-active'">
                <div class="h-dialog">
                    <a class="h-dialog__phone" href="tel:+73433517262">+7 (343) 351 72 62</a>
                    <a class="h-dialog__email" href="mailto:info@luxkraft.ru">info@luxkraft.ru</a>
                    <button class="h-dialog__location btn-reset" type="button" aria-label="Изменить город">
                        <span class="h-dialog__location-icon iconify" data-icon="material-symbols:location-on"></span>
                        <span class="h-dialog__location-label">Екатеринбург</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="header__overlay" x-show="menuOverlayIsOpen" @click.away="menuOverlayIsOpen = false" x-transition.duration.500ms :class="menuOverlayIsOpen &amp;&amp; 'is-active'" x-cloak>
        <div class="h-overlay">
            <div class="h-overlay__container">
                <button class="h-overlay__close btn-reset" type="button" aria-label="Закрыть меню" @click="menuOverlayIsOpen = false">
                    <span class="iconify" data-icon="solar:close-square-bold-duotone" data-width="40"></span>
                </button>
                <div class="h-overlay__logo">
                    <a href="javascript:void(0)" title="Luxcraft">
                        <span class="logo logo--mobile lazy" data-bg="/static/images/common/logo--white.svg"></span>
                    </a>
                </div>
                @if (isset($headerMenu) && count($headerMenu))
                 <nav class="h-overlay__nav">
                    <ul class="h-overlay__nav-list list-reset">
                        @foreach($headerMenu as $item)
                            <li class="h-overlay__nav-item">
                                <a class="h-overlay__nav-link" href="{{ $item->url }}">{{ $item->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
                @endif
                <a class="h-overlay__phone" href="tel:+73433517262">+7 (343) 351-72-62</a>
                <a class="h-overlay__email" href="mailto:info@luxkraft.ru">info@luxkraft.ru</a>
                <a class="h-overlay__location" href="cities.html" data-cities data-type="ajax" title="Изменить город">
                    <span class="h-overlay__location-icon iconify" data-icon="material-symbols:location-on"></span>
                    <span class="h-overlay__location-label">Екатеринбург</span>
                </a>
            </div>
        </div>
    </div>
</header>
