@extends('layouts.appContact')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact/confirm.css') }}" />
@endsection

@section('content')
<div class="confirm__content">
    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>
    <form class="form" method="POST">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text-name">
                        <div class="form__input--last-name">
                            {{ $contacts['last_name'] }}
                            <input type="hidden" name="last_name" value="{{ $contacts['last_name'] }}" readonly />
                        </div>
                        <div class="form__input--first-name">
                            {{ $contacts['first_name'] }}
                            <input type="hidden" name="first_name" value="{{ $contacts['first_name'] }}" readonly />
                        </div>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        @for($i=1; $i<4; $i++)
                            @if($i == $contacts['gender'] && $i == 1)
                                {{ '男性' }}
                            @elseif($i == $contacts['gender'] && $i == 2)
                                {{ '女性' }}
                            @elseif($i == $contacts['gender'] && $i == 3)
                                {{ 'その他' }}
                            @endif
                        @endfor
                        <input type="hidden" name="gender" value="{{ $contacts['gender'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        {{ $contacts['email'] }}
                        <input type="hidden" name="email" value="{{ $contacts['email'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        {{ $contacts['tel1'] }}
                        <input type="hidden" name="tel1" value="{{ $contacts['tel1'] }}" readonly />-
                        {{ $contacts['tel2'] }}
                        <input type="hidden" name="tel2" value="{{ $contacts['tel2'] }}" readonly />-
                        {{ $contacts['tel3'] }}
                        <input type="hidden" name="tel3" value="{{ $contacts['tel3'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        {{ $contacts['address'] }}
                        <input type="hidden" name="address" value="{{ $contacts['address'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        {{ $contacts['building'] }}
                        <input type="hidden" name="building" value="{{ $contacts['building'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        @foreach($categories as $category)
                            @if($category['id'] == $contacts['category_id'])
                                {{ $category['content'] }}
                            @endif
                        @endforeach
                        <input type="hidden" name="category_id" value="{{ $contacts['category_id'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        {{ $contacts['detail'] }}
                        <input type="hidden" name="detail" value="{{ $contacts['detail'] }}" readonly />
                    </td>
                </tr>
            </table>
            <div class="confirm-button">
                <div class="confirm-button__send">
                    <button class="confirm-button__send--submit" type="submit" formaction="/thanks" >送信</button>
                </div>
                <div class="confirm-button__edit">
                    <button class="confirm-button__edit--submit" type="submit" formaction="/" >修正</button>
                </div>
            </div>
        </div>
    </form>

    </div>
@endsection
