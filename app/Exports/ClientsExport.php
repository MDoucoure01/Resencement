<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClientsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return Client::all()->makeHidden(['create_at','update_at']);
        return Client::select('first_name', 'last_name', 'phone', 'id_card_number')->get();
    }

    public function headings(): array
    {
        return [
            'Nom',
            'Prénom',
            'Téléphone',
            'Numéro Carte', 
        ];
    }
}
