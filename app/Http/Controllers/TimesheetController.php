<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Timesheet;
use App\Task;
use App\Department;

class TimesheetController extends Controller
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
        $timesheets = DB::table('timesheet')
        ->leftJoin('department', 'timesheet.department_id', '=', 'department.id')
        ->leftJoin('task', 'timesheet.task_id', '=', 'task.id')
        ->select('timesheet.*','department.id', 'department.name', 'department.name as name', 'task.id as task_id', 'task.id', 'task.task_name', 'task.task_name as task_name', 'task.id as task_id')
        ->paginate(5);
        return view('timesheet-mgmt/index', ['timesheet' => $timesheets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $tasks = Task::all();
         $departments = Department::all();
        return view('timesheet-mgmt/create', ['tasks' => $tasks , 'departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	 Task::findOrFail($request['task_id']);
         Department::findOrFail($request['department_id']);

         $this->validateInput($request);
         Timesheet::create([
            'week' => $request['week'],
            'department_id' => $request['department_id'],
            'task_id' => $request['task_id'],
            'email' => $request['email'],
            'remarks' => $request['remarks'],
            'percentage' => $request['percentage'],
            'monday' => $request['monday'],
            'tuesday' => $request['tuesday'],
            'wednesday' => $request['wednesday'],
            'thursday' => $request['thursday'],
            'friday' => $request['friday'],
            'saturday' => $request['saturday'],
            'sunday' => $request['sunday']
        ]);

        return redirect()->intended('timesheet-management');

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

    	$timesheet = Timesheet::find($id);
        // Redirect to state list if updating state wasn't existed
        if ($timesheet == null || count($timesheet) == 0) {
            return redirect()->intended('/timesheet-management');
        }

        $tasks = Task::all();
        $departments = Department::all();
        return view('timesheet-mgmt/edit', ['timesheet' => $timesheet, 'tasks' => $tasks , 'departments' => $departments]);
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
    	$timesheet = Timesheet::findOrFail($id);
        $this->validate($request, [
        'week' => 'required',
        'email' => 'required',
        'remarks' => 'required|max:120',
        'percentage' => 'required|max:60',
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
            'task_id' => $request['task_id'],
            'remarks' => $request['remarks'],
            'percentage' => $request['percentage'],
            'monday' => $request['monday'],
            'tuesday' => $request['tuesday'],
            'wednesday' => $request['wednesday'],
            'thursday' => $request['thursday'],
            'friday' => $request['friday'],
            'saturday' => $request['saturday'],
            'sunday' => $request['sunday']
        ];
        Timesheet::where('id', $id)
            ->update($input);
        
        return redirect()->intended('timesheet-management');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    Timesheet::where('id', $id)->delete();
         return redirect()->intended('timesheet-management');	
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

       $timesheets = $this->doSearchingQuery($constraints);
       return view('timesheet-mgmt/index', ['timesheets' => $timesheets, 'searchingVals' => $constraints]);
     }

    private function doSearchingQuery($constraints)
    {
    	$query = Timesheet::query();
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
        'percentage' => 'required|max:60',
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