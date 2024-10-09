<x-recensement-unite.layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/overview2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nav-bar.css') }}">
    @endpush
    <div class="page-title">
        {{-- <h2>Vue Utilisateur</h2> --}}
    </div>
    <div class="container">

        <div class="table-section ">
            <div class="table-header">
                <h3>0{{ $totalClients }} Utilisateurs</h3>
                <form class="form">
                    <label for="search">
                        <input required="" autocomplete="off" placeholder="Search" id="search" type="text">
                        <div class="icon">
                            <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="swap-on">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linejoin="round" stroke-linecap="round"></path>
                            </svg>
                            <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="swap-off">
                                <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linejoin="round" stroke-linecap="round"></path>
                            </svg>
                        </div>
                    </label>
                </form>
                @if(Auth::user()->isAdmin())
                <div class="buttons">
                    <!-- <a href="{{ route('clients.export') }}" class="export-btn">Exporter</a> -->
                    <a class="new-btn" href="{{ route('addUser.page') }}">Nouvelle</a>
                </div>
                @endif
            </div>
            <div class="table-container" style="height: 90%;">

                <table>
                    <thead>
                        <tr>
                            <th>Nom Complet</th>
                            <th>Sexe</th>
                            <th>Numéro Carte</th>
                            <th>Téléphone</th>
                            <th>Role</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr style="cursor: pointer;">
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            @if($user->gender == "Homme")
                            <td><span class="" style="background-color:rgba(240, 241, 254, 1);padding:4px;border-radius:3px;">{{ $user->gender }}</span></td>
                            @endif
                            @if($user->gender == "Femme")
                            <td><span class="" style="background-color:rgba(254, 240, 253, 1);padding:4px;border-radius:3px;">{{ $user->gender }}</span></td>
                            @endif
                            <td>{{ $user->id_card_number }}</td>
                            <td>{{ $user->phone }}</td>

                            <td hidden> {{ $user->address }}</td>
                            <td><span class="" style="background-color:#0b944649;padding:4px;border-radius:3px;">{{ $user->role }}</span></td>
                            <td style="display: flex;">
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce utlisateur ?');">
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

        <div id="userModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 id="modalUserName"></h2>
                <span id="modalUserGender"></span>
                <p><strong>Numéro Carte:</strong> <span id="modalUserIdCard"></span></p>
                <p><strong>Téléphone:</strong> <span id="modalUserPhone"></span></p>
                <p><strong>Adresse:</strong> <span id="modalUserAddress"></span></p>
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
            const modalUserAddress = document.getElementById('modalUserAddress');

            function showModal(user) {
                modalUserName.textContent = user.name;
                modalUserGender.textContent = user.gender;
                modalUserIdCard.textContent = user.idCard;
                modalUserPhone.textContent = user.phone;
                modalUserAddress.textContent = user.address;

                if (user.gender === 'Homme') {
                    modalUserGender.textContent = user.gender;
                    modalUserGender.style.backgroundColor = 'rgba(240, 241, 254, 1)';
                    modalUserGender.style.padding = '4px';
                    modalUserGender.style.borderRadius = '3px';
                } else if (user.gender === 'Femme') {
                    modalUserGender.textContent = user.gender;
                    modalUserGender.style.backgroundColor = 'rgba(254, 240, 253, 1)';
                    modalUserGender.style.padding = '4px';
                    modalUserGender.style.borderRadius = '3px';
                }
                modal.style.display = 'block';
            }

            rows.forEach(row => {
                row.addEventListener('click', function() {
                    const userName = row.querySelector('td:nth-child(1)').textContent;
                    const userGender = row.querySelector('td:nth-child(2)').textContent;
                    const userIdCard = row.querySelector('td:nth-child(3)').textContent;
                    const userPhone = row.querySelector('td:nth-child(4)').textContent;
                    const userAddress = row.querySelector('td:nth-child(5)').textContent;

                    const user = {
                        name: userName,
                        gender: userGender,
                        idCard: userIdCard,
                        phone: userPhone,
                        address: userAddress,
                    };

                    showModal(user);
                });

                const deleteBtn = row.querySelector('.delete-btn');
                const editBtn = row.querySelector('.edit-btn');

                if (deleteBtn) {
                    deleteBtn.addEventListener('click', function(event) {
                        event.stopPropagation();
                    });
                }
                if (editBtn) {
                    editBtn.addEventListener('click', function(event) {
                        event.stopPropagation();
                    });
                }
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


        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            const rows = document.querySelectorAll('table tbody tr');

            searchInput.addEventListener('keyup', function() {
                const searchValue = searchInput.value.toLowerCase();

                rows.forEach(row => {
                    const fullName = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
                    const idCard = row.querySelector('td:nth-child(3)').textContent.toLowerCase();

                    if (fullName.includes(searchValue) || idCard.includes(searchValue)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
    @endpush


</x-recensement-unite.layout>
