<x-recensement-unite.layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/overview.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nav-bar.css') }}">
    @endpush
    <div class="page-title">
        <h2>Vue D'ensemble</h2>
    </div>
    <div class="container">
        <!-- Statistics Cards Section -->
        <div class="header">
            <div class="card total cardstat">
                <div class="stat">
                    <div style="display: flex;justify-content:start;color:#099346">Total</div>
                    <div>enregistrement</div>
                </div>
                <div class="number" style="font-size:3em;color: #333333;font-weight:bold">{{$totalClientsFormatted}}</div>
            </div>
            <!-- <div class="card male">
                <span>Homme</span>
                <h1>{{$menCountFormatted}}</h1>
                <p>{{$menPercentageFormatted}}%</p>
            </div> -->
            <div class="card total cardstat">
                <div class="stat">
                    <div style="display: flex;justify-content:start;color:#099346">Homme</div>
                    <div>{{$menPercentageFormatted}}%</div>
                </div>
                <div class="number" style="font-size:3em;color: #333333;font-weight:bold">{{$menCountFormatted}}</div>
            </div>
            <!-- <div class="card female">
                <span>Femme</span>
                <h1>{{$womenCountFormatted}}</h1>
                <p>{{$womenPercentageFormatted}}%</p>
            </div> -->

            <div class="card total cardstat">
                <div class="stat">
                    <div style="display: flex;justify-content:start;color:#099346">Femme</div>
                    <div>{{$womenPercentageFormatted}}%</div>
                </div>
                <div class="number" style="font-size:3em;color: #333333;font-weight:bold">{{$womenCountFormatted}}</div>
            </div>
        </div>

        <div class="table-section">
            <div class="table-header">
                <h3>Enregistrements</h3>
                @if(Auth::user()->isAdmin())
                <!-- <div class="buttons">
                    <button class="export-btn">Exporter</button>
                    <a class="new-btn" href="{{ route('create.page') }}">Nouvelle</a>
                </div> -->
                <div class="buttons">
                    <a href="{{ route('clients.export') }}" class="export-btn">Exporter</a>
                    <a class="new-btn" href="{{ route('create.page') }}">Nouvelle</a>
                </div>

                @endif
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Nom Complet</th>
                        <th>Sexe</th>
                        <th>Numéro Carte</th>
                        <th>Téléphone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td><span>{{ $user->gender }}</span></td>
                        <td>{{ $user->id_card_number }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            <form action="{{ route('clients.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">
                                    <img src="{{ asset('assets/images/Assets-UNITE/ico-trash.svg') }}" alt="Delete">
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-recensement-unite.layout>
