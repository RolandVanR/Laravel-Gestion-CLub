
<nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
    <div class="container-fluid">

        <a class="navbar-brand" href="/">
            <img src="{{asset('img/logo_vaa2.svg')}}" alt="" width="50px" height="50px">
            Gestion club Va'a OMEGA
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 active bi bi-house-door-fill" aria-current="page" href="/">
                        Accueil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="/apropos">A propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="/contact">Contact</a>
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link mx-2 dropdown-toggle bi bi-person-lines-fill" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Membres
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @auth

{{--                            <li><a class="dropdown-item  bi bi-person-fill" href="{{ route('users.edit', \Illuminate\Support\Facades\Auth::user()) }}">Profil</a></li>--}}
                            <li><a class="dropdown-item  bi bi-person-fill" href="{{ route('profile.edit') }}">Profil</a></li>

                            @if(Auth::user()->admin)
{{--                                <form action="{{ route('dashboard') }}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    <button type="submit" class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</button>--}}
{{--                                </form>--}}
                                <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                            @endif

                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item" href="{{ route('logout') }}">Logout</button>
                            </form>

                        @else
                            <li><a class="dropdown-item" href="{{ route('register') }}">Inscription</a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">Connexion</a></li>
                        @endauth
                    </ul>

                </li>

            </ul>
        </div>
    </div>
</nav>
