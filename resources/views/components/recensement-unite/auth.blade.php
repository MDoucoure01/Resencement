<x-recensement-unite.layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    @endpush

    
    <div class="container ">
        <div class="login-page">
            <img src="{{ asset('assets/images/Assets-UNITE/logo.png') }}" alt="Logo">
        </div>
        <div class="login-container">
            <h2>Connexion</h2>
            @if ($errors->any())
                <div class="badge" id="error-message">
                    @foreach ($errors->all() as $error)
                    <button class="badge-red">
                        {{ $error }}
                    </button>
                    @endforeach
                </div>
            @endif
            <form action="{{route('connect.page')}}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="email" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <button type="submit">Se connecter</button>
            </form>
        </div>
    </div>
</x-recensement-unite.layout>
