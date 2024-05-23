
<div class="cli_hot_user_Flex">
    <div class="cli_hot_user_left">
        <x-forms.form-multipart
            action="{{ route('uploadAvatarAdminUser') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            <div class="image-upload__cabinet ">

            <label for="upload_admin-user_ava">
                <div class="site_avatar" style="background-image: url('@if(isset($item->avatar)) {{ Storage::disk('user')->url($item->avatar) }} @else {!! 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzYiIGhlaWdodD0iMzYiIHZpZXdCb3g9IjAgMCAzNiAzNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xOCAwQzguMDU5NSAwIDAgOC4wNTk1IDAgMThDMCAyNy45NDA1IDguMDU5NSAzNiAxOCAzNkMyNy45NDA1IDM2IDM2IDI3Ljk0MDUgMzYgMThDMzYgOC4wNTk1IDI3Ljk0MDUgMCAxOCAwWk0xOCA3LjUwMDA3QzIxLjcyMTUgNy41MDAwNyAyNC43NSAxMC41Mjg2IDI0Ljc1IDE0LjI1MDFDMjQuNzUgMTcuOTcxNiAyMS43MjE1IDIxLjAwMDEgMTggMjEuMDAwMUMxNC4yNzg1IDIxLjAwMDEgMTEuMjUgMTcuOTcxNiAxMS4yNSAxNC4yNTAxQzExLjI1IDEwLjUyODYgMTQuMjc4NSA3LjUwMDA3IDE4IDcuNTAwMDdaTTcuOTQ1NTEgMjkuMDk4NEMxMC42MDk1IDMxLjUxNDkgMTQuMTMgMzIuOTk5OSAxOCAzMi45OTk5QzIxLjg3IDMyLjk5OTkgMjUuMzkwNSAzMS41MTQ5IDI4LjA1NDUgMjkuMDk4NEMyNi43ODU1IDI2LjE2MTQgMjIuNzc2IDIzLjk5OTkgMTggMjMuOTk5OUMxMy4yMjQgMjMuOTk5OSA5LjIxNDUxIDI2LjE2MTQgNy45NDU1MSAyOS4wOTg0WiIgZmlsbD0iI0UwRTBFMCIvPgo8L3N2Zz4K' !!} @endif '); width: 100px; height: 100px"></div>
            </label>
            <input type="file" name="upload_f" id="upload_admin-user_ava" class="upload_f_admin_to_user" />
            <input type="hidden" name="id" value="{{$item->id}}" />
            </div>
        </x-forms.form-multipart>
    </div><!--.cli_hot_user_left-->
    <div class="cli_hot_user_right">
        <div class="hot_user_username" data-user="{{ $item->id }}">{{ $item->name }}</div>
        <div class="hot_user_email">{{ $item->email }}</div>
        <div class="hot_user_phone">{{ ($item->phone)?format_phone($item->phone):'-' }}</div>
    </div><!--.cli_hot_user_right-->
</div>
