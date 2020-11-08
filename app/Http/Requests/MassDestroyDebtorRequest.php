<?php

namespace App\Http\Requests;

use App\Debtor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDebtorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('debtor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:debtors,id',
        ];
    }
}
