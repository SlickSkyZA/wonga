<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Debtor;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDebtorRequest;
use App\Http\Requests\StoreDebtorRequest;
use App\Http\Requests\UpdateDebtorRequest;
use App\Status;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DebtorsController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('debtor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Debtor::with(['debt_type', 'status', 'created_by'])->select(sprintf('%s.*', (new Debtor)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'debtor_show';
                $editGate      = 'debtor_edit';
                $deleteGate    = 'debtor_delete';
                $crudRoutePart = 'debtors';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('file_number', function ($row) {
                return $row->file_number ? $row->file_number : "";
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : "";
            });
            $table->addColumn('debt_type_type', function ($row) {
                return $row->debt_type ? $row->debt_type->type : '';
            });

            $table->editColumn('creditor', function ($row) {
                return $row->creditor ? $row->creditor : "";
            });
            $table->editColumn('payments', function ($row) {
                return $row->payments ? $row->payments : "";
            });
            $table->editColumn('outstanding', function ($row) {
                return $row->outstanding ? $row->outstanding : "";
            });
            $table->addColumn('status_status', function ($row) {
                return $row->status ? $row->status->status : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'debt_type', 'status']);

            return $table->make(true);
        }

        return view('admin.debtors.index');
    }

    public function create()
    {
        abort_if(Gate::denies('debtor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $debt_types = Category::all()->pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = Status::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.debtors.create', compact('debt_types', 'statuses'));
    }

    public function store(StoreDebtorRequest $request)
    {
        $debtor = Debtor::create($request->all());

        foreach ($request->input('attachments', []) as $file) {
            $debtor->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachments');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $debtor->id]);
        }

        return redirect()->route('admin.debtors.index');
    }

    public function edit(Debtor $debtor)
    {
        abort_if(Gate::denies('debtor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $debt_types = Category::all()->pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = Status::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $debtor->load('debt_type', 'status', 'created_by');

        return view('admin.debtors.edit', compact('debt_types', 'statuses', 'debtor'));
    }

    public function update(UpdateDebtorRequest $request, Debtor $debtor)
    {
        $debtor->update($request->all());

        if (count($debtor->attachments) > 0) {
            foreach ($debtor->attachments as $media) {
                if (!in_array($media->file_name, $request->input('attachments', []))) {
                    $media->delete();
                }
            }
        }

        $media = $debtor->attachments->pluck('file_name')->toArray();

        foreach ($request->input('attachments', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $debtor->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('admin.debtors.index');
    }

    public function show(Debtor $debtor)
    {
        abort_if(Gate::denies('debtor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $debtor->load('debt_type', 'status', 'created_by');

        return view('admin.debtors.show', compact('debtor'));
    }

    public function destroy(Debtor $debtor)
    {
        abort_if(Gate::denies('debtor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $debtor->delete();

        return back();
    }

    public function massDestroy(MassDestroyDebtorRequest $request)
    {
        Debtor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('debtor_create') && Gate::denies('debtor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Debtor();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
