<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\NPTimesheet;
use App\NPTask;
use App\Department;

class NPTimesheetController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illumin
     ate\Http\Response
     */
    public function index()
    {
        $nptimesheets = DB::table('nptimesheet')
        ->leftJoin('department', 'nptimesheet.department_id', '=', 'department.id')
        ->leftJoin('nptask', 'nptimesheet.nptask_id', '=', 'nptask.id')
        ->select('nptimesheet.*','department.id', 'department.name', 'department.name as name', 'nptask.id as nptask_id', 'nptask.id', 'nptask.nptask_name', 'nptask.nptask_name as nptask_name', 'nptask.id as nptask_id')
        ->paginate(5);
        return view('nptimesheet-mgmt/index', ['nptimesheet' => $nptimesheets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $nptasks = NPTask::all();
         $departments = Department::all();
        return view('nptimesheet-mgmt/create', ['nptasks' => $nptasks , 'departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	 NPTask::findOrFail($request['nptask_id']);
         Department::findOrFail($request['department_id']);

         $this->validateInput($request);
         NPTimesheet::create([
            'week' => $request['week'],
            'department_id' => $request['department_id'],
            'nptask_id' => $request['nptask_id'],
            'email' => $request['email'],
            'remarks' => $request['remarks'],
            'monday' => $request['monday'],
            'tuesday' => $request['tuesday'],
            'wednesday' => $request['wednesday'],
            'thursday' => $request['thursday'],
            'friday' => $request['friday'],
            'saturday' => $request['saturday'],
            'sunday' => $request['sunday']
        ]);

        return redirect()->intended('nptimesheet-management');

    	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    	$nptimesheet = NPTimesheet::find($id);
        // Redirect to state list if updating state wasn't existed
        if ($nptimesheet == null || count($nptimesheet) == 0) {
            return redirect()->intended('/timesheet-management');
        }

        $nptasks = NPTask::all();
        $departments = Department::all();
        return view('nptimesheet-mgmt/edit', ['nptimesheet' => $nptimesheet, 'nptasks' => $nptasks , 'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$nptimesheet = NPTimesheet::findOrFail($id);
        $this->validate($request, [
        'week' => 'required',
        'email' => 'required',
        'remarks' => 'required|max:120',
        'monday' => 'required|max:60',
        'tuesday' => 'required|max:60',
        'wednesday' => 'required|max:60',
        'thursday' => 'required|max:60',
        'friday' => 'required|max:60',
        'saturday' => 'required|max:60',
        'sunday' => 'required|max:60'
    ]);
        $input = [
            'week' => $request['week'],
            'email' => $request['email'],
            'department_id' => $request['department_id'],
            'nptask_id' => $request['nptask_id'],
            'remarks' => $request['remarks'],
            'monday' => $request['monday'],
            'tuesday' => $request['tuesday'],
            'wednesday' => $request['wednesday'],
            'thursday' => $request['thursday'],
            'friday' => $request['friday'],
            'saturday' => $request['saturday'],
            'sunday' => $request['sunday']
        ];
        NPTimesheet::where('id', $id)
            ->update($input);
        
        return redirect()->intended('nptimesheet-management');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    NPTimesheet::where('id', $id)->delete();
         return redirect()->intended('nptimesheet-management');	
    }
    /**public function loadTimesheets($taskId) {
        $timesheets = Timesheet::where('task_id', '=', $taskId)->get(['id', 'task_name']);

        return response()->json($timesheets);
    }

    /**
     * Search task from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request)
     {
     	$constraints = [
           'week' => $request['week'],
            ];

       $nptimesheets = $this->doSearchingQuery($constraints);
       return view('nptimesheet-mgmt/index', ['nptimesheets' => $nptimesheets, 'searchingVals' => $constraints]);
     }

    private function doSearchingQuery($constraints)
    {
    	$query = NPTimesheet::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(5);
    }

    private function validateInput($request) 
    {
    	 $this->validate($request, [
        'week' => 'required',
        'email' => 'required',
        'remarks' => 'required|max:120',
        'monday' => 'required|max:60',
        'tuesday' => 'required|max:60',
        'wednesday' => 'required|max:60',
        'thursday' => 'required|max:60',
        'friday' => 'required|max:60',
        'saturday' => 'required|max:60',
        'sunday' => 'required|max:60'
    ]);
	}
}