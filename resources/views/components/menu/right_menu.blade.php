<ul class="desktopmenu">

    @foreach($menu['categories'] as $category)
        <li class="desktopmenu__nav_text {{active_linkMenu(asset(config('datastorage.linkServices').'/'. $category->slug)) }}"><a href="{{asset(config('datastorage.linkServices').'/'. $category->slug) }}">{{ $category->title }}</a></li>
    @endforeach
    <li class="desktopmenu__nav_text {{active_linkMenu(asset('/polzovatelskoe-soglashhenie')) }}"><a href="{{ asset('/polzovatelskoe-soglashhenie') }}">{{__('Пользовательское соглащение')}}</a></li>
</ul>
