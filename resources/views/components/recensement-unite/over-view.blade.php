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

        <div id="userModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Détails de l'utilisateur</h2>
                <p><strong>Nom Complet:</strong> <span id="modalUserName"></span></p>
                <p><strong>Sexe:</strong> <span id="modalUserGender"></span></p>
                <p><strong>Numéro Carte:</strong> <span id="modalUserIdCard"></span></p>
                <p><strong>Téléphone:</strong> <span id="modalUserPhone"></span></p>
            </div>
        </div>


    </div>


    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('table tbody tr');

            const modal = document.getElementById('userModal');
            const closeModal = document.querySelector('.modal .close');
            const modalUserName = document.getElementById('modalUserName');
            const modalUserGender = document.getElementById('modalUserGender');
            const modalUserIdCard = document.getElementById('modalUserIdCard');
            const modalUserPhone = document.getElementById('modalUserPhone');

            function showModal(user) {
                modalUserName.textContent = user.name;
                modalUserGender.textContent = user.gender;
                modalUserIdCard.textContent = user.idCard;
                modalUserPhone.textContent = user.phone;

                modal.style.display = 'block';
            }

            rows.forEach(row => {
                row.addEventListener('click', function() {
                    const userName = row.querySelector('td:nth-child(1)').textContent;
                    const userGender = row.querySelector('td:nth-child(2)').textContent;
                    const userIdCard = row.querySelector('td:nth-child(3)').textContent;
                    const userPhone = row.querySelector('td:nth-child(4)').textContent;

                    const user = {
                        name: userName,
                        gender: userGender,
                        idCard: userIdCard,
                        phone: userPhone
                    };

                    showModal(user);
                });
            });

            closeModal.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            window.addEventListener('click', function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>
    @endpush


</x-recensement-unite.layout>
