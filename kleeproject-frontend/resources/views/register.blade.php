<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Üye Ol</title>
</head>
<body>
@extends('layoults.master')
@section('content')
@if(session('RegisterFailed'))
    <div class="alert alert-info">
        {{ session('RegisterFailed') }}
    </div>
@endif
<form action="{{ route('register') }}" method="POST">
  @csrf
  <div class="custom-container">
    <div class="card custom-card">
      <div class="card-body">
        <h2 class="card-title mb-4 text-center">Üye Ol</h2>
          <div class="mb-3">
            <label for="Ad-Soyad" class="form-label">İsim-Soyisim</label>
            <input type="text" class="form-control" id="isim" name="name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="sifre" class="form-label">Şifre</label>
            <input type="password" class="form-control" id="sifre" name="password" required>
          </div>
          <div class="mb-3">
            <label for="sifreTekrar" class="form-label">Şifre Tekrar</label>
            <input type="password" class="form-control" id="sifreTekrar" name="password_confirmation" required>
            @if ($errors)
    <ul>
      @foreach ($errors->all() as $error)
      {{$error}}
      @endforeach
    </ul>
@endif
</div>
<div class="mb-3">
<button type="submit" class="btn btn-primary btn-block">Üye Ol</button>
</div>
      </div>
    </div>
    <div class="login-button">
        <span style="color:white">Eğer hesabınız varsa</span>
        <a href="{{ route('login') }}"class="btn btn-outline-primary">Giriş Yap</a>
    </div>
  </div>
</form>

@endsection

</body>
</html>

