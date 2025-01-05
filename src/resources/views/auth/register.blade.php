@extends('layouts.appLogin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
@endsection

@section('content')
<div class="register-form__content">
    <div class="register-form__heading">
        <h2>Register</h2>
    </div>
    <form class="register-form" action="/register" method="POST">
        @csrf
        <div class="register-form__group">
            <div class="register-form__group-title">
                <span class="register-form__label--item">お名前</span>
            </div>
            <div class="register-form__group-content">
                <div class="register-form__input--text">
                    <input type="text" name="name" placeholder="例: 山田　太郎" value="{{ old('name') }}" />
                </div>
                <div class="register-form__error">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="register-form__group">
            <div class="register-form__group-title">
                <span class="register-form__label--item">メールアドレス</span>
            </div>
            <div class="register-form__group-content">
                <div class="register-form__input--text">
                    <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" />
                </div>
                <div class="register-form__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="register-form__group">
            <div class="register-form__group-title">
                <span class="register-form__label--item">パスワード</span>
            </div>
            <div class="register-form__group-content">
                <div class="register-form__input--text">
                    <input type="password" name="password" name="password_confirmation" placeholder="例: coachtech1106" value="{{ old('password') }}" />
                </div>
                <div class="register-form__error">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        {{-- <div class="register-form__group">
            <div class="register-form__group-title">
                <span class="register-form__label--item">確認パスワード</span>
            </div>
            <div class="register-form__group-content">
                <div class="register-form__input--text">
                    <input type="password" name="password_confirmation" />
                </div>
            </div>
        </div> --}}

        <div class="register-form__button">
            <button class="register-form__button-submit" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection