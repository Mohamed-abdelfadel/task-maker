<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::query()->count();
        $totalAdmins = User::query()->where('role_id', 1)->count();
        $totalEmployees = User::query()->where('role_id', 2)->count();
        $totalTasks = Task::query()->count();
        $nearestDueTasks = Task::query()
            ->where('due_date', '>=', now())
            ->where('completed_at', null)
            ->orderBy('due_date')
            ->limit(10)->get();

        $mostContributors = Task::select('assigned_to', DB::raw('count(*) as task_count'))
            ->groupBy('assigned_to')
            ->where('assigned_to', '!=', null)
            ->orderBy('task_count', 'desc')
            ->with('assignedTo')
            ->limit(10)
            ->get();
        return view('dashboard.dashboard' , compact('nearestDueTasks' , 'mostContributors' , 'totalUsers', 'totalEmployees' , 'totalAdmins' , 'totalTasks'));
    }
}
