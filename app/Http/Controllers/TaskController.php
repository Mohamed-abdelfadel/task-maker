<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::query()->orderBy('id', 'desc')->paginate(10);
        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        $allUsers = User::query()->whereIn('role_id', [1, 2])->get()->groupBy('role_id');
        $admins = $allUsers->get(1, collect());
        $users = $allUsers->get(2, collect());

        return view('tasks.create', compact('admins', 'users'));
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'start_date' => 'required|date_format:Y-m-d',
            'due_date' => 'required|date_format:Y-m-d',
            'created_by' => 'exists:users,id,role_id,1',
            'assigned_to' => 'exists:users,id,role_id,2',
        ];

        $messages = [
            'assigned_to.exists' => 'The selected assigned to is invalid.',
            'created_by.exists' => 'The selected created by is invalid.',
            'start_date.date_format' => 'The start date must be in the format YYYY-MM-DD.',
            'due_date.date_format' => 'The due date must be in the format YYYY-MM-DD.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->route('tasks.index')->with('error', $messages->first());
        } else {
            $task = new Task();
            $task->title = $request->title;
            $task->description = $request->description;
            $task->start_date = $request->start_date;
            $task->due_date = $request->due_date;
            $task->created_by = $request->created_by;
            $task->assigned_to = $request->assigned_to;
            $task->save();
            return redirect()->route('tasks.index')->with('success', __('Task created Successfully.'));
        }
    }

    public function destroy(Request $request)
    {
        Task::destroy($request->id);
        return redirect()->route('tasks.index')->with('success', __('Task Deleted Successfully.'));
    }

    public function done(Request $request)
    {
        $task = Task::query()->find($request->id);
        if ($task->completed_at) {
            return redirect()->back()->with('error', __('Task is Already Done.'));
        } else {
            $task->completed_at = now();
            $task->save();
        }

        return redirect()->back()->with('success', __('Task Done Successfully.'));
    }

}
