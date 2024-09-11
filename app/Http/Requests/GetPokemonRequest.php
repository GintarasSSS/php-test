<?php

namespace App\Http\Requests;

use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class GetPokemonRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }

    public function all($keys = null)
    {
        return array_merge(
            parent::all(),
            [
                'name' => Route::input('name'),
            ]
        );
    }
}
