<header class="container-fluid en_tete">
  <div class="row">
    <div class="col-6">
      <a href="{{ url('/') }}"><img src="{{ asset('images/Logo.png') }}" class="img-logo img-fluid" alt="Logo d'Agen Habitat"></a>
    </div>
    <div class="col-6">
      <div class="d-flex flex-column align-items-end">

        @auth
        <span class="username texte_blanc text-center">{{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn_deconnexion">Déconnexion</button>
        </form>

        @endauth       
      </div>
    </div>
  </div>
</header>