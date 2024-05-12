<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Lang;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    function index(Request $request)
    {
        $data['title'] = Lang::get('admin/administrator.head-title');
        $data['administrators'] = Admin::orderBy('id', 'desc')->get();

        if ($request->ajax()) {
            return DataTables::of($data['administrators'])
                ->addIndexColumn()
                ->addColumn('action', function (Admin $admin) {
                    $btn = '<a href="javascript:void(0)" data-id="' . $admin->id . '" class="dropdown-item detail"><i class="mdi mdi-information"></i>' . Lang::Get('forms.button.details') . '</a>';
                    $btn .= '<a href="javascript:void(0)" data-id="' . $admin->id . '" class="dropdown-item text-warning edit"><i class="mdi mdi-pencil"></i>' . Lang::get('forms.button.edit') . '</a>';
                    $btn .= '<a href="javascript:void(0)" data-id="' . $admin->id . '" class="dropdown-item text-danger destroy"><i class="mdi mdi-trash-can"></i>' . Lang::get('forms.button.delete') . '</a>';
                    return '<div class="dropdown">
                                <button class="btn btn-light dropdown-toggle waves-effect waves-light"
                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    ' . Lang::get('forms.button.action') . '<i class="mdi mdi-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    ' . $btn . '
                                </div>
                            </div>';
                })
                ->addColumn('email_verified_at', function (Admin $admin) {
                    if (empty($admin->email_verified_at)) {
                        return '<i class="mdi mdi-close-circle text-danger"></i>';
                    } else {
                        return '<i class="mdi mdi-check-circle text-success" title="' . Carbon::parse($admin->email_verified_at)->isoFormat('dddd, D MMMM Y | HH:mm') . '"></i>';
                    }
                })
                ->rawColumns(['action', 'email_verified_at'])
                ->make(true);
        }

        return view('admin.administrators.index', $data);
    }

    function detail(Request $request)
    {
        $data['title'] = Lang::get('admin/administrator.head-title');
        $data['administrator'] = Admin::where('id', Crypt::decrypt($request->id))->firstOrFail();

        return view('admin.administrators.detail', $data);
    }

    function create()
    {
        $data['title'] = Lang::get('admin/administrator.head-title');

        return view('admin.administrators.form', $data);
    }

    function edit(Request $request)
    {
        $data['title'] = Lang::get('admin/administrator.head-title');
        $data['administrator'] = Admin::where('id', Crypt::decrypt($request->id))->firstOrFail();

        return view('admin.administrators.form', $data);
    }

    function check(Request $request)
    {
        $data = Admin::findOrFail($request->id);
        $email_verified_at = empty($data->email_verified_at) ? '-' : Carbon::parse($data->email_verified_at)->isoFormat('dddd, D MMMM Y | HH:mm:ss');
        $created_at = Carbon::parse($data->created_at)->isoFormat('dddd, D MMMM Y | HH:mm:ss');
        $updated_at = Carbon::parse($data->updated_at)->isoFormat('dddd, D MMMM Y | HH:mm:ss');

        return response()->json([
            'data' => $data,
            'email_verified_at' => $email_verified_at,
            'created_at' => $created_at,
            'updated_at' => $updated_at,
        ]);
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $request->id . ',id',
            'level' => 'required',
        ]);

        $photo = $request->hidden_photo;
        if ($request->file('photo')) {
            $path = 'public/admin-photos/';
            $file = $request->file('photo');
            $file_name = $request->email . '-[' . time() . '].' . $file->getClientOriginalExtension();
            $file->storeAs($path, $file_name);
            $photo = "storage/admin-photos/" . $file_name;
        }

        $data = Admin::updateOrCreate([
            'id' => $request->id,
        ], [
            'photo' => $photo,
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
        ]);

        if ($request->id == $data->id) {
            return $request->ajax()
                ? response()->json([
                    'code' => 200,
                    'status' => 'Updated',
                    'message' => __('responses.data.updated.message'),
                    'caption' => __('responses.data.updated.caption'),
                ])
                : redirect('administrators')->with([
                    'message' => __('responses.data.updated.message') . "\t" . __('responses.data.updated.caption'),
                ]);
        } else {
            return $request->ajax()
                ? response()->json([
                    'code' => 200,
                    'status' => 'Created',
                    'message' => __('responses.data.created.message'),
                    'caption' => __('responses.data.created.caption'),
                ])
                : redirect('administrators')->with([
                    'message' => __('responses.data.created.message') . "\t" . __('responses.data.created.caption'),
                ]);
        }
    }

    function destroy(Request $request)
    {
        $data = Admin::findOrFail($request->id);
        $data->delete();

        return $request->ajax()
            ? response()->json([
                'code' => 200,
                'status' => 'Deleted',
                'message' => __('responses.data.destroyed.message'),
                'caption' => __('responses.data.destroyed.caption'),
            ])
            : back()->withErrors([
                'message' => __('responses.data.destroyed.message') . "\t" . __('responses.data.destroyed.caption'),
            ]);
    }
}
