<x-recensement-unite.layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/create2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nav-bar.css') }}">
    @endpush
    <div style="margin-top: 60px;">
        <div class="entete">
            <div class="back-link">
                <a href="{{ route('index.page') }}"><span class="iconReturn">&#8592;</span> Retour à l'accueil</a>
            </div>
            <div>Nouveau enregistrement</div>
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
            <form method="POST" action="{{route('user.create')}}">
                @csrf
                <div class="form-group">
                    <!-- <div style="flex: 1; margin-right: 10px;">
                        <label for="last_name">Nom</label>
                        <input type="text" id="last_name" name="last_name" placeholder="@exemple">
                    </div> -->
                    <div class="input-group" style="flex: 1; margin-right: 10px;">
                        <label class="label">Nom</label>
                        <input autocomplete="off" name="last_name" id="last_name" class="input" type="text" placeholder="Ndiaye" required>
                        <div></div>
                    </div>
                    <!-- <div style="flex: 1; margin-left: 10px;">
                        <label for="first_name">Prénom</label>
                        <input type="text" id="first_name" name="first_name" placeholder="Fallou">
                    </div> -->
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
                    <!-- <div style="flex: 1; margin-left: 10px;">
                        <label for="phone">Téléphone</label>
                        <input type="tel" id="phone" name="phone" placeholder="">
                    </div> -->
                    <div class="input-group" style="flex: 1; margin-left: 10px;">
                        <label class="label">Téléphone</label>
                        <input autocomplete="off" name="phone" id="phone" class="input" type="tel" placeholder="775441234" required>
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
                        <input autocomplete="off" name="address" id="address" class="input" type="text" placeholder="Dakar, Guediawaye" required>
                        <div></div>
                    </div>
                    <!-- <div style="flex: 1; margin-left: 10px;">
                        <label for="id_card_number">Numéro de la carte</label>
                        <input type="text" id="id_card_number" name="id_card_number" placeholder="XDF654648516">
                    </div> -->
                    <div class="input-group" style="flex: 1; margin-left: 10px;">
                        <label for="address" class="label">Numéro Carte d'identité</label>
                        <input autocomplete="off" name="id_card_number" id="id_card_number" class="input" type="text" placeholder="XDF654648516" required>
                        <div></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group" style="flex: 1; margin-left: 6px;">
                        <label for="address" class="label">Departement</label>
                        <!-- <input autocomplete="off" name="address" id="address" class="input" type="text" placeholder="Dakar, Guediawaye">
                        <div></div> -->
                        <input list="languages" id="language_id" class="input-datalist" name="departement" required>
                        <datalist id="languages">
                            <option value="Nioro du Rip">Nioro du Rip</option>
                            <option value="Tivaouane">Tivaouane</option>
                            <option value="Ziguinchor">Ziguinchor</option>
                            <option value="Kolda">Kolda</option>
                            <option value="Vélingara">Vélingara</option>
                            <option value="Tambacounda">Tambacounda</option>
                            <option value="Thiès">Thiès</option>
                            <option value="Oussouye">Oussouye</option>
                            <option value="Pikine">Pikine</option>
                            <option value="Podor">Podor</option>
                            <option value="Ranérou-Ferlo">Ranérou-Ferlo</option>
                            <option value="Saint-Louis">Saint-Louis</option>
                            <option value="Salémata">Salémata</option>
                            <option value="Rufisque">Rufisque</option>
                            <option value="Saraya">Saraya</option>
                            <option value="Sédhiou">Sédhiou</option>
                            <option value="Kolda">Kolda</option>
                            <option value="Koumpentoum">Koumpentoum</option>
                            <option value="Koungheul">Koungheul</option>
                            <option value="Linguère">Linguère</option>
                            <option value="Louga">Louga</option>
                            <option value="Malem Hodar">Malem Hodar</option>
                            <option value="Matam">Matam</option>
                            <option value="Mbour">Mbour</option>
                            <option value="Médina Yoro Foulah">Médina Yoro Foulah</option>
                            <option value="Gossas">Gossas</option>
                            <option value="Goudiry">Goudiry</option>
                            <option value="Goudoump">Goudoump</option>
                            <option value="Guédiawaye">Guédiawaye</option>
                            <option value="Guinguino">Guinguino</option>
                            <option value="Kaffrine">Kaffrine</option>
                            <option value="Kanel">Kanel</option>
                            <option value="Kaolack">Kaolack</option>
                            <option value="Kébémer">Kébémer</option>
                            <option value="Kédougou">Kédougou</option>
                            <option value="Bakel">Bakel</option>
                            <option value="Bambey">Bambey</option>
                            <option value="Bignona">Bignona</option>
                            <option value="Birkelane">Birkelane</option>
                            <option value="Bounkiling">Bounkiling</option>
                            <option value="Dagana">Dagana</option>
                            <option value="Dakar">Dakar</option>
                            <option value="Diourbel">Diourbel</option>
                            <option value="Fatick">Fatick</option>
                            <option value="Foundiougne">Foundiougne</option>
                            <option value="Other">Other</option>
                        </datalist>
                    </div>
                    <div class="input-group" style="flex: 1; margin-left: 10px;">
                        <label for="card_number" class="label">Numéro carte</label>
                        <input autocomplete="off" name="card_number" id="card_number" class="input" type="text" placeholder="OO1" required>
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
