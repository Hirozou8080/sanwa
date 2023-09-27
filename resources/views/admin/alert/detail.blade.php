@extends('admin.tmpl.layouts')
@section('css', 'alert')
@section('pageClassName', 'alert-detail')
@section('pageTitle', '通知設定')
@section('content')
<div class="head">
  <div class="title">
    通知詳細
  </div>
</div>
<div class="content">
  <section class="pages">
    <div class="pages-inner">
      <div class="head">
        通知詳細
      </div>
      <div class="block">
        <div class="item">
          <div class="item-title">
            <div>カテゴリ</div>
          </div>
          <div class="item-content">
            {{ $alert?->category?->name }}
          </div>
        </div>
        <div class="item">
          <div class="item-title">
            <div>タイトル</div>
          </div>
          <div class="item-content">
            {{ $alert->title }}
          </div>
        </div>
        <div class="item">
          <div class="item-title">
            通知内容
          </div>
          <div class="item-content">
            {{ $alert->body }}
          </div>
        </div>
        <div class="item">
          <div class="item-title">
            投稿日
          </div>
          <div class="item-content">
            {{ $alert->posted_date }}
          </div>
        </div>
        <div class="item">
          <div class="item-title">
            通知画像
          </div>
          <div class="item-content">
            <img src="{{url('storage', [$alert->file_path])}}" alt="{{$alert->file_name}}"
              style="max-width:200px; max-height:300px">
          </div>
        </div>
        <!-- {{Form::open(['url' => route('admin/alert/delete',$alert->id), 'method'=>'post'])}} -->
        {{Form::open(['url' => route('admin/alert/delete',1), 'method'=>'post'])}}
        <div class="item" style="justify-content:center; padding:3rem 1rem">
          <div class="flex-items">
            <button type="button" onclick="location.href=`{{ route('admin/alert')}}`">戻る＞</button>
            {{ Form::submit('削除＞', ['class'=>'delete']) }}
          </div>
        </div>
        {{Form::close()}}
      </div>
    </div>
  </section>
</div>
@endsection

@section('script')
<script></script>
@endsection