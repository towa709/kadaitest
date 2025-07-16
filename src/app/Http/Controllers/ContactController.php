<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Models\Category;



class ContactController extends Controller
{
  public function index()
  {
    return view('contact.index');
  }

  public function confirm(ContactRequest $request)
  {
    $inputs = $request->all();

    // category_id からカテゴリ名を取得
    $category = Category::find($inputs['category_id']);
    $inputs['category_name'] = $category ? $category->content : '未設定';

    return view('contact.confirm', ['data' => $inputs]);
  }

  public function store(Request $request)
  {
    $inputs = $request->all();

    $tel = $inputs['tel1'] . '-' . $inputs['tel2'] . '-' . $inputs['tel3'];

    Contact::create([
      'last_name' => $inputs['last_name'],
      'first_name' => $inputs['first_name'],
      'gender' => $inputs['gender'],
      'email' => $inputs['email'],
      'tel' => $tel,
      'address' => $inputs['address'],
      'building' => $inputs['building'],
      'detail' => $inputs['detail'] ?? null,
      'category_id' => $inputs['category_id'],
    ]);

    return redirect()->route('contact.thank');
  }

  public function thank(Request $request)
  {
    return view('contact.thank');
  }
}
