<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Symfony\Component\HttpFoundation\StreamedResponse;

class UserController extends Controller
{
  // 管理画面：検索・絞り込み・一覧表示
  public function index(Request $request)
  {
    $query = Contact::query();
    $keyword = $request->input('keyword');

    // 🔍 検索（名前・メール）
    if ($keyword) {
      $query->where(function ($q) use ($keyword) {
        if (preg_match('/^"(.*)"$/', $keyword, $matches)) {
          $exact = $matches[1];
          $q->where('first_name', $exact)
            ->orWhere('last_name', $exact)
            ->orWhere('email', $exact);
        } else {
          $q->where('first_name', 'like', "%{$keyword}%")
            ->orWhere('last_name', 'like', "%{$keyword}%")
            ->orWhere('email', 'like', "%{$keyword}%");
        }
      });
    }

    // 📂 カテゴリ（type）
    if ($request->filled('type')) {
      $type = $request->input('type');
      $query->whereHas('category', function ($q) use ($type) {
        $q->where('name', $type);
      });
    }

    // 🚻 性別
    if ($request->filled('gender')) {
      $gender = $request->input('gender');
      $query->where('gender', $gender);
    }

    // 📅 日付
    if ($request->filled('date')) {
      $query->whereDate('created_at', $request->input('date'));
    }

    // 📄 ページネーション
    $users = $query->paginate(7)->appends($request->query());

    // ビュー返却
    return view('admin.admin', compact('users'));
  }

  // エクスポート処理
  public function export(Request $request)
  {
    $query = Contact::query()->with('category');

    if ($request->filled('keyword')) {
      $query->where(function ($q) use ($request) {
        $q->where('first_name', 'like', "%" . $request->keyword . "%")
          ->orWhere('last_name', 'like', "%" . $request->keyword . "%")
          ->orWhere('email', 'like', "%" . $request->keyword . "%");
      });
    }

    if ($request->filled('type')) {
      $query->whereHas('category', function ($q) use ($request) {
        $q->where('name', $request->type);
      });
    }

    if ($request->filled('gender')) {
      $query->where('gender', $request->gender);
    }

    if ($request->filled('date')) {
      $query->whereDate('created_at', $request->date);
    }

    $contacts = $query->get();

    $csvHeader = [
      'お名前',
      '性別',
      'メールアドレス',
      '電話番号',
      '住所',
      '建物名',
      'お問い合わせの種類',
      'お問い合わせ内容'
    ];

    $callback = function () use ($contacts, $csvHeader) {
      $handle = fopen('php://output', 'w');
      fputcsv($handle, $csvHeader);

      foreach ($contacts as $contact) {
        // PHP 7.4 対応の switch 文に変更
        $genderLabel = '未設定';
        switch ($contact->gender) {
          case 1:
            $genderLabel = '男性';
            break;
          case 2:
            $genderLabel = '女性';
            break;
          case 3:
            $genderLabel = 'その他';
            break;
        }

        fputcsv($handle, [
          $contact->last_name . ' ' . $contact->first_name,
          $genderLabel,
          $contact->email,
          $contact->tel,
          $contact->address,
          $contact->building,
          $contact->category->name ?? '---',
          $contact->content
        ]);
      }

      fclose($handle);
    };


    return new StreamedResponse($callback, 200, [
      "Content-Type" => "text/csv",
      "Content-Disposition" => "attachment; filename=contacts_export.csv",
    ]);
  }

  // 削除処理
  public function destroy($id)
  {
    Contact::findOrFail($id)->delete();
    return redirect()->route('admin.index')->with('success', '削除しました');
  }
}
