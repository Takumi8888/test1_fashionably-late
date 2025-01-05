@extends('layouts.appLogin')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap-4.css') }}">
@endsection

{{-- @section('livewire')
    @livewireStyles
@endsection --}}

@section('content')
<div class="admin__content">
    <div class="admin__heading">
        <h2>Admin</h2>
    </div>
    <form class="search-form">
        @csrf
        <div class="search-form__group">
            {{-- 名前、メールアドレス --}}
            <input class="search-form__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
            {{-- 性別 --}}
            <select class="search-form__item-gender" name="gender">
                <option value="null" hidden>性別</option>
                @for($i=1; $i<4; $i++)
                    @if($i == 1)
                        <option value="1">{{ '男性' }}</option>
                    @elseif($i == 2)
                        <option value="2">{{ '女性' }}</option>
                    @elseif($i == 3)
                        <option value="3">{{ 'その他' }}</option>
                    @endif
                @endfor
            </select>
            {{-- お問い合わせの種類 --}}
            <select class="search-form__item-select" name="category_id">
                <option value="null" hidden>お問い合わせの種類</option>
                @foreach($categories as $category)
                    <option value="{{ $category['id'] }}" >{{ $category['content'] }}</option>
                @endforeach
            </select>
            {{-- 日付 --}}
            <input class="search-form__item-date" type="date">
            {{-- 検索 --}}
            <div class="search-button__search">
                <button class="search-button__search--submit" type="submit" formaction="/admin/search" formmethod="POST">検索</button>
            </div>
            {{-- リセット --}}
            <div class="search-button__reset">
                <button class="search-button__reset--submit" type="submit" formaction="/admin" formmethod="GET" >リセット</button>
            </div>
        </div>
    </form>

    <div class="export-page">
        {{-- エクスポート （参照サイトより引用した段階止まり）--}}
        <div class="export__button">
            <button class="export__button-submit" id="export" type="button">エクスポート</button>

                {{-- <script>
                    'use strict'
                    document.getElementById('download')
                    .addEventListener('click', () => {
                        fetch('/api/userExport', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.getElementsByName('csrf-token')[0].content,
                                'Content-Type': 'application/json'
                                },
                        })
                        .then(response => response.blob().then(blob => {
                            let link = document.createElement('a')
                            link.href = window.URL.createObjectURL(blob)
                            link.download = 'users.csv'
                            link.click()
                        }))
                    })
                </script> --}}



        </div>
        {{-- ページネーション --}}
        <div class="admin__page">
            {{-- {{$contacts->appends(request()->query())->links('vendor.pagination.bootstrap-4')}} --}}
            {{-- {{ $contacts->links('vendor.pagination.bootstrap-4') }} --}}
        </div>
    </div>

    <div class="admin-table">
        <table class="admin-table__inner">
            <tr class="admin-table__row-heading">
                <th class="admin-table__heading-name">
                    <span class="admin-table__label--item">お名前</span>
                </th>
                <th class="admin-table__heading-gender">
                    <span class="admin-table__label--item">性別</span>
                </th>
                <th class="admin-table__heading-email">
                    <span class="admin-table__label--item">メールアドレス</span>
                </th>
                <th class="admin-table__heading-category">
                    <span class="admin-table__label--item">お問い合わせの種類</span>
                </th>
                <th class="admin-table__heading-detail">
                    <span class="admin-table__label--item"></span>
                </th>
            </tr>
            @foreach($contacts as $contact)
                <tr class="admin-table__row">
                    <td class="admin-table__item-name">
                        <div class="admin-table__item--last-name">
                            {{ $contact['last_name'] }}
                            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" readonly />
                        </div>
                        <div class="admin-table__item--first-name">
                            {{ $contact['first_name'] }}
                            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" readonly />
                        </div>
                    </td>
                    <td class="admin-table__item">
                        @for($i=1; $i<4; $i++)
                            @if($i == $contact['gender'] && $i == 1)
                                {{ '男性' }}
                            @elseif($i == $contact['gender'] && $i == 2)
                                {{ '女性' }}
                            @elseif($i == $contact['gender'] && $i == 3)
                                {{ 'その他' }}
                            @endif
                        @endfor
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}" readonly />
                    </td>
                    <td class="admin-table__item">
                        {{ $contact['email'] }}
                        <input type="hidden" name="email" value="{{ $contact['email'] }}" readonly />
                    </td>
                    <td class="admin-table__item">
                        @foreach($categories as $category)
                            @if($category['id'] == $contact['category_id'])
                                {{ $category['content'] }}
                            @endif
                        @endforeach
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" readonly />
                    </td>
                    <td class="admin-table__item">
                        <div class="admin-table__button">
                            <button class="admin-table__button--modal" type="button" wire:click="openModal()">詳細</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

{{-- モーダルウィンドウ --}}
{{-- @if($showModal)
    <div class="modal__content">
        <div class="modal__window">
            <button class="modal__close" type="button" wire:click="closeModal()">✕</button>
            <table class="">
                <tr class=""></tr>
            </table>
            <form class="admin-form__delete" action="/delete" method="POST">
            @method('DELETE')
            @csrf
                <input class="admin-form__input--delete-contact" type="hidden" name="id" value="{{ $contact['id'] }}">
                <button class="admin-form__button--delete">削除</button>
            </form>
        </div>
    </div>
@endif --}}

</div>
{{-- @livewireScripts --}}
@endsection