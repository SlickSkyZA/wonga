@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.debtor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.debtors.update", [$debtor->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="file_number">{{ trans('cruds.debtor.fields.file_number') }}</label>
                <input class="form-control {{ $errors->has('file_number') ? 'is-invalid' : '' }}" type="text" name="file_number" id="file_number" value="{{ old('file_number', $debtor->file_number) }}" required>
                @if($errors->has('file_number'))
                    <span class="text-danger">{{ $errors->first('file_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.file_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.debtor.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $debtor->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="id_number">{{ trans('cruds.debtor.fields.id_number') }}</label>
                <input class="form-control {{ $errors->has('id_number') ? 'is-invalid' : '' }}" type="text" name="id_number" id="id_number" value="{{ old('id_number', $debtor->id_number) }}" required>
                @if($errors->has('id_number'))
                    <span class="text-danger">{{ $errors->first('id_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.id_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.debtor.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $debtor->address) }}" required>
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.debtor.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $debtor->phone) }}">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.debtor.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $debtor->email) }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="employer">{{ trans('cruds.debtor.fields.employer') }}</label>
                <input class="form-control {{ $errors->has('employer') ? 'is-invalid' : '' }}" type="text" name="employer" id="employer" value="{{ old('employer', $debtor->employer) }}">
                @if($errors->has('employer'))
                    <span class="text-danger">{{ $errors->first('employer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.employer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="employer_address">{{ trans('cruds.debtor.fields.employer_address') }}</label>
                <input class="form-control {{ $errors->has('employer_address') ? 'is-invalid' : '' }}" type="text" name="employer_address" id="employer_address" value="{{ old('employer_address', $debtor->employer_address) }}">
                @if($errors->has('employer_address'))
                    <span class="text-danger">{{ $errors->first('employer_address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.employer_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="debt_type_id">{{ trans('cruds.debtor.fields.debt_type') }}</label>
                <select class="form-control select2 {{ $errors->has('debt_type') ? 'is-invalid' : '' }}" name="debt_type_id" id="debt_type_id" required>
                    @foreach($debt_types as $id => $debt_type)
                        <option value="{{ $id }}" {{ (old('debt_type_id') ? old('debt_type_id') : $debtor->debt_type->id ?? '') == $id ? 'selected' : '' }}>{{ $debt_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('debt_type'))
                    <span class="text-danger">{{ $errors->first('debt_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.debt_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="creditor">{{ trans('cruds.debtor.fields.creditor') }}</label>
                <input class="form-control {{ $errors->has('creditor') ? 'is-invalid' : '' }}" type="text" name="creditor" id="creditor" value="{{ old('creditor', $debtor->creditor) }}" required>
                @if($errors->has('creditor'))
                    <span class="text-danger">{{ $errors->first('creditor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.creditor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="arrear_period_start">{{ trans('cruds.debtor.fields.arrear_period_start') }}</label>
                <input class="form-control date {{ $errors->has('arrear_period_start') ? 'is-invalid' : '' }}" type="text" name="arrear_period_start" id="arrear_period_start" value="{{ old('arrear_period_start', $debtor->arrear_period_start) }}" required>
                @if($errors->has('arrear_period_start'))
                    <span class="text-danger">{{ $errors->first('arrear_period_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.arrear_period_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="arrear_period_end">{{ trans('cruds.debtor.fields.arrear_period_end') }}</label>
                <input class="form-control date {{ $errors->has('arrear_period_end') ? 'is-invalid' : '' }}" type="text" name="arrear_period_end" id="arrear_period_end" value="{{ old('arrear_period_end', $debtor->arrear_period_end) }}">
                @if($errors->has('arrear_period_end'))
                    <span class="text-danger">{{ $errors->first('arrear_period_end') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.arrear_period_end_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="initial_amount">{{ trans('cruds.debtor.fields.initial_amount') }}</label>
                <input class="form-control {{ $errors->has('initial_amount') ? 'is-invalid' : '' }}" type="number" name="initial_amount" id="initial_amount" value="{{ old('initial_amount', $debtor->initial_amount) }}" step="0.01">
                @if($errors->has('initial_amount'))
                    <span class="text-danger">{{ $errors->first('initial_amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.initial_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payments">{{ trans('cruds.debtor.fields.payments') }}</label>
                <input class="form-control {{ $errors->has('payments') ? 'is-invalid' : '' }}" type="number" name="payments" id="payments" value="{{ old('payments', $debtor->payments) }}" step="0.01" required>
                @if($errors->has('payments'))
                    <span class="text-danger">{{ $errors->first('payments') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.payments_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="outstanding">{{ trans('cruds.debtor.fields.outstanding') }}</label>
                <input class="form-control {{ $errors->has('outstanding') ? 'is-invalid' : '' }}" type="number" name="outstanding" id="outstanding" value="{{ old('outstanding', $debtor->outstanding) }}" step="0.01" required>
                @if($errors->has('outstanding'))
                    <span class="text-danger">{{ $errors->first('outstanding') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.outstanding_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="attachments">{{ trans('cruds.debtor.fields.attachments') }}</label>
                <div class="needsclick dropzone {{ $errors->has('attachments') ? 'is-invalid' : '' }}" id="attachments-dropzone">
                </div>
                @if($errors->has('attachments'))
                    <span class="text-danger">{{ $errors->first('attachments') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.attachments_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="correspondence">{{ trans('cruds.debtor.fields.correspondence') }}</label>
                <input class="form-control {{ $errors->has('correspondence') ? 'is-invalid' : '' }}" type="text" name="correspondence" id="correspondence" value="{{ old('correspondence', $debtor->correspondence) }}">
                @if($errors->has('correspondence'))
                    <span class="text-danger">{{ $errors->first('correspondence') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.correspondence_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date">{{ trans('cruds.debtor.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $debtor->date) }}">
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.debtor.fields.notes') }}</label>
                <input class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" type="text" name="notes" id="notes" value="{{ old('notes', $debtor->notes) }}">
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="charges">{{ trans('cruds.debtor.fields.charges') }}</label>
                <input class="form-control {{ $errors->has('charges') ? 'is-invalid' : '' }}" type="number" name="charges" id="charges" value="{{ old('charges', $debtor->charges) }}" step="0.01">
                @if($errors->has('charges'))
                    <span class="text-danger">{{ $errors->first('charges') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.charges_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status_id">{{ trans('cruds.debtor.fields.status') }}</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id" required>
                    @foreach($statuses as $id => $status)
                        <option value="{{ $id }}" {{ (old('status_id') ? old('status_id') : $debtor->status->id ?? '') == $id ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.debtor.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    var uploadedAttachmentsMap = {}
Dropzone.options.attachmentsDropzone = {
    url: '{{ route('admin.debtors.storeMedia') }}',
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="attachments[]" value="' + response.name + '">')
      uploadedAttachmentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAttachmentsMap[file.name]
      }
      $('form').find('input[name="attachments[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($debtor) && $debtor->attachments)
          var files =
            {!! json_encode($debtor->attachments) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="attachments[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection