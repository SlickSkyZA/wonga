<?php

namespace App\Http\Requests;

use App\Debtor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDebtorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('debtor_edit');
    }

    public function rules()
    {
        return [
            'file_number'         => [
                'string',
                'required',
                'unique:debtors,file_number,' . request()->route('debtor')->id,
            ],
            'name'                => [
                'string',
                'required',
            ],
            'id_number'           => [
                'string',
                'required',
                'unique:debtors,id_number,' . request()->route('debtor')->id,
            ],
            'address'             => [
                'string',
                'required',
            ],
            'phone'               => [
                'string',
                'nullable',
            ],
            'email'               => [
                'string',
                'nullable',
            ],
            'employer'            => [
                'string',
                'nullable',
            ],
            'employer_address'    => [
                'string',
                'nullable',
            ],
            'debt_type_id'        => [
                'required',
                'integer',
            ],
            'creditor'            => [
                'string',
                'required',
            ],
            'arrear_period_start' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'arrear_period_end'   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'payments'            => [
                'required',
            ],
            'outstanding'         => [
                'required',
            ],
            'correspondence'      => [
                'string',
                'nullable',
            ],
            'date'                => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'notes'               => [
                'string',
                'nullable',
            ],
            'status_id'           => [
                'required',
                'integer',
            ],
        ];
    }
}
