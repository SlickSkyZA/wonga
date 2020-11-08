@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.debtor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.debtors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.id') }}
                        </th>
                        <td>
                            {{ $debtor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.file_number') }}
                        </th>
                        <td>
                            {{ $debtor->file_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.name') }}
                        </th>
                        <td>
                            {{ $debtor->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.id_number') }}
                        </th>
                        <td>
                            {{ $debtor->id_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.address') }}
                        </th>
                        <td>
                            {{ $debtor->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.phone') }}
                        </th>
                        <td>
                            {{ $debtor->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.email') }}
                        </th>
                        <td>
                            {{ $debtor->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.employer') }}
                        </th>
                        <td>
                            {{ $debtor->employer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.employer_address') }}
                        </th>
                        <td>
                            {{ $debtor->employer_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.debt_type') }}
                        </th>
                        <td>
                            {{ $debtor->debt_type->type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.creditor') }}
                        </th>
                        <td>
                            {{ $debtor->creditor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.arrear_period_start') }}
                        </th>
                        <td>
                            {{ $debtor->arrear_period_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.arrear_period_end') }}
                        </th>
                        <td>
                            {{ $debtor->arrear_period_end }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.initial_amount') }}
                        </th>
                        <td>
                            {{ $debtor->initial_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.payments') }}
                        </th>
                        <td>
                            {{ $debtor->payments }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.outstanding') }}
                        </th>
                        <td>
                            {{ $debtor->outstanding }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.attachments') }}
                        </th>
                        <td>
                            @foreach($debtor->attachments as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.correspondence') }}
                        </th>
                        <td>
                            {{ $debtor->correspondence }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.date') }}
                        </th>
                        <td>
                            {{ $debtor->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.notes') }}
                        </th>
                        <td>
                            {{ $debtor->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.charges') }}
                        </th>
                        <td>
                            {{ $debtor->charges }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.status') }}
                        </th>
                        <td>
                            {{ $debtor->status->status ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.created_at') }}
                        </th>
                        <td>
                            {{ $debtor->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.debtor.fields.updated_at') }}
                        </th>
                        <td>
                            {{ $debtor->updated_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.debtors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection