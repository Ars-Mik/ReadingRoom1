<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentInventoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'documentInventory.numberInventory' => ['required'],
            'documentInventory.fund_id' => ['required'],
        ];
    }
}
