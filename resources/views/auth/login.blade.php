<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Notaire Admin | Connexion</title>
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
      <form action="{{route('auth.connect')}}" method="post">
        @csrf
        <div class="form-group">
          <label for="phone">Téléphone</label>
          <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{old('phone')}}" placeholder="Téléphone" required minlength="8" maxlength="8">
          @error('phone')
          <p class="text-danger text-center">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group mb-5">
          <label for="password">Mot de passe</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Mot de passe" required>
          @error('password')
          <p class="text-danger text-center">{{ $message }}</p>
          @enderror
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Connexion</button>
          </div>
          <!-- /.col -->
        </div>
        <p class="mb-0 mt-3 text-right">
          <a href="/register" class="text-primary">S'inscrire</a>
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
