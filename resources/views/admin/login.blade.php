@extends('admin.tmpl.layouts')

@section('content')
<main class="main login">
  <div class="wrapper">
    <div class="container">
      <div class="head">
        ログイン
      </div>
      {{ Form::open([ 'url'=>route("login") ,'class'=>'login-form', 'method'=>'post' ]) }}
      {{Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'メールアドレス'])}}
      {{Form::password('password', ['class' => 'form-control','id' => 'password','placeholder' => 'パスワード'])}}
      {{ Form::submit('送信', ['class' => 'btn btn-primary']) }}
      {{ Form::close() }}
    </div>
  </div>
</main>
@endsection

@section('script')
<script>
 
</script>
@endsection