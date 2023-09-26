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
        店舗詳細
      </div>
      <div class="block">
        <div class="item">
          <div class="item-title">
            <div>店舗名</div>
          </div>
          <div class="item-content">
            aaa
          </div>
        </div>
        <div class="item">
          <div class="item-title">
            郵便番号
          </div>
          <div class="item-content">
            aaa
          </div>
        </div>
        <div class="item">
          <div class="item-title">
            都道府県
          </div>
          <div class="item-content">
            {{$prefecture->name}}
            </select>
          </div>
        </div>
        <div class="item">
          <div class="item-title">
            市区町村
          </div>
          <div class="item-content">
            aaa </div>
        </div>
        <div class="item">
          <div class="item-title">
            住所
          </div>
          <div class="item-content">
            aaa </div>
        </div>
        <div class="item">
          <div class="item-title">
            求人情報
          </div>
          <div class="item-content">
            aaa
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