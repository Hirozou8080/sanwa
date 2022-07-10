@extends('admin.tmpl.layouts')
@section('css','login')
@section('content')
<main class="main login">
  <div class="container">
    <div class="head">
      ログイン
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
      {{ Form::open([ 'url'=>route("login") ,'class'=>'login-form', 'method'=>'post' ]) }}
      <div class="form-item">
        {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'メールアドレス'])}}
      </div>
      <div class="form-item">
        {{ Form::password('password', ['class' => 'form-control','id' => 'password','placeholder' => 'パスワード'])}}
      </div>
      <div class="form-item">
        {{ Form::submit('ログイン', ['class' => 'btn btn-primary']) }}
      </div>
      {{ Form::close() }}
    </div>
  </div>
</main>
@endsection

@section('script')
<script>
 
</script>
@endsection