<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:Homme,Femme',
            'phone' => 'required|string|unique:users,phone', // Remplacez 'users' par le nom de votre table si différent
            'address' => 'required|string|max:255',
            'id_card_number' => 'required|string|unique:users,id_card_number', // Remplacez 'users' par le nom de votre table si différent
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Le prénom est requis.',
            'last_name.required' => 'Le nom de famille est requis.',
            'gender.required' => 'Le genre est requis.',
            'gender.in' => 'Le genre doit être Homme ou Femme.',
            'phone.required' => 'Le numéro de téléphone est requis.',
            'phone.unique' => 'Ce numéro de téléphone est déjà utilisé.',
            'address.required' => 'L\'adresse est requise.',
            'id_card_number.required' => 'Le numéro de carte d\'identité est requis.',
            'id_card_number.unique' => 'Ce numéro de carte d\'identité est déjà utilisé.',
        ];
    }
}
