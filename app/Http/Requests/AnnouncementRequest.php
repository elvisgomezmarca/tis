<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'title' => 'required|max:100',
                    'description' => 'required|max:255',
                    'start_date_announcement' => 'required|nullable|date',
                    'end_date_announcement' => 'required|nullable|date',
                    'start_date_calification' => 'required|nullable|date',
                    'end_date_calification' => 'required|nullable|date',
                    'areas' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'title' => 'required|max:100',
                    'description' => 'required|max:255',
                    'start_date_announcement' => 'required|nullable|date',
                    'end_date_announcement' => 'required|nullable|date',
                    'start_date_calification' => 'required|nullable|date',
                    'end_date_calification' => 'required|nullable|date',
                    'areas' => 'required'
                ];
            }
            default:
                break;
        }

        return [
            //
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El campo :attribute es obligatorio.',
            'description.required' => 'El campo :attribute es obligatorio.',
            'areas.required' => 'El campo :attribute es obligatorio.',
            'start_date_announcement.required' => 'Fecha de inicio es obligatorio',
            'start_date_announcement.date' => 'Fecha valida es requerida',
            'end_date_announcement.required' => 'Fecha es obligatorio',
            'end_date_announcement.date' => 'Fecha valida es requerida',
            'start_date_calification.date' => 'Fecha valida es requerida',
            'start_date_calification.required' => 'Fecha de inicio es obligatorio',
            'end_date_calification.date' => 'Fecha valida es requerida',
            'end_date_calification.required' => 'Fecha es obligatorio',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Titulo',
            'description' => 'Descripcion',
            'areas' => 'Areas',
            'start_date_announcement' => 'Fecha inicio',
            'end_date_announcement' => 'Fecha de finalizacion',
            'start_date_calification' => 'Fecha inicio',
            'end_date_calification' => 'Fecha de finalizacion',
        ];
    }
}
