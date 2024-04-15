<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Üye Ol</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@extends('layoults.master')
@section('content')
@if (session('auth-error'))
    <div id="popup" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>{{ session('auth-error') }}</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#popup').modal('show');
            setTimeout(function(){
                $('#popup').modal('hide');
            }, 3000); 
        });
    </script>
@endif
@if(session('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endif
@if(session('RegisterSuccess'))
    <div class="alert alert-info">
        {{ session('RegisterSuccess') }}
    </div>
@endif
<form method="POST" action="/login">
  @csrf
  
  <div class="custom-c">
    <div class="card custom">
      <div class="card-body">
        <h2 class="card-title mb-4 text-center">Giriş Yap</h2>
        <form>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Şifre</label>
            <input type="password" class="form-control" id="password" name="password" required>
            @if(session()->get('error'))
            <span>{{session()->get('error')}}</span>
            @endif
          </div>
          <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
       <div style="float: right">  Hesabınız yoksa <a href="{{route('register')}}"class="btn btn-primary btn-block">Üye Ol</a></div>
        </form>
      </div>
    </div>
  </div>
</form>

@endsection

</body>
</html>

