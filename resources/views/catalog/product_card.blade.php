<div class="cards-view__item" data-aos="fade-down" data-aos-duration="900" data-aos-delay="150">
    <div class="prod">
        <a href="{{ $product->url }}" title="{{ $product->name }}">
            <img class="prod__pic lazy" src="{{ $product->getFirstMediaUrl('default', 'card') }}"
                 data-src="{{ $product->getFirstMediaUrl('default', 'card') }}" width="250" height="208" alt="" />
        </a>
        <div class="prod__body">
            <a class="prod__title" href="{{ $product->url }})" title="{{ $product->name }}">{{ $product->h1 }}</a>
            <div class="prod__action">
                <button class="prod__btn btn-reset" data-request="data-request" data-src="#calc"
                        data-label="Короб 4-х клапанный, бурый, профиль В, Т-23 в Екатеринбурге" aria-label="Расчёт цены">
                    <span class="prod__btn-icon lazy" data-bg="static/images/common/ico_calc.svg"></span>
                    <span class="prod__btn-label">Расчёт цены</span>
                    <svg width="86" height="19" viewBox="0 0 86 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M73.286 18L85.0001 9.5M85.0001 9.5L73.0001 0.999993M85.0001 9.5L6.02921e-05 9.5" stroke="currentColor" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
