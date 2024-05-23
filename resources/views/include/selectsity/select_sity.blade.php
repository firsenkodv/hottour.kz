<div class="hh__3_right top_sity_js" data-token="{{ csrf_token() }}">
    <div class="hhh_img">
        <span><img  src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMi4wODI3IDE0LjU4MzFDMTIuMDgyNyAxNS43MzM5IDExLjE1MDIgMTYuNjY2NCA5Ljk5OTM1IDE2LjY2NjRDOC44NDg1MiAxNi42NjY0IDcuOTE2MDIgMTUuNzMzOSA3LjkxNjAyIDE0LjU4MzFDNy45MTYwMiAxMy40MzIzIDguODQ4NTIgMTIuNDk5OCA5Ljk5OTM1IDEyLjQ5OThDMTEuMTUwMiAxMi40OTk4IDEyLjA4MjcgMTMuNDMyMyAxMi4wODI3IDE0LjU4MzFaIiBzdHJva2U9IndoaXRlIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPHBhdGggZD0iTTExLjY2NjMgNi42NjYyNlY5Ljk5OTU5SDE0LjE2NjNDMTYuOTI3MiA5Ljk5OTU5IDE5LjE2NjMgMTIuMjM4OCAxOS4xNjYzIDE0Ljk5OTZWMTkuMTY2M0gwLjgzMzAwOFYxNC45OTk2QzAuODMzMDA4IDEyLjIzODggMy4wNzIxNyA5Ljk5OTU5IDUuODMzMDEgOS45OTk1OUg4LjMzMzAxVjYuNjY2MjYiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPgo8cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTE3Ljc2OTcgMi43NjgyNUMxNi42MjIyIDIuMDQ1NzUgMTQuNDAzIDAuODMzMjUyIDkuOTk5NjcgMC44MzMyNTJDNS41OTYzNCAwLjgzMzI1MiAzLjM3NzE3IDIuMDQ1NzUgMi4yMjk2NyAyLjc2ODI1QzEuMzU1NTEgMy4zMTgyNSAwLjgzMzAwOCA0LjI0OTA5IDAuODMzMDA4IDUuMjU3NDJWNi43NTkwOUMwLjgzMzAwOCA3LjE2NzQyIDEuMTc0NjcgNy40OTk5MiAxLjU5NzE3IDcuNDk5OTJINS4wNjg4NEM1LjQ5MTM0IDcuNDk5OTIgNS44MzMwMSA3LjE2NzQyIDUuODMzMDEgNi43NTkwOVY0LjQ5MDc1QzYuODMzODQgNC4xMTY1OSA3Ljg1NjM0IDMuNzk1NzUgOS45OTk2NyAzLjc5NTc1QzEyLjE0MTMgMy43OTU3NSAxMy4xNjQ3IDQuMTE2NTkgMTQuMTY2MyA0LjQ5MTU5VjYuNzU5MDlDMTQuMTY2MyA3LjE2NzQyIDE0LjUwOCA3LjQ5OTkyIDE0LjkzMDUgNy40OTk5MkgxOC40MDIyQzE4LjgyNDcgNy40OTk5MiAxOS4xNjYzIDcuMTY3NDIgMTkuMTY2MyA2Ljc1OTA5VjUuMjU3NDJDMTkuMTY2MyA0LjI0OTA5IDE4LjY0MzggMy4zMTgyNSAxNy43Njk3IDIuNzY4MjVaIiBzdHJva2U9IndoaXRlIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPC9zdmc+Cg==" width="20" height="20"  alt="Телефон"></span>
    </div>
    <div class="hhh_adr">
        <span class="h_s_sity"><span class="h_s_sity_js">
                @if(is_null($session_sity))
                    {{config('selects.data_sity.almaty.text')}}
                @else
                    {{$session_sity}}
                @endif
            </span> телефон</span>
        <span class="h_s_phone">{!! config('site.setting.phone1') !!}</span>
    </div><!--.hhh_adr-->

</div><!--.hh__3_right-->

    <div class="tps_ul">
        <div class="tps_ul_absol top_sity_active_js" style="display: none;">


           @foreach( config('selects.data_sity') as $k=>$v)
                <div class="city__{{$k}}">
                    <div class="tps_ph_2 tps_sity_title tps_sity_title_js {{($v['text'] == $session_sity)?'active':''}}">{{$v['text']}}</div>
                </div><!--.ph__-->
           @endforeach

        </div><!--.tps_ul_absol-->
    </div><!--.tps_ul-->


