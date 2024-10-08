<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminSupervisorRequest extends FormRequest
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
            'phone' => 'required|string|unique:users,phone|max:15',
            'address' => 'required|string|max:255',
            'id_card_number' => 'required|string|unique:users,id_card_number|max:20',
            'role' => 'required|in:admin,supervisor',
            'email' => 'nullable|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Le prénom est requis.',
            'last_name.required' => 'Le nom de famille est requis.',
            'gender.required' => 'Le genre est requis.',
            'phone.required' => 'Le numéro de téléphone est requis.',
            'address.required' => 'L\'adresse est requise.',
            'id_card_number.required' => 'Le numéro de carte d\'identité est requis.',
            'role.required' => 'Le rôle est requis.',
            'email.email' => 'L\'adresse email doit être valide.',
            'password.required' => 'Le mot de passe est requis.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ];
    }
}
