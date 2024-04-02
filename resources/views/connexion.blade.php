<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="css/app.css" rel="stylesheet" type="text/css">

<style>
    body {
        background-image: url('{{ asset("images/Arriere_plan.png") }}');
        background-size: cover;
        background-position: center;
    }
</style>
    

<a href="{{ url('/') }}">
  <img src='{{ asset("images/logo.png") }}' alt="Logo Agen Habitat" class="img-logo img-fluid">
</a>

<div class="d-flex justify-content-center align-items-center">
    <div class="row">
      @guest
        <div class="col-12 formulaire">
          <h1 class="mb-4 text-center">Connectez-vous</h1>
          <form action="{{ route('login') }}" method="post" class="section">
            @csrf
            
            <div class="mb-3 field">
              <label for="username" class="form-label">Email d'utilisateur</label>
              <input name="email" type="text" class="form-control" id="username" placeholder="Entrez votre nom d'utilisateur"  value="{{ old('email') }}" required>
            </div>
            <div id="emailHelp" class="form-text ">
              @error('email')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
            
            <div class="mb-3 field">
              <label for="password" class="form-label">Mot de passe</label>
              <input name="password" type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe"  value="{{ old('password') }}" required>
            </div>
            <div id="passwordHelp" class="form-text ">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="d-grid justify-content-center">
              <button type="submit" class="btn btn-primary btn_connexion">CONNEXION</button>
            </div>
          </form>
      </div>
    @endguest
    </div>
</div>