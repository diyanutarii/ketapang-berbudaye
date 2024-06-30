<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Lang;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{
    function index(Request $request)
    {
        $data['title'] = Lang::get('admin/event.head-title');
        $data['events'] = Event::orderBy('id', 'desc')->get();

        if ($request->ajax()) {
            return DataTables::of($data['events'])
                ->addIndexColumn()
                ->addColumn('action', function (Event $event) {
                    $btn = '<a href="javascript:void(0)" data-id="' . $event->id . '" class="dropdown-item detail"><i class="mdi mdi-information"></i>' . Lang::Get('forms.button.details') . '</a>';
                    $btn .= '<a href="javascript:void(0)" data-id="' . $event->id . '" class="dropdown-item text-warning edit"><i class="mdi mdi-pencil"></i>' . Lang::get('forms.button.edit') . '</a>';
                    $btn .= '<a href="javascript:void(0)" data-id="' . $event->id . '" class="dropdown-item text-danger destroy"><i class="mdi mdi-trash-can"></i>' . Lang::get('forms.button.delete') . '</a>';
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
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.acara.index', $data);
    }

    function detail(Request $request)
    {
        $data['title'] = Lang::get('admin/event.head-title');
        $data['event'] = Event::where('id', Crypt::decrypt($request->id))->firstOrFail();

        return view('admin.acara.detail', $data);
    }

    function create()
    {
        $data['title'] = Lang::get('admin/event.head-title');

        return view('admin.acara.form', $data);
    }

    function edit(Request $request)
    {
        $data['title'] = Lang::get('admin/event.head-title');
        $data['event'] = Event::where('id', Crypt::decrypt($request->id))->firstOrFail();

        return view('admin.acara.form', $data);
    }

    function check(Request $request)
    {
        $data = Event::findOrFail($request->id);
        $created_at = Carbon::parse($data->created_at)->isoFormat('dddd, D MMMM Y | HH:mm:ss');
        $updated_at = Carbon::parse($data->updated_at)->isoFormat('dddd, D MMMM Y | HH:mm:ss');

        return response()->json([
            'data' => $data,
            'created_at' => $created_at,
            'updated_at' => $updated_at,
        ]);
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $image = $request->hidden_photo;
        if ($request->file('image')) {
            $path = 'public/event-images/';
            $file = $request->file('image');
            $file_name = $request->name . '-[' . time() . '].' . $file->getClientOriginalExtension();
            $file->storeAs($path, $file_name);
            $image = "storage/event-images/" . $file_name;
        }

        $data = Event::updateOrCreate([
            'id' => $request->id,
        ], [
            'image' => $image,
            'name' => $request->name,
        ]);

        if ($request->id == $data->id) {
            return $request->ajax()
                ? response()->json([
                    'code' => 200,
                    'status' => 'Updated',
                    'message' => __('responses.data.updated.message'),
                    'caption' => __('responses.data.updated.caption'),
                ])
                : redirect('events')->with([
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
                : redirect('events')->with([
                    'message' => __('responses.data.created.message') . "\t" . __('responses.data.created.caption'),
                ]);
        }
    }

    function destroy(Request $request)
    {
        $data = Event::findOrFail($request->id);
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
