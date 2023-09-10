<footer class="footer">
    <div class="footer__container container">
        <div class="footer__grid">
            <div class="footer__logo">
                <div class="logo lazy" data-bg="/static/images/common/logo--white.svg"></div>
            </div>
            @if (isset($footerMenu) && count($footerMenu))
            <nav class="footer__nav">
                <ul class="footer__nav-list list-reset">
                    @foreach($footerMenu as $item)
                    <li class="footer__nav-item">
                        <a class="footer__nav-link" href="{{ $item->url }}">{{ $item->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </nav>
            @endif
            <div class="footer__info">
                <div class="footer__contacts">
                    <div class="footer__key">Телефон:</div>
                    <a class="footer__value" href="tel:+73433861898">+7 (343) 386-18-98</a>
                    <div class="footer__socials">
                        <a class="footer__icon" href="javascript:void(0)" title="Люкскрафт ВКонтакте" target="_blank">
                            <span class="iconify" data-icon="ion:logo-vk"></span>
                        </a>
                        <a class="footer__icon" href="javascript:void(0)" title="Люкскрафт Youtube" target="_blank">
                            <span class="iconify" data-icon="ant-design:youtube-filled"></span>
                        </a>
                    </div>
                </div>
                <div class="footer__place">
                    <div class="footer__key">Адрес производства:</div>
                    <div class="footer__value">Россия, Курганская область, г. Шадринск, Курганский тракт 1</div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <a class="footer__policy" href="{{ route('policy') }}" target="_blank">Политика обработки персональных данных</a>
        </div>
    </div>
</footer>
