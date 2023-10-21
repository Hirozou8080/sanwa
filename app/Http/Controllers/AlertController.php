<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// common
use App\Http\Controllers\CommonController;
use Illuminate\Contracts\View\View;

class AlertController extends CommonController
{
	/**
	 * 通知表示
	 */
	public function index(): View
	{
		// 全通知取得
		$alerts = $this->getAllAlert(sort: true);
		return view("alert")->with('alerts', $alerts);
	}

	/**
	 * 通知詳細表示
	 * @param alert_id : 通知ID
	 */
	public function detail($alert_id): View
	{
		// 全通知取得
		$alert = $this->getAllAlert(sort: true);
		return view("alert_detail")->with('alert', $alert);
	}
}
