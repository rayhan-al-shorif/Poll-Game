<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('id', 'name', 'email')
                ->with('roles')->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('role', function ($row) {
                    return true;
                })
                ->addColumn('action', function ($row) {
                    return true;
                })
                ->make(true);
        }

        return view('user.index');
    }


    public function view($id)
    {
        $user = User::select('id', 'name', 'email')
            ->where('id', $id)
            ->with('roles')->first();
        return view('user.view', compact('user'));
    }

    public function createOrUpdateView($id = null)
    {
        $title = "";
        $user = "";
        if ($id) {
            $title = "Update User";
            $user = User::select('id', 'name', 'email')
                ->where('id', $id)
                ->with('roles')->first();
        } else {
            $title = "Create a new user";
        }
        return view('user.createOrUpdate', compact('title', 'user'));
    }
}
