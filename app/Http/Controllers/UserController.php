<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Client;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return DB::transaction(function () {
                $users = Client::orderBy('id', 'desc')->get(); //Client::all();
                $totalClients = $users->count();
                $menCount = $users->where('gender', 'Homme')->count();
                $womenCount = $users->where('gender', 'Femme')->count();
                $totalClientsFormatted = str_pad($totalClients, 2, '0', STR_PAD_LEFT);
                $menCountFormatted = str_pad($menCount, 2, '0', STR_PAD_LEFT);
                $womenCountFormatted = str_pad($womenCount, 2, '0', STR_PAD_LEFT);
                $menPercentage = $totalClients > 0 ? ($menCount / $totalClients) * 100 : 0;
                $womenPercentage = $totalClients > 0 ? ($womenCount / $totalClients) * 100 : 0;
                $menPercentageFormatted = number_format($menPercentage, 2);
                $womenPercentageFormatted = number_format($womenPercentage, 2);

                return view("components.recensement-unite.over-view", compact(
                    'users',
                    'totalClientsFormatted',
                    'menCountFormatted',
                    'womenCountFormatted',
                    'menPercentageFormatted',
                    'womenPercentageFormatted'
                ));
            });
        } catch (\Throwable $th) {
            return back()->withErrors([
                'error' => 'Une erreur est survenue : ' . $th->getMessage(),
            ]);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $phone = preg_replace('/\s+/', '', $request->get('phone'));
            if (!in_array(strlen($phone), [9, 11, 14])) {
                return back()->withErrors([
                    'error' => " Le numéro de téléphone doit comporter 9, 11 ou 14 chiffres.",
                ]);
            }
            $cartId = Client::where("id_card_number", $request->get('id_card_number'))->first();
            if ($cartId) {
                return back()->withErrors([
                    'error' => " Le numéro de la carte existe deja.",
                ]);
            }
            $phone = Client::where("phone", $request->get('phone'))->first();
            if ($phone) {
                return back()->withErrors([
                    'error' => " Le numéro de téléphone existe deja. :" . $request->get("phone"),
                ]);
            }
            if (!in_array($request->get("gender"), ['Homme', 'Femme'])) {
                return back()->withErrors([
                    'error' => " Le genre fournie n'est pas conforme.",
                ]);
            }
            $user = Client::create([
                "first_name" => $request->get('first_name'),
                "last_name" => $request->get("last_name"),
                "gender" => $request->get('gender'),
                "phone" => $request->get('phone'),
                "address" => $request->get('address'),
                "id_card_number" => $request->get('id_card_number'),
                "department" => $request->get('departement') ?? null,
            ]);
            return back()->with([
                'success' => "insertion reussi"
            ]);
        } catch (\Throwable $th) {
            return back()->withErrors([
                'error' => 'Une erreur est survenue : ',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        try {
            return DB::transaction(function () use ($client) {
                $client->delete();
                return back()->with([
                    'success' => "Le client a été supprimé avec succès."
                ]);
            });
        } catch (\Throwable $th) {
            return back()->withErrors([
                'error' => "Une erreur est survenue lors de la suppression : " . $th->getMessage(),
            ]);
        }
    }


    public function createView()
    {

        if (Auth::user()->role == 'admin') {
            return view("components.recensement-unite.create");
        }
        return back()->withErrors([
            'error' => 'Page no found',
        ]);
    }
}
