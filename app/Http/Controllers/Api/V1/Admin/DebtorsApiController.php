<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Debtor;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDebtorRequest;
use App\Http\Requests\UpdateDebtorRequest;
use App\Http\Resources\Admin\DebtorResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DebtorsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('debtor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DebtorResource(Debtor::with(['debt_type', 'status', 'created_by'])->get());
    }

    public function store(StoreDebtorRequest $request)
    {
        $debtor = Debtor::create($request->all());

        if ($request->input('attachments', false)) {
            $debtor->addMedia(storage_path('tmp/uploads/' . $request->input('attachments')))->toMediaCollection('attachments');
        }

        return (new DebtorResource($debtor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Debtor $debtor)
    {
        abort_if(Gate::denies('debtor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DebtorResource($debtor->load(['debt_type', 'status', 'created_by']));
    }

    public function update(UpdateDebtorRequest $request, Debtor $debtor)
    {
        $debtor->update($request->all());

        if ($request->input('attachments', false)) {
            if (!$debtor->attachments || $request->input('attachments') !== $debtor->attachments->file_name) {
                if ($debtor->attachments) {
                    $debtor->attachments->delete();
                }

                $debtor->addMedia(storage_path('tmp/uploads/' . $request->input('attachments')))->toMediaCollection('attachments');
            }
        } elseif ($debtor->attachments) {
            $debtor->attachments->delete();
        }

        return (new DebtorResource($debtor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Debtor $debtor)
    {
        abort_if(Gate::denies('debtor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $debtor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
