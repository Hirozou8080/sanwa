@extends('admin.tmpl.layouts')
@section('css','login')
@section('content')
<main class="main login">
  <div class="wrapper">
    <div class="container">
      <div class="head">
        アカウント登録
        <hr>
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
      
      <div class="content">
        {{ Form::open([ 'url'=>route("register") ,'class'=>'register-form', 'method'=>'post' ]) }}
        <div class="form-item">
          {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => '名前'])}}
        </div>
        <div class="form-item">
          {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'メールアドレス'])}}
        </div>
        <div class="form-item">
          {{ Form::password('password', ['class' => 'form-control','id' => 'password','placeholder' => 'パスワード'])}}
        </div>
        <div class="form-item">
          {{ Form::password('password_confirmation', ['class' => 'form-control','id' => 'password_confirmation','placeholder' => '再度パスワード'])}}
        </div>
        <div class="form-item">
          {{ Form::submit('登録', ['class' => 'btn ']) }}
        </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</main>
@endsection

@section('script')
<script>
 
</script>
@endsection