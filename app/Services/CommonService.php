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
  /**
   * publicディスク用
   * ファイルの削除
   * @param path = 削除ディレクトリパス
   * @return status : [0 : 成功, 1 : 失敗]
   */
  public function deleteFile($path)
  {
    $status = 1;
    if (Storage::disk('public')->exists($path)) {
      Storage::disk('public')->delete($path);
    }
    // 削除ファイル存在確認
    if (!Storage::disk('public')->exists($path)) {
      $status = 0;
    }
    return $status;
  }
}
