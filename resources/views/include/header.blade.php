<header class="container-fluid">
  <div class="row">
    <div class="col-6">
      <a href="{{ url('/calender') }}"><img src="{{ asset('images/Logo.png') }}" class="img-logo img-fluid" alt="Logo d'Agen Habitat"></a>
    </div>
    <div class="col-6">
      <div class="d-flex flex-column align-items-end">
        @auth
        <span class="username">{{ Auth::user()->name }}</span>
        <form action=" {{route('logout')}}" method="post">
          @csrf
          <button type="submit" class="btn_deconnexion">Déconnexion</button>
        </form>
        @endauth       
      </div>
    </div>
  </div>
</header>