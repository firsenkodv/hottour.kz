<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInFormEmailRequest;
use App\Http\Requests\SignInFormPhoneRequest;
use App\Http\Requests\SignInFormRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\RedirectResponse;
use MoonShine\Models\MoonshineUser;


class SignInController extends Controller
{

    public function pagePhone()
    {
        return view('auth.login');
    }
    public function pageEmail()
    {
        return view('auth.login-email');
    }

    public function handleEmail(SignInFormEmailRequest $request): RedirectResponse
    {

        if (!auth()->attempt($request->validated()))
        {

            flash()->alert(config('message_flash.alert.email'));
            return back()->withInput();
        }


        $request->session()->regenerate();
        flash()->info(config('message_flash.info.success_enter'));

        return redirect()->intended(route('setting')); // intended - назад или route
    }

    public function handlePhone(SignInFormPhoneRequest $request): RedirectResponse
    {

        $user = User::query()->where('phone', $request->phone)->first();

        if(!$user) {
            return back()->withErrors([
                'phone' => 'Ошибка в поле "Номер телефона"',
            ])->onlyInput('phone');
        }

        if (!auth()->attempt(['email' => $user->email, 'password' => $request->password])) {

            return back()->withErrors([
                'password' => 'Ошибка в поле "Пароль"',
            ])->onlyInput('password');
        }


        $request->session()->regenerate();
        flash()->info(config('message_flash.info.success_enter'));

        return redirect()->intended(route('setting')); // intended - назад или route
    }




}
