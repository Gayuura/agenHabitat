<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="css/app.css" rel="stylesheet" type="text/css">

<style>
    body {
        background-image: url('{{ asset("images/Arriere_plan.png") }}');
        background-size: cover;
        background-position: center;
    }
</style>
    

<a href="{{ url('/') }}"><img src='{{ asset("images/logo.png") }}' alt="Logo Agen Habitat" class="img-logo img-fluid"></a>

<div class="d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col-12 formulaire">
            <h1 class="mb-4 text-center">Connectez-vous</h1>
            <form action="/" method="post" class="section">
              {{ csrf_field() }}
              <div class="mb-3 field">
                <label for="username" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="username" placeholder="Entrez votre nom d'utilisateur">
              </div>
              
              <div class="mb-3 field">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe">
              </div>
              
              <div class="d-grid justify-content-center">
                <button type="submit" class="btn btn-primary btn_connexion">CONNEXION</button>
              </div>
            </form>
        </div>
    </div>
</div>