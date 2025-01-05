<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ContactCsvService
{
    const CSV_EXPORT_HEADER = [
        "id",
        "first_name",
        "last_name",
        "gender",
        "email",
        "tel",
        "address",
        "building",
        "category_id",
        "detail",
        "created_at",
        "updated_at",
    ];

    public function contactExport()
    {
        // ファイルヘッダーとなる文字列作成
        $header = collect(self::CSV_EXPORT_HEADER)->implode(",");
        // select句になる文字列作成
        $selectStr = collect(self::CSV_EXPORT_HEADER)->map(function ($item) {
            return "ifnull({$item}, '')";
        })->implode(", ',' ,");
        // データの取得
        $contacts = DB::table('contacts')
        ->select(DB::raw("concat({$selectStr}) record"))
        ->pluck("record");
        // ヘッダーとデータを加えて改行コードでつなげて１つの文字列にする
        return $contacts->prepend($header)->implode("\r\n");
    }
}
