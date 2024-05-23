@props([
    'id' => 1,
    'limit' => 3,
])

@foreach($menu['categories'] as $category)
    @if($category->id == $id)
        <div class="fmenu__title">{{$category->title}}</div>
        <ul class="desktopmenu">

            @foreach($category->article as $k => $article)
                @if($k == $limit)
                    @break
                @endif
                <li class="desktopmenu__nav_text
               {{ active_linkMenu(asset(config('datastorage.linkServices').'/'.$category->slug .'/'. $article->slug))}} ">
                    <a href="/{{config('datastorage.linkServices')}}/{{$category->slug }}/{{ $article->slug }}">{{ $article->title }}</a>
                </li>
            @endforeach

        </ul>
    @endif
@endforeach
