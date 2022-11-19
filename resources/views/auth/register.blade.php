<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RTC | Inscription</title>
@include("includes.head_import")
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="{{asset('assets/dist/img/notaire.jpg')}}" alt="" height="90"> <br>
      <h5>Maitre Lucie   Tiendrebeogo</h5>
    </div>
    <small class="text-center"><em>Entrez vos informations pour vous connecter</em></small>
    <div class="card-body">
      <form action="{{route('auth.register')}}" method="post">
        @csrf
        <div class="form-group">
          <label for="nom">Nom</label>
          <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" id="nom" placeholder="Nom" value="{{old('nom')}}">
          @error('nom')
          <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="prenom">Prénoms</label>
          <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" id="prenom" placeholder="Prénoms" value="{{old('prenom')}}">
          @error('prenom')
          <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="phone">Téléphone</label>
          <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Téléphone" value="{{old('phone')}}">
          @error('phone')
          <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="E-mail" value="{{old('email')}}">
          @error('email')
          <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group mb-5">
          <label for="password">Mot de passe</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Mot de passe" autocomplete="off" value="{{old('')}}">
          @error('password')
          <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Inscription</button>
          </div>
        </div>
        <!-- /.col -->
    <p class="mb-0 mt-3 text-right">
      <a href="/login" class="text-primary">Se connecter</a>
    </p>
      </form>

      <!-- /.social-auth-links -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
@include("includes.script_import")
</body>
</html>
