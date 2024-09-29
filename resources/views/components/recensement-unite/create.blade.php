<x-recensement-unite.layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/create.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nav-bar.css') }}">
    @endpush
    <div>
        <div class="entete">
            <div class="back-link">
                <a href="{{ route('index.page') }}"><span class="iconReturn">&#8592;</span> Retour à l'accueil</a>
            </div>
            <div>Nouveau enregistrement</div>
        </div>
        <div class="container">
            <form method="POST" action="{{route('user.create')}}">
                @csrf
                <div class="form-group">
                    <!-- <div style="flex: 1; margin-right: 10px;">
                        <label for="last_name">Nom</label>
                        <input type="text" id="last_name" name="last_name" placeholder="@exemple">
                    </div> -->
                    <div class="input-group" style="flex: 1; margin-right: 10px;">
                        <label class="label">Nom</label>
                        <input autocomplete="off" name="last_name" id="last_name" class="input" type="text" placeholder="Ndiaye">
                        <div></div>
                    </div>
                    <!-- <div style="flex: 1; margin-left: 10px;">
                        <label for="first_name">Prénom</label>
                        <input type="text" id="first_name" name="first_name" placeholder="Fallou">
                    </div> -->
                    <div class="input-group" style="flex: 1; margin-left: 10px;">
                        <label class="label">Prénom</label>
                        <input autocomplete="off" name="first_name" id="first_name" class="input" type="text" placeholder="Fallou">
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
                    <!-- <div style="flex: 1; margin-left: 10px;">
                        <label for="phone">Téléphone</label>
                        <input type="tel" id="phone" name="phone" placeholder="">
                    </div> -->
                    <div class="input-group" style="flex: 1; margin-left: 10px;">
                        <label class="label">Téléphone</label>
                        <input autocomplete="off" name="phone" id="phone" class="input" type="tel" placeholder="775441234">
                        <div></div>
                    </div>
                </div>

                <div class="form-group">
                    <!-- <div style="flex: 1; margin-right: 10px;">
                        <label for="address">Adresse</label>
                        <input type="text" id="address" name="address" placeholder="@exemple">
                    </div> -->
                    <div class="input-group" style="flex: 1; margin-left: 6px;">
                        <label for="address" class="label">Adresse</label>
                        <input autocomplete="off" name="address" id="address" class="input" type="text" placeholder="Dakar, Guediawaye">
                        <div></div>
                    </div>
                    <!-- <div style="flex: 1; margin-left: 10px;">
                        <label for="id_card_number">Numéro de la carte</label>
                        <input type="text" id="id_card_number" name="id_card_number" placeholder="XDF654648516">
                    </div> -->
                    <div class="input-group" style="flex: 1; margin-left: 10px;">
                        <label for="address" class="label">Numéro de la carte</label>
                        <input autocomplete="off" name="id_card_number" id="id_card_number" class="input" type="text" placeholder="XDF654648516">
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
