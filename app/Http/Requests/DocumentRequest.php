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
                'document_inventory_id' => $temp->input('document.document_inventory_id'),
                'caseNumber' => $temp->input('document.caseNumber'),
                'document_type_id' => $temp->input('document.document_type_id'),
                'year' => $temp->input('document.year'),
                'month' => $temp->input('document.month'),
                'day' => $temp->input('document.day'),
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
            'document.document_inventory_id' => ['required'],
            'document.caseNumber' => ['required'],
            'document.document_type_id' => ['required'],
            'document.year' => ['required'],
            'document.month' => [''],
            'document.day' => [''],
            'document.access' => ['required'],
            'geoIndex.id' => ['required'],
            'personIndex.id' => ['required'],
        ];
    }
}
