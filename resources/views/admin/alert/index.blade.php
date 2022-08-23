@extends('admin.tmpl.layouts')
@section('css','alert')
@section('pageClassName','alert')
@section('pageTitle','お知らせ管理')
@section('content')
  <div class="head">
    <div class="title">
      お知らせ一覧
    </div>
  </div>

  <div class="content">
    <section class="pages">
      <div class="pages-inner">
        <div class="list-head">
          <div class="link-btn1 regist">
            <a href={{ route('admin/alert/add') }}>新規登録＞</a>
          </div>
        </div>
        <table class="list">
          <tr>
            <th>ID</th>
            <th>件名</th>
            <th>本文</th>
            <th>投稿日</th>
            <th>操作</th>
          </tr>
          @if (empty($alerts))
            @foreach ($alerts as $alert)
            <tr>
              <td style="text-align: center">{{$alert->id}}</td>
              <td>{{$store->title}}</td>
              <td>{{$alert->body}}</td>
              <td style="text-align: center">{{$store->posted_date}}</td>
              <td style="text-align: center">
                <div class="flex" style="text-align: center; gap:10px">
                  <div class="link-btn2 ">
                    <a href={{ route('admin/store/edit',$alert->id) }}>編集＞</a>
                  </div>
                  <div class="link-btn3">
                    <a href={{ route('admin/store/detail',$alert->id) }}>詳細＞</a>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          @else
            <tr>
              <td class="non-alert" colspan="5">
                通知はありません
              </td>
            </tr>
          @endif
        </table>
      </div>
    </section>
  </div>
@endsection

@section('script')
<script>
 
</script>
@endsection