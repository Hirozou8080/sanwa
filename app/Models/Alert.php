<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alert extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = [
    'category_id',
    'title',
    'body',
    'file_name',
    'file_path',
    'posted_date',
  ];

  /**
   * 全通知取得
   */
  public static function getAllAlert()
  {
    return Alert::all();
  }
  /**
   * IDから通知取得
   */
  public static function getAlertId($id)
  {
    return Alert::where('id', $id)->with('category')->first();
  }

  public function category()
  {
    return $this->belongsTo(Alert_category::class, 'category_id', 'id');
  }
}
