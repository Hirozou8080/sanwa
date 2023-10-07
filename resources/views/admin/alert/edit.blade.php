@extends('admin.tmpl.layouts')
@section('css', 'alert')
@section('pageClassName', 'alert-edit')
@section('pageTitle', '通知設定')
@section('content')
  <div class="head">
    <div class="title">
      通知編集
    </div>
  </div>
  <div class="content">
    <section class="pages">
      <div class="pages-inner">
        <div class="head">
          通知編集
        </div>
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="form-block">
          {{ Form::open(['url' => route('admin/alert/edit', $alert->id), 'files' => true]) }}
          <div class="form-item">
            <div class="form-title">
              {{ Form::hidden('id', $alert->id) }}
              {{ Form::label('カテゴリー') }}
            </div>
            <div class="flex-items" style="justify-content:flex-start; gap:50px ;  padding:.5rem;font-size:1rem;">
              <div class="form-content">
                <div class=" flex-items">
                  {{ Form::checkbox('category', 1, true, ['id' => 'category_1', 'class' => 'circle']) }}
                  {{ Form::label($for = 'category_1', '重量なお知らせ', ['class' => 'category']) }}
                </div>
              </div>
            </div>
          </div>
          <div class="form-item">
            <div class="form-title">
              {{ Form::label($for = 'title', 'タイトル') }}
            </div>
            <div class="form-content">
              {{ Form::text('title', $alert->title, [
                  'class' => 'form-control',
                  'id' => 'title',
                  'placeholder' => '〇〇について',
              ]) }}
            </div>
          </div>
          <div class="form-item">
            <div class="form-title">
              {{ Form::label($for = 'body', '本文') }}
            </div>
            <div class="form-content">
              {{ Form::textarea('body', $alert->body, [
                  'class' => 'form-control',
                  'id' => 'body',
                  'placeholder' => '本文を入力してください',
                  'rows' => '20',
              ]) }}
            </div>
          </div>
          <div class="form-item">
            <div class="form-title">
              {{ Form::label('タイトル画像') }}
            </div>
            {{ Form::hidden('fileDeleteFlg', false, ['id' => 'fileDeleteFlg']) }}
            <!-- {{--  ファイルが登録されていない場合 --}} -->
            <div class="form-content" style="display:flex;">
              {{ Form::file('image', [
                  'class' => 'custom-file-input',
                  'type' => 'image',
                  'id' => 'fileImage',
                  'style' => 'border:none;',
              ]) }}
              <div style="position: relative;">
                <img id="preview" style="max-width:200px; max-height:300px" />
                <button id="delete" type='button' class="delete" onclick="ImageDelete()">×</button>
              </div>
            </div>
          </div>
          <div class="form-item" style="justify-content:space-between; padding:3rem 1rem">
            <div class="flex-items">
              <button type="button" onclick="location.href=`{{ route('admin/alert') }}`">戻る＞</button>
              {{ Form::submit('登録＞', ['class' => 'register']) }}
            </div>
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </section>
  </div>
@endsection

@section('script')
  <script>
    // 画像表示処理
    $('#fileImage').on('change', function() {
      //fileの値は空チェック
      if ($('#fileImage').val() !== '') {
        //propを使って、file[0]にアクセスする
        var image_ = $('#fileImage').prop('files')[0];
        //添付されたのが本当に画像かどうか、ファイル名と、ファイルタイプを正規表現で検証する
        if (!/\.(jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF)$/.test(image_.name) || !/(jpg|jpeg|png|gif)$/.test(image_.type)) {
          alert('JPG、GIF、PNGファイルの画像を添付してください。');
          //添付された画像ファイルが１M以下か検証
        } else if (1048576 < image_.size) {
          alert('1MB以下の画像を添付してください。');
        } else {
          //window.FileReaderに対応しているブラウザどうか
          if (window.FileReader) {
            //FileReaderをインスタンス化
            var reader_ = new FileReader();
            //添付ファイルの読み込みが成功したときに実行されるイベント（成功時のみ）
            //一旦飛ばしてreader_ .readAsDataURLが先に動く
            reader_.onload = function() {
              //Data URI Schemeをimgタグのsrcにいれてリアルタイムに添付画像を描画する
              $('#preview').attr('src', reader_.result);
            }
            //Data URI Schemeを取得する 
            reader_.readAsDataURL(image_);
          }
          $('#fileDeleteFlg').val(true); // 削除フラグをtrueに設定
          $("#delete").show();
          return false;
        }
      }
      //ダメだったら値をクリアする
      $('#fileImage').val('');
    });

    // 画像削除ボタン押下時
    function ImageDelete() {
      $('#preview').attr('src', '');
      $('#fileImage').val('');
      $('#fileDeleteFlg').val(true); // 削除フラグをtrueに設定
      $("#delete").hide();
      return false;
    }

    // [初期読み込み] 登録済みの画像があれば表示
    $(function() {
      var img = '{{ $alert->file_name }}'
      if ('{{ $alert->file_path }}') {
        $('#preview').attr('src', `{{ url('storage', [$alert->file_path]) }}`);
      } else {
        $("#delete").hide();
      }
      return false;
    });
  </script>
@endsection
