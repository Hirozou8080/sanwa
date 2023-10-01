<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CommonController;

class HomeController extends Controller
{
  private $commonController;
  public function __construct()
  {
    $this->commonController = new CommonController();
  }
  public function home()
  {
    $alerts = $this->commonController->getTopAlert();
    return view("home")->with('alerts', $alerts);
  }
}
