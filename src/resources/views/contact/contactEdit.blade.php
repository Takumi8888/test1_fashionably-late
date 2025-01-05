@extends('layouts.appContact')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact/contact.css') }}" />
@endsection

@section('content')
<div class="contact__content">
    <div class="contact__heading">
        <h2>Contact</h2>
    </div>
    <div class="contact-table">
        <form class="form" action="/confirm" method="POST">
        @csrf
            <table class="contact-table__inner">
                <tr class="contact-table__row">
                    <th class="contact-table__heading">
                        <span class="contact-table__label--item">お名前</span>
                        <span class="contact-table__label--required">※</span>
                    </th>
                    <td class="contact-table__item">
                        <div class="contact-form__input--name">
                            <div class="contact-form__input--first-name">
                                <input type="text" name="first_name" placeholder="例: 山田" value="{{ $contacts['first_name'] }}" />
                            </div>
                            <div class="contact-form__input--last-name">
                                <input type="text" name="last_name" placeholder="例: 太郎" value="{{ $contacts['last_name'] }}" />
                            </div>
                        </div>
                        <div class="contact-form__error">
                            <ul class="contact-form__error--item">
                                @error('first_name')
                                    <li>{{ $message }}</li>
                                @enderror
                                @error('last_name')
                                    <li>{{ $message }}</li>
                                @enderror
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="contact-table__row">
                    <th class="contact-table__heading">
                        <span class="contact-table__label--item">性別</span>
                        <span class="contact-table__label--required">※</span>
                    </th>
                    <td class="contact-table__item">
                        <div class="contact-form__input--gender">
                            <div class="contact-form__input--gender-man">
                                <input type="radio" name="gender" value="1" {{ $contacts['gender'] == '1' ? 'checked' : '' }} />
                                <label for="gender1">男性</label>
                            </div>
                            <div class="contact-form__radio--gender-woman">
                                <input type="radio" name="gender" value="2" {{ $contacts['gender'] == '2' ? 'checked' : '' }}/>
                                <label for="gender2">女性</label>
                            </div>
                            <div class="contact-form__radio--gender-others">
                                <input type="radio" name="gender" value="3" {{ $contacts['gender'] == '3' ? 'checked' : '' }}/>
                                <label for="gender3">その他</label>
                            </div>
                        </div>
                        <div class="contact-form__error">
                            <ul class="contact-form__error--item">
                                @error('gender')
                                    <li>{{ $message }}</li>
                                @enderror
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="contact-table__row">
                    <th class="contact-table__heading">
                        <span class="contact-table__label--item">メールアドレス</span>
                        <span class="contact-table__label--required">※</span>
                    </th>
                    <td class="contact-table__item">
                        <div class="contact-form__input">
                            <input type="email" name="email" placeholder="例: test@example.com" value="{{ $contacts['email'] }}" />
                        </div>
                        <div class="contact-form__error">
                            <ul class="contact-form__error--item">
                                @error('email')
                                    <li>{{ $message }}</li>
                                @enderror
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="contact-table__row">
                    <th class="contact-table__heading">
                        <span class="contact-table__label--item">電話番号</span>
                        <span class="contact-table__label--required">※</span>
                    </th>
                    <td class="contact-table__item">
                        <div class="contact-form__input--tel">
                            <input type="tel" name="tel1" placeholder="080" value="{{ $contacts['tel1'] }}" />-
                            <input type="tel" name="tel2" placeholder="1234" value="{{ $contacts['tel2'] }}" />-
                            <input type="tel" name="tel3" placeholder="5678" value="{{ $contacts['tel3'] }}" />
                        </div>
                        <div class="contact-form__error">
                            <ul class="contact-form__error--item">
                                @error('tel*')
                                    <li>{{ $message }}</li>
                                @enderror
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="contact-table__row">
                    <th class="contact-table__heading">
                        <span class="contact-table__label--item">住所</span>
                        <span class="contact-table__label--required">※</span>
                    </th>
                    <td class="contact-table__item">
                        <div class="contact-form__input">
                            <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ $contacts['address'] }}" />
                        </div>
                        <div class="contact-form__error">
                            <ul class="contact-form__error--item">
                                @error('address')
                                    <li>{{ $message }}</li>
                                @enderror
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="contact-table__row">
                    <th class="contact-table__heading">
                        <span class="contact-table__label--item">建物</span>
                    </th>
                    <td class="contact-table__item">
                        <div class="contact-form__input">
                            <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ $contacts['building'] }}" />
                        </div>
                        <div class="contact-form__error">
                            <ul class="contact-form__error--item">
                                @error('building')
                                    <li>{{ $message }}</li>
                                @enderror
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="contact-table__row">
                    <th class="contact-table__heading">
                        <span class="contact-table__label--item">お問い合わせの種類</span>
                        <span class="contact-table__label--required">※</span>
                    </th>
                    <td class="contact-table__item">
                        <div class="contact-form__input--select">
                            <select class="contact-form__item-select" name="category_id">
                                <option value="null" hidden>選択してください</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category['id'] }}" @if( $contacts['category_id'] ==  $category['id'] ) selected @endif>{{ $category['content'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="contact-form__error">
                            <ul class="contact-form__error--item">
                                @error('category_id')
                                    <li>{{ $message }}</li>
                                @enderror
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="contact-table__row">
                    <th class="contact-table__heading">
                        <span class="contact-table__label--item">お問い合わせ内容</span>
                        <span class="contact-table__label--required">※</span>
                    </th>
                    <td class="contact-table__item">
                        <div class="contact-form__input--textarea">
                            <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ $contacts['detail']}}</textarea>
                        </div>
                        <div class="contact-form__error">
                            <ul class="contact-form__error--item">
                                @error('detail')
                                    <li>{{ $message }}</li>
                                @enderror
                            </ul>
                        </div>
                    </td>
                </tr>
            </table>
        <div class="contact-form__button">
            <button class="contact-form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection