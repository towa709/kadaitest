<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  use HasFactory;

  // 操作を許可するカラム
  protected $fillable = [
    'category_id',
    'first_name',
    'last_name',
    'gender',
    'email',
    'tel',
    'address',
    'building',
    'category_id',
    'detail',
  ];

  // カテゴリーとのリレーション（もし設定するなら）
  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}
