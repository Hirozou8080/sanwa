<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alert_category extends Model
{
  use HasFactory;
  use SoftDeletes;
  protected $table = 'alerts_categories';
}
