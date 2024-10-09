@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/create.css') }}">
@endpush

<div class="content">
    <div class="logo">
        <a href="{{ route('index.page') }}">
            <img src="{{ asset('assets/images/Assets-UNITE/logo.png') }}" alt="Logo">
        </a>
        <span class="logo-text">UNITÉ</span>
    </div>


    <details class="dropdown user-name">
        <!-- <summary role="button">
            <a class="button">Admin</a>
        </summary> -->

        <summary role="button">
            <a class="button">{{ Auth::user()->last_name }}</a>
        </summary>

        <ul>
            <li>
                <!-- User Info Section -->
                <div class="user-info">
                    <img src="{{ asset('assets/images/Assets-UNITE/ico-user.svg') }}" alt="User Image" class="user-img">
                    <div class="user-details">
                        <strong>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</strong>
                        <span>{{ Auth::user()->email }}</span>
                    </div>
                </div>
            </li>
            <hr>
            <li>
                <a href="{{ route('index.page') }}">
                    <span class="icon"><img src="{{ asset('assets/images/Assets-UNITE/icons8-accueil.svg') }}" alt="User Image" class="user-img"></span>
                    Vue d'Ensemble
                </a>
            </li>
            @if(Auth::user()->isSupervisor())
            <li>
                <a href="{{ route('userList.page') }}">
                    <span class="icon"><img src="{{ asset('assets/images/Assets-UNITE/ico-user.svg') }}" alt="Delete"></span>
                    Gestion User
                </a>
            </li>
            @endif
            <li>
                <a href="#" id="user-logout">
                    <span class="icon"><img src="{{ asset('assets/images/Assets-UNITE/ico-logout.svg') }}" alt="Delete"></span> <!-- Unicode for refresh/logout icon -->
                    Deconnexion
                </a>
            </li>
        </ul>
    </details>

    <!-- Hidden Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

@push('scripts')
<script>
    document.getElementById('user-logout').addEventListener('click', function() {
        document.getElementById('logout-form').submit();
    });
</script>
@endpush
