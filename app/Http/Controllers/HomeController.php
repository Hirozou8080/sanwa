<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CommonController;

class HomeController extends CommonController
{
  public function home()
  {
    $alerts = $this->getTopAlert();
    return view("home")->with('alerts', $alerts);
  }
}
