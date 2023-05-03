<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class CommonService
{
  /**
   * publicディスク用
   * ファイルの保存
   * @param file = 保存ファイル
   * @param path = ディレクトリパス
   */
  public function saveFile($file, $path)
  {
    $upload_file_name = Storage::disk('public')->putFile($path, $file);
    return $upload_file_name;
  }
}
