<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\ReportTemplate;
use App\Models\ReportType;
use App\Models\ReportUser;
use App\Models\ReportUserData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $request->validate([
            'name' => 'required|min:1|max:50|string|unique:reports,name'
        ]);

        try {
            Report::create(
                $request->input('name')
            );

            return redirect()->back();
        } catch (\Exception $exception) {
            abort(404);
        }
    }

    public function edit(Report $report)
    {
        return view('records.edit')->with(['reports' => $report]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:1|max:50|string|unique:reports,name,' . $id
        ]);

        try {
            Report::whereId($id)
                ->update([
                    'name' => $request->input('name')
                ]);

            return redirect()->route('reports');
        } catch (\Exception $exception) {
            throw $exception;
            // abort(404);
        }
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->back();
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
            'reports' => Report::all(),
        ]);
    }

    public function typeStore()
    {
        request()->validate([
            'report_id'   => 'required',
            // The name must be unique while ignoring the row where report_id = request('report_id')
            'name'        => 'required|min:1|max:50|string|unique:report_types,name,NULL,id,report_id,' . request('report_id'),
            'description' => 'max:50'
        ]);

        try {
            ReportType::create([
                'report_id'   => request()->input('report_id'),
                'name'        => request()->input('name'),
                'description' => request()->input('description'),
            ]);

            request()->session()->put('last_selected_report', request('report_id'));
            return redirect()->back();
        } catch (\Exception $exception) {
            throw $exception;
            // abort(500);
        }
    }

    public function typeEdit(ReportType $type)
    {
        return view('types.edit')
            ->with([
                'type'    => $type,
                'reports' => Report::all()
            ]);
    }

    public function typeUpdate(Request $request, $id)
    {
        $request->validate([
            'report_id'   => 'required|integer',
            // The name must be unique while ignoring the row with an id of $id and ignoring where report_id = request('report_id')
            'name'        => 'required|min:1|max:50|string|unique:report_types,name,' . $id . ',id,report_id,' . request('report_id'),
            'description' => 'max:50'
        ]);

        try {
            ReportType::whereId($id)
                ->update([
                    'report_id'   => $request->input('report_id'),
                    'name'        => $request->input('name'),
                    'description' => $request->input('description'),
                ]);

            return redirect()->route('reports.types');
        } catch (\Exception $exception) {
            abort(404);
        }
    }

    public function typeDestroy(ReportType $type)
    {
        $type->delete();
        return redirect()->back();
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
        try {
            $reportUser = ReportUser::create([
                'user_id'   => !(is_null(auth()->id())) ? auth()->id() : 1,
                'report_id' => request()->input('report_id')
            ]);

            $report = Report::find(request()->input('report_id'));

            foreach ($report->report_types as $type) {
                ReportUserData::create([
                    'report_user_id' => $reportUser->id,
                    'report_type_id' => $type->id,
                    'value'          => request()->input($type->id)
                ]);
            }

            return redirect()->back();
        } catch (\Exception $exception) {
            abort(404);
        }
    }

    public function dataShow()
    {
        return view('data.show', [
            'reportUsers'     => ReportUser::orderBy('id', 'desc')->with('report_user_data')->paginate(4),
            'users'           => User::all(),
            'reports'         => Report::all(),
            'reportTypes'     => ReportType::all(),
            'reportTemplates' => ReportTemplate::all()
        ]);
    }

    public function dataDestroy(ReportUser $data)
    {
        ReportUserData::where('report_user_id', $data->id)->delete();
        $data->delete();

        return redirect()->back();
    }

    public function viewReport($templateName, ReportUser $data, $isChineseEnabled)
    {
        return view('templates.all-templates.' . $templateName, [
            'reportUserData'   => $data->report_user_data,
            'reportType'       => ReportType::all(),
            'isChineseEnabled' => $isChineseEnabled
        ]);
    }

    #endregion


    #region Report Template

    public function templateindex()
    {
        $syncedTemplateFileNames = ReportTemplate::all()->pluck('report_template_name')->toArray();

        $templateFiles = ['No Templates Found'];
        if (file_exists($directory = resource_path('views/templates/all-templates'))) {
            // $templateFiles = File::files($directory);
            $templateFiles         = scandir($directory);
            $templateFiles         = array_diff($templateFiles, array('.', '..'));          // '.' and '..' directories will be excluded here.
            $unsyncedTemplateFiles = array_diff($templateFiles, $syncedTemplateFileNames);  // synced templates will be excluded here.
        }

        return view('templates.index', [
            'unsyncedReports'   => Report::doesntHave('report_template')->get(),
            'unsyncedTemplates' => $unsyncedTemplateFiles,
            'allReports'        => Report::all(),
            'allTemplates'      => ReportTemplate::paginate(4)
        ]);
    }

    public function templateStore()
    {
        request()->validate([
            'report_id'            => 'required|numeric|unique:report_templates,report_id',
            'report_template_name' => 'required|string|unique:report_templates,report_template_name'
        ]);

        try {
            ReportTemplate::create([
                'report_id'            => request()->report_id,
                'report_template_name' => request()->report_template_name
            ]);

            return redirect()->back();
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function templateDestroy(ReportTemplate $template)
    {
        $template->delete();
        return redirect()->back();
    }

    #endregion
}
