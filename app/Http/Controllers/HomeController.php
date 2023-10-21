<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CommonController;
use Illuminate\Contracts\View\View;

class HomeController extends CommonController
{
  public function home(): View
  {
    $alerts = $this->getTopAlert();
    return view("home")->with('alerts', $alerts);
  }
}
