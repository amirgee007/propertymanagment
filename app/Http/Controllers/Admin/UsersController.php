<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Only admin can access this resource
     *
     * UsersController constructor.
     */
    function __construct()
    {
        $this->middleware('AdminRole');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.users.add', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->formValidation($request);

        try {
            User::create($request->except('_token'));

            flash('User created successfully.')->success();
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            flash('Error while creating user.')->error();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            flash('User not found');
            return back();
        }
        $roles = Role::all();

        return view('admin.users.show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            flash('User not found');
            return back();
        }

        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            flash('User not found');
            return back();
        }

        $this->formValidation($request, $id);

        try {
            $user->update($request->except('_token'));

            flash('User has updated successfully.')->success();
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            flash('Error while updating user.')->error();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found.'
            ]);
        } else {
            $user->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'User deleted successfully.'
            ]);
        }
    }

    /**
     * @param Request $request
     */
    private function formValidation(Request $request, $id = null)
    {
        if ($request->has('is_verify'))
            $request['is_verify'] = 1;
        else
            $request['is_verify'] = 0;

        $email_rule = is_null($id) ? '' : ',' . $id . ',id';

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'role_id' => 'sometimes|required|exists:roles,id',
            'email' => 'required|string|email|max:255|unique:users,email' . $email_rule . '|regex:/^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$/i',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $request['password'] = bcrypt($request->password);
    }
}
