<header>
    <div class="background_000000">
        <div class="block">
            <div class="flex header_top menu_social">
                <div class="menu_social__menu">
                    @include('include.menu.menu')
                </div>
                <div class="menu_social__social">
                    @include('include.icons.top_social')
                    @include('include.translate.translate')
                </div>

            </div><!--.header_top-->
        </div>
    </div><!--.background_000000-->
    <div class="background_282828 {{ $route }}">
    <div class="block">
        <div class="hb header_bottom flex">

            <div class="hb__left">
                <div class="hb__logo">
                    <x-logo.logo
                    width="234"
                    height="42"
                    />
                </div>
                <div class="hb__social">
                    @include('include.icons.top_social_big')
                </div>
            </div>

            <div class="hb__right flex">
                <div class="hb__col hb__one">
                    <div class="top_order_call">
                        @include('include.ordercall.top_order_call')
                    </div>

                    <div class="top_select_sity">
                        @include('include.selectsity.select_sity')
                    </div>
                </div>
                <div class="hb__col hb__two">
                    @include('include.enter.enter')
                </div>

            </div>

        </div><!--.header_bottom-->
    </div>
    </div><!--.background_282828-->
</header>
