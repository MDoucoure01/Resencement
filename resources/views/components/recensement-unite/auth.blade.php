<x-recensement-unite.layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    @endpush


    <div class="container ">
        <div class="login-page">
            <img src="{{ asset('assets/images/Assets-UNITE/logo.png') }}" alt="Logo">
        </div>
        <div class="login-container">
            <div class="bandeBlue"></div>
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
                <!-- <input type="email" name="email" placeholder="email" required> -->
                <div class="input-group" style="flex: 1; margin-right: 10px;margin-bottom:10px">
                    <label class="label" style="display: flex;justify-content:start">Email</label>
                    <input name="email" class="input" type="email" placeholder="email">
                    <div></div>
                </div>
                <!-- <input type="password" name="password" placeholder="Mot de passe" required> -->
                <div class="input-group" style="flex: 1; margin-right: 10px;">
                    <label class="label" style="display: flex;justify-content:start">Password</label>
                    <input type="password" name="password" placeholder="Mot de passe" required class="input">
                    <div></div>
                </div>
                <button type="submit" style="margin-top: 30px;">Se connecter</button>
            </form>
        </div>
    </div>
</x-recensement-unite.layout>
