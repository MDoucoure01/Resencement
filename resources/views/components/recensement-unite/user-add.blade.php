<x-recensement-unite.layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/create2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nav-bar.css') }}">
    @endpush
    <div>
        <div class="entete">
            <div class="back-link">
                <a href="{{ route('userList.page') }}"><span class="iconReturn">&#8592;</span> Retour à l'accueil</a>
            </div>
            <div>Nouveau Utilisateur</div>
        </div>
        <div class="container">
            @if ($errors->any())
            <div style="display: flex;color:red;width:auto" id="error-message">
                @foreach ($errors->all() as $error)
                <div style="display: flex;justify-content:center;align-items:center;" class="">
                    {{ $error }}
                </div>
                @endforeach
            </div>
            @endif
            <form method="POST" action="{{route('userAdd.page')}}">
                @csrf
                <div class="form-group">
                    <div class="input-group" style="flex: 1; margin-right: 10px;">
                        <label class="label">Nom</label>
                        <input autocomplete="off" name="last_name" id="last_name" class="input" type="text" placeholder="Ndiaye" required>
                        <div></div>
                    </div>
                    <div class="input-group" style="flex: 1; margin-left: 10px;">
                        <label class="label">Prénom</label>
                        <input autocomplete="off" name="first_name" id="first_name" class="input" type="text" placeholder="Fallou" required>
                        <div></div>
                    </div>
                </div>

                <div class="form-group">
                    <div style="flex: 1; margin-right: 8px;">
                        <label for="gender" class="label">Sexe</label>
                        <select id="gender" name="gender">
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
                    </div>
                    <div class="input-group" style="flex: 1; margin-left: 10px;">
                        <label class="label">Téléphone</label>
                        <input autocomplete="off" name="phone" id="phone" class="input" type="tel" placeholder="775441234" required>
                        <div></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group" style="flex: 1; margin-left: 6px;">
                        <label for="address" class="label">Adresse</label>
                        <input autocomplete="off" name="address" id="address" class="input" type="text" placeholder="Dakar, Guediawaye" required>
                        <div></div>
                    </div>
                    <div class="input-group" style="flex: 1; margin-left: 10px;">
                        <label for="address" class="label">Numéro de la carte</label>
                        <input autocomplete="off" name="id_card_number" id="id_card_number" class="input" type="text" placeholder="XDF654648516" required>
                        <div></div>
                    </div>
                </div>

                <div class="form-group">
                    <div style="flex: 1; margin-right: 8px;">
                        <label for="role" class="label">Role</label>
                        <select id="role" name="role">
                            <option value="admin">admin</option>
                            <option value="supervisor">supervisor</option>
                        </select>
                    </div>
                    <div class="input-group" style="flex: 1; margin-left: 10px;">
                        <label class="label">Email</label>
                        <input autocomplete="off" name="email" id="email" class="input" type="tel" placeholder="example@example.com" required>
                        <div></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group" style="flex: 1; margin-left: 6px;">
                        <label for="password" class="label">Password</label>
                        <input autocomplete="off" name="password" id="password" class="input" type="password" placeholder="" required>
                        <div></div>
                    </div>
                    <div class="input-group" style="flex: 1; margin-left: 10px;">
                        <label for="password_confirmation" class="label">Confirmation Password</label>
                        <input autocomplete="off" name="password_confirmation" id="password_confirmation" class="input" type="password" placeholder="" required>
                        <div></div>
                    </div>
                </div>


                <div class="submit-container">
                    <div class="valideText">valider & enregistrer un nouveau</div>
                    <button type="submit">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</x-recensement-unite.layout>
