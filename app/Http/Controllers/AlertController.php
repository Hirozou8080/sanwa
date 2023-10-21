<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// common
use App\Http\Controllers\CommonController;

class AlertController extends CommonController
{
	/**
	 * 通知表示
	 */
	public function index()
	{
		// 全通知取得
		$alerts = $this->getAllAlert();

		return view("alert")->with('alerts', $alerts);
	}
}
