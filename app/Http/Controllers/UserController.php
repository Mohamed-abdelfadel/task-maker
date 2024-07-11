<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->orderBy('id', 'desc')->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('layout.soon');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            User::destroy($request->id);

        } catch (Exception $e) {
            return redirect()->back()->with('error', __($e->getMessage()));
        }
        return redirect()->route('users.index')->with('success', __('User Deleted Successfully.'));
    }
}
