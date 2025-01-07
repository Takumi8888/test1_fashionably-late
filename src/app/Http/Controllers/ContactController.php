<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Services\ContactCsvService;

class ContactController extends Controller
{
    //Contact画面表示（thanks画面からの遷移も含む）
    public function contactIndex()
    {
        $categories = Category::all();
        return view('contact.contact', compact('categories'));
    }

    //Contact画面：確認画面ボタン → Confirm画面
    public function confirm(ContactRequest $request)
    {
        $categories = Category::all();
        $contacts = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel1',
            'tel2',
            'tel3',
            'address',
            'building',
            'category_id',
            'detail'
        ]);
        return view('contact.confirm', compact('contacts', 'categories'));
    }

    //Confirm画面：送信ボタン → DB登録 → thanks画面
    public function store(Request $request)
    {
        //DB登録時はハイフンは不要だがconfirm画面上ではハイフンがあったほうが
        //ユーザーが見やすいため、storeメソッドにて$telを用意した
        $tel = $request->tel1 . $request->tel2 . $request->tel3;
        $request->merge(['tel' => $tel]);

        $contacts = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel',
            'address',
            'building',
            'category_id',
            'detail'
        ]);
        Contact::create($contacts);
        return view('contact.thanks');
    }

    //Confirm画面：修正 → ContactEdit画面
    public function edit(ContactRequest $request)
    {
        $categories = Category::all();
        $contacts = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel1',
            'tel2',
            'tel3',
            'address',
            'building',
            'category_id',
            'detail'
        ]);
        return view('contact.contactEdit', compact('contacts', 'categories'));
    }

    //register画面：登録ボタン → Admin画面表示
    //Admin画面：リセットボタン → Admin画面表示
    public function adminIndex()
    {
        $categories = Category::all();
        $contacts = Contact::Paginate(7);

        return view('admin.index', compact('contacts', 'categories'));
    }

    // admin画面：logoutボタン → login画面
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('auth.login');
    }

/////////////////////////////////////////////////////
// 以下、機能不十分
/////////////////////////////////////////////////////

    //Admin画面表示：検索ボタン（未達）
    public function search(Request $request)
    {
        //単発での動作は確認できたが、複合すると検索できない
        $contacts = Contact::with('category')
            ->KeywordSearch($request->keyword)
            ->genderSearch($request->gender)
            ->categorySearch($request->category_id)
            ->dateSearch($request->created_at)
            ->Paginate(7);

        $categories = Category::all();

        return view('admin.index', compact('contacts', 'categories'));
    }

    //Admin画面表示：エクスポートボタン（未達：参照サイトより引用した段階止まり）
    protected $service;

    public function __construct(ContactCsvService $service)
    {
        $this->service = $service;
    }

    public function contactExport()
    {
        $data = $this->service->contactExport();
        return response($data, 200);
    }

}
