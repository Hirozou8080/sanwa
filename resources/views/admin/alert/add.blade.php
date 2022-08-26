@extends('admin.tmpl.layouts')
@section('css', 'alert')
@section('pageClassName', 'alert-add')
@section('pageTitle', '通知設定')
@section('content')
  <div class="head">
    <div class="title">
      通知登録
    </div>
  </div>

  <div class="content">
    <section class="pages">
      <div class="pages-inner">
        <div class="head">
          新しい通知を登録
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
          {{Form::open(['url' => route('admin/alert/add') , 'files' => true])}}
            <div class="form-item">
              <div class="form-title">
                {{Form::label($for="title",'件名')}}
              </div>
              <div class="form-content">
                {{Form::text('title', null, ['class' => 'form-control', 'id' => 'storeName', 'placeholder' => 'マリンピア店'])}}
              </div>
            </div>
            <div class="form-item" style="justify-content:space-between; padding:3rem 1rem">
              <div class="flex-items">
                <button type="button" onclick="location.href='{{ route('admin/alert')}}' ">戻る＞</button>
                {{ Form::submit('登録＞', ['class'=>'register']) }}
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
