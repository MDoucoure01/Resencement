<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientsExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return Client::all()->makeHidden(['create_at','update_at']);
        return Client::select('card_number', 'first_name', 'last_name', 'phone', 'id_card_number', 'address', 'department', 'gender')->get();
    }

    public function headings(): array
    {
        return [
            'Numéro Carte ',
            'Prénom',
            'Nom',
            'Téléphone',
            'Numéro Carte Electeur',
            'Adresse',
            'Departement',
            'Genre'
        ];
    }
}
