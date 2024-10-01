<div class="index_questions">
    <div class="index_questions__block">
        <div class="h2">{{__('Остались вопросы?')}}</div>
        <p>{{ __('Свяжитесь с нами и мы проконсультируем вас по любому вопросу') }}</p>
    </div>

    <div class="questions__wrapper">
        <div class="index_questions__flex">
            <div class="index_questions__left">
                <div class="l__title">
                    {{ __('Связь с нами в один клик') }}
                </div>
                <div class="l__phone">
                    {!! (isset($setting['phone2']))? $setting['phone2'] : ''!!}
                </div>
                <div class="l__label_addredd">
                    {{ __('Заходите к нам в гости') }}
                </div>
                <div class="l__addredd">
                    {!! (isset($setting['sityAddress']))? $setting['sityAddress'] :'' !!}
                </div>
                <div class="l__label_social">
                    {{__('или напишите нам')}}
                </div>
                <div class="l__social">
                    <div class="s__1">
                        <a target="_blank" href="{!! (isset($setting['whatsapp']))? $setting['whatsapp'] : '' !!}">
                            <img alt="whatsapp" width="20" height="21" loading="lazy"
                                 src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjEiIHZpZXdCb3g9IjAgMCAyMCAyMSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMC4wNDIgMTkuODU1NEgxMC4wMzc5QzguMzgyNzIgMTkuODU0OSA2Ljc1NjM4IDE5LjQzOTYgNS4zMTE5MSAxOC42NTE3TDAuMDY5MzM1OSAyMC4wMjY5TDEuNDcyMzQgMTQuOTAyM0MwLjYwNjg5NyAxMy40MDI1IDAuMTUxNTA4IDExLjcwMTIgMC4xNTIyNSA5Ljk1ODIyQzAuMTU0NDE5IDQuNTA1NTMgNC41OTA4NSAwLjA2OTMzNTkgMTAuMDQxOSAwLjA2OTMzNTlDMTIuNjg3NCAwLjA3MDQ3NjUgMTUuMTcwNSAxLjEwMDM5IDE3LjAzNzYgMi45Njk3MUMxOC45MDQ3IDQuODM4OTQgMTkuOTMyNSA3LjMyMzYgMTkuOTMxNCA5Ljk2NjAyQzE5LjkyOTIgMTUuNDE3NSAxNS40OTQ1IDE5Ljg1MzIgMTAuMDQyIDE5Ljg1NTRaTTUuNTU0ODIgMTYuODYxNEw1Ljg1NDk3IDE3LjAzOTVDNy4xMTcgMTcuNzg4NSA4LjU2MzY1IDE4LjE4NDcgMTAuMDM4NiAxOC4xODUzSDEwLjA0MkMxNC41NzI0IDE4LjE4NTMgMTguMjU5OCAxNC40OTc5IDE4LjI2MTYgOS45NjU1QzE4LjI2MjUgNy43NjkxNCAxNy40MDgzIDUuNzA0IDE1Ljg1NjQgNC4xNTAyOUMxNC4zMDQ1IDIuNTk2NTcgMTIuMjQwNyAxLjc0MDUxIDEwLjA0NTIgMS43Mzk3NUM1LjUxMTIgMS43Mzk3NSAxLjgyMzc5IDUuNDI2ODIgMS44MjE5OSA5Ljk1ODg0QzEuODIxMzUgMTEuNTEyIDIuMjU1OTIgMTMuMDI0NiAzLjA3ODc0IDE0LjMzMzNMMy4yNzQxOCAxNC42NDQzTDIuNDQzOCAxNy42Nzc1TDUuNTU0ODIgMTYuODYxNFpNMTQuNjg1OSAxMi4wOTUxQzE0Ljg1ODIgMTIuMTc4NCAxNC45NzQ2IDEyLjIzNDcgMTUuMDI0MyAxMi4zMTc2QzE1LjA4NjEgMTIuNDIwNyAxNS4wODYxIDEyLjkxNTQgMTQuODgwMiAxMy40OTI3QzE0LjY3NDIgMTQuMDY5OSAxMy42ODcxIDE0LjU5NjcgMTMuMjEyMyAxNC42Njc2QzEyLjc4NjYgMTQuNzMxMyAxMi4yNDc4IDE0Ljc1NzggMTEuNjU1OSAxNC41Njk3QzExLjI5NyAxNC40NTU5IDEwLjgzNjcgMTQuMzAzOCAxMC4yNDcyIDE0LjA0OTJDNy45MzA2MiAxMy4wNDg5IDYuMzY1MSAxMC44MDM3IDYuMDY5MjEgMTAuMzc5M0M2LjA0ODQ5IDEwLjM0OTYgNi4wMzM5OSAxMC4zMjg4IDYuMDI1OSAxMC4zMThMNi4wMjM5IDEwLjMxNTNDNS44OTMxMSAxMC4xNDA4IDUuMDE2OTEgOC45NzE3NCA1LjAxNjkxIDcuNzYxNzlDNS4wMTY5MSA2LjYyMzU1IDUuNTc2MDIgNi4wMjY5NSA1LjgzMzM5IDUuNzUyMzNDNS44NTEwMiA1LjczMzUyIDUuODY3MjMgNS43MTYyMiA1Ljg4MTc2IDUuNzAwMzVDNi4xMDgyNSA1LjQ1Mjk2IDYuMzc1OTggNS4zOTExMSA2LjU0MDcgNS4zOTExMUM2LjcwNTQyIDUuMzkxMTEgNi44NzAzMyA1LjM5MjY0IDcuMDE0MyA1LjM5OTg3QzcuMDMyMDcgNS40MDA3NiA3LjA1MDU1IDUuNDAwNjUgNy4wNjk2NSA1LjQwMDU0QzcuMjEzNjUgNS4zOTk2OSA3LjM5MzE3IDUuMzk4NjQgNy41NzAyOCA1LjgyNDA1QzcuNjM4NDIgNS45ODc3OCA3LjczODEyIDYuMjMwNTIgNy44NDMyOCA2LjQ4NjUzQzguMDU1OSA3LjAwNDE3IDguMjkwODIgNy41NzYwNyA4LjMzMjE1IDcuNjU4ODNDOC4zOTM5NCA3Ljc4MjUzIDguNDM1MTEgNy45MjY3NyA4LjM1Mjc1IDguMDkxNzdDOC4zNDAzOCA4LjExNjUgOC4zMjg5NSA4LjEzOTg1IDguMzE4MDIgOC4xNjIxNUM4LjI1NjE2IDguMjg4NDYgOC4yMTA2NSA4LjM4MTM2IDguMTA1NjUgOC41MDM5NkM4LjA2NDM2IDguNTUyMTYgOC4wMjE2OSA4LjYwNDEzIDcuOTc5MDIgOC42NTYxQzcuODk0MDEgOC43NTk2MyA3LjgwOSA4Ljg2MzE1IDcuNzM0OTggOC45MzY4OUM3LjYxMTI4IDkuMDYwMTEgNy40ODI1IDkuMTkzOCA3LjYyNjY0IDkuNDQxMTlDNy43NzA3OSA5LjY4ODU4IDguMjY2NzEgMTAuNDk3NyA5LjAwMTMxIDExLjE1M0M5Ljc5MDk3IDExLjg1NzMgMTAuNDc3MyAxMi4xNTUgMTAuODI1MiAxMi4zMDU5QzEwLjg5MzEgMTIuMzM1NCAxMC45NDgxIDEyLjM1OTMgMTAuOTg4NSAxMi4zNzk1QzExLjIzNTUgMTIuNTAzMiAxMS4zNzk3IDEyLjQ4MjUgMTEuNTIzOCAxMi4zMTc2QzExLjY2OCAxMi4xNTI3IDEyLjE0MTUgMTEuNTk2MSAxMi4zMDYyIDExLjM0ODdDMTIuNDcwOSAxMS4xMDE0IDEyLjYzNTcgMTEuMTQyNiAxMi44NjIyIDExLjIyNUMxMy4wODg4IDExLjMwNzYgMTQuMzAzNiAxMS45MDUzIDE0LjU1MDcgMTIuMDI5QzE0LjU5OSAxMi4wNTMxIDE0LjY0NDEgMTIuMDc0OSAxNC42ODU5IDEyLjA5NTFaIiBmaWxsPSIjRkRGREZEIi8+Cjwvc3ZnPgo=">
                        </a>
                    </div>
                    <div class="s__2">
                        <a target="_blank" href="{!! (isset($setting['telegram']))? $setting['telegram'] : '' !!}">
                            <img alt="telegram" width="19" height="16" loading="lazy"
                                 src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTUiIHZpZXdCb3g9IjAgMCAxOCAxNSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEuMTQ2NDcgNi43NTU3NkMyLjgzOTc2IDUuODIzMDggNC43Mjk5MyA1LjA0NDYxIDYuNDk2MDEgNC4yNjIxOEM5LjUzNDM1IDIuOTgwNjIgMTIuNTg0OCAxLjcyMTI3IDE1LjY2NiAwLjU0ODgzOEMxNi4yNjU0IDAuMzQ5MDc5IDE3LjM0MjYgMC4xNTM3NDkgMTcuNDQ4MiAxLjA0MjEyQzE3LjM5MDMgMi4yOTk2NiAxNy4xNTI0IDMuNTQ5ODMgMTYuOTg5MyA0LjhDMTYuNTc1MSA3LjU0OTI1IDE2LjA5NjMgMTAuMjg5MSAxNS42Mjk1IDEzLjAyOTNDMTUuNDY4NiAxMy45NDIgMTQuMzI1MiAxNC40MTQ1IDEzLjU5MzYgMTMuODMwNEMxMS44MzU0IDEyLjY0MjggMTAuMDYzNiAxMS40NjY3IDguMzI3ODYgMTAuMjUxNUM3Ljc1OTI3IDkuNjczNzggOC4yODY1MyA4Ljg0NDA3IDguNzk0MzQgOC40MzE0OUMxMC4yNDI1IDcuMDA0MzYgMTEuNzc4MiA1Ljc5MTg1IDEzLjE1MDcgNC4yOTA5N0MxMy41MjA5IDMuMzk2OTkgMTIuNDI3IDQuMTUwNCAxMi4wNjYyIDQuMzgxMjdDMTAuMDgzNyA1Ljc0NzQ1IDguMTQ5NzMgNy4xOTcwMyA2LjA1OTU1IDguMzk3NzFDNC45OTE4OSA4Ljk4NTQzIDMuNzQ3NTEgOC40ODMxOCAyLjY4MDMzIDguMTU1MjVDMS43MjM0OSA3Ljc1OTA3IDAuMzIxMzM3IDcuMzU5OTMgMS4xNDYzOCA2Ljc1NTg4TDEuMTQ2NDcgNi43NTU3NloiIGZpbGw9IndoaXRlIi8+Cjwvc3ZnPgo=">
                        </a>
                    </div>
                    <div class="s__3">
                        <a target="_blank" href="mailto:{!!  (isset($setting['email']))? $setting['email'] : '' !!}">
                            <img alt="email" width="21" height="18" loading="lazy"
                                 src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjMiIGhlaWdodD0iMTkiIHZpZXdCb3g9IjAgMCAyMyAxOSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEuNzc3MzQgNS42MDg0TDEwLjI1MzcgOS41MjExM0MxMS4yMjEgOS45NjY1OCAxMi4zMzM3IDkuOTY2NTggMTMuMzAxIDkuNTIxMTNMMjEuNzc3MyA1LjYwODQiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS13aWR0aD0iMS42IiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xOS45NTkyIDE3LjQ5NjdIMy41OTU1M0MyLjU5MTg5IDE3LjQ5NjcgMS43NzczNCAxNi42ODIxIDEuNzc3MzQgMTUuNjc4NUwxLjc3NzM0IDIuOTUxMjRDMS43NzczNCAxLjk0NzYgMi41OTE4OSAxLjEzMzA2IDMuNTk1NTMgMS4xMzMwNkwxOS45NTkyIDEuMTMzMDZDMjAuOTYyOCAxLjEzMzA2IDIxLjc3NzMgMS45NDc2IDIxLjc3NzMgMi45NTEyNFYxNS42Nzg1QzIxLjc3NzMgMTYuNjgyMSAyMC45NjI4IDE3LjQ5NjcgMTkuOTU5MiAxNy40OTY3WiIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLXdpZHRoPSIxLjYiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPgo8L3N2Zz4K">
                        </a>
                    </div>
                </div>


            </div><!--.index_questions__left-->
            <div class="index_questions__right">

                @include('html.temp_forms.order_mini')


            </div>

        </div>


    </div>


</div><!--.index_questions-->
