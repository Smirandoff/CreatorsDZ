<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $request = $this;
        return [
            'old_password' => ['required', 'string' ,'max:255', function($attribute, $value, $fail) use($request){
                if(!Hash::check($value, $request->user->password)){
                    $fail('Votre ancien mot de passe est incorrecte !');
                }
            }],
            'password' => 'required|string|max:255|confirmed',
        ];
    }
}
