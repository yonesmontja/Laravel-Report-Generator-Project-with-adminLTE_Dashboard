<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\ReportType;
use App\Models\ReportUser;
use App\Models\ReportUserData;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    #region Reports

    public function index()
    {
        return view('records.index', [
            'reports' => Report::latest()
                ->filter(request(['search']))
                ->paginate(4)
                ->withQueryString() // searched results will also get paginated.
        ]);
    }

    public function create()
    {
        return view('records.create');
    }

    public function store(Request $request)
    {
        Report::create(
            $request->validate([
                'name' => 'required|min:1|max:50|unique:reports,name'
            ])
            // 'name' => $request->input('name')
        );

        return redirect()->route('reports');
    }

    public function edit(Report $report)
    {
        if (is_null($report)) {
            return redirect()->route('reports');
        }

        return view('records.edit')
            ->with(['reports' => $report]);
    }

    public function update(Request $request, $id)
    {
        Report::whereId($id)
            ->update(
                $request->validate([
                    'name' => 'required|min:1|max:50|unique:reports,name,' . $id
                ])
            );

        return redirect()->route('reports');
    }

    public function destroy(Report $report)
    {
        if (!is_null($report)) {
            $report->delete();
        }

        return redirect()->route('reports');
    }

    #endregion


    #region ReportTypes

    public function typeIndex()
    {
        return view('types.index', [
            'types' => ReportType::with('report')
                ->orderBy('report_id')
                ->filter(request(['search']))
                ->paginate(5)
                ->withQueryString()
        ]);
    }

    public function typeCreate()
    {
        return view('types.create', [
            'reports' => Report::all()
        ]);
    }

    public function typeStore(Request $request)
    {
        // dd($request->all());

        ReportType::create(
            $request->validate([
                'report_id'   => 'required',
                'name'        => 'required|min:1|max:50|unique:report_types,name',
                'description' => 'max:50'
            ])
        );

        return redirect()->route('reports.types');
    }

    public function typeEdit(ReportType $type)
    {
        if (is_null($type)) {
            return redirect()->route('reports.type');
        }

        return view('types.edit')
            ->with([
                'type'    => $type,
                'reports' => Report::all()
            ]);
    }

    public function typeUpdate(Request $request, $id)
    {
        ReportType::whereId($id)
            ->update(
                $request->validate([
                    'report_id'   => 'required',
                    'name'        => 'required|min:1|max:50|unique:report_types,name,' . $id,
                    'description' => 'max:50'
                ])
            );

        return redirect()->route('reports.types');
    }

    public function typeDestroy(ReportType $type)
    {
        if (!is_null($type)) {
            $type->delete();
        }

        return redirect()->route('reports.types');
    }

    #endregion


    #region ReportData

    public function dataIndex()
    {
        return view('data.index', [
            'allReports' => Report::orderBy('name')->with('report_types')->get(),
            'allTypes'   => ReportType::where('report_id', request('report'))->get()
        ]);
    }

    public function dataStore()
    {
        $reportUser = ReportUser::create([
            'user_id'   => 1,
            'report_id' => request()->input('report_id'),
        ]);

        $report = Report::find(request()->input('report_id'));

        foreach ($report->report_types as $type) {
            $row = new ReportUserData();
            $row->report_user_id = $reportUser->id;
            $row->report_type_id = $type->id;
            $row->value = request()->input($type->id);
            $row->save();
        }

        return redirect()->route('reports.data.show');
    }

    public function dataShow()
    {
        return view('data.show', [
            'reportUsers' => ReportUser::with('report_user_data')->get(),
            'users'       => User::all(),
            'reports'     => Report::all(),
            'reportTypes' => ReportType::all()
        ]);
    }

    public function dataEdit(ReportUser $data)
    {
        // dd(auth()->id());
        // dd(ReportType::where('report_id', $data->report_id)->get());
        if (is_null($data)) {
            return redirect()->route('reports.data.show');
        }

        return view('data.edit', [
            'prevReport' => $data,
            'prevType'   => ReportType::where('report_id', $data->report_id)->get(),
            'reportData' => ReportUserData::all()
            // 'allReports'  => Report::orderBy('name')->with('report_types')->get(),
            // 'allTypes'    => ReportType::where('report_id', request('report'))
        ]);
    }

    public function dataUpdate(ReportUser $data)
    {
        // dd($data);
        $reportUser = ReportUser::whereId($data->id)->update([
            'user_id'   => $data->user_id,
            'report_id' => request()->input('report_id'),
        ]);

        $report = Report::find(request()->input('report_id'));

        foreach ($report->report_types as $type) {
            ReportUserData::whereId($data->id)->update([
                'report_user_id' => $data->user_id,
                'report_type_id' => $type->id,
                'value'          => request()->input($type->id)
            ]);
            // $row->report_user_id = $data->id;
            // $row->report_type_id = $type->id;
            // $row->value = request()->input($type->id);
            // $row->save();
        }

        return redirect()->route('reports.data.show');
    }

    public function dataDestroy(ReportUser $data)
    {
        if (!is_null($data)) {
            ReportUserData::where('report_user_id', $data->id)->delete();
            $data->delete();
        }

        return redirect()->route('reports.data.show');
    }

    #endregion
}
