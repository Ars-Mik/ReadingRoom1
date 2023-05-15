<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $temp = $this;        
        $this->merge([
            'document' => [
                'id' => $temp->input('document.id'),
                'documentName' => $temp->input('document.documentName'),
                'fileName' => $temp->file('file')->getClientOriginalName(),
                'fund_id' => $temp->input('document.fund_id'),
                'date' => $temp->input('document.date'),
                'access' => $temp->input('document.access')
            ],
        ]);
    }

    

    public function rules()
    {
        return [
            'document.documentName' => ['required'],
            'document.fileName' => [''],
            'file' => ['required'],
            'document.fund_id' => ['required'],
            'document.date' => ['required'],
            'document.access' => ['required'],
            'geoIndex.id' => ['required'],
            'personIndex.id' => ['required'],
            'themeIndex.id' => ['required']
        ];
    }
}
