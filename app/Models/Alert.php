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
	 * @param boolean $sort : [true:投稿昇順, false:投稿日降順]
	 */
	public static function getAllAlert($sort = false)
	{
		$query = Alert::query();
		if ($sort) {
			$query->orderBy('posted_date', 'desc');
		}
		return $query->with('category')
			->get()
			->toArray();
	}

	/**
	 * Topページ用の通知取得 (３件)
	 */
	public static function getTopAlert()
	{
		return Alert::orderBy('posted_date', 'desc')
			->limit(3)
			->get()
			->toArray();
	}
	/**
	 * IDから通知取得
	 */
	public static function getAlertId($id)
	{
		$alert = Alert::where('id', $id)->with('category')->first();
		return json_decode(json_encode($alert), true);
	}

	public function category()
	{
		return $this->hasMany(Alert_category::class, 'id', 'category_id');
	}
}
