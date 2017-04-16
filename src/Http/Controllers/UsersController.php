<?php

namespace Goszowski\Runsite\Http\Controllers;

use Goszowski\Runsite\Http\Controllers\RunsiteController;
use Goszowski\Runsite\Models\User\User;
use Goszowski\Runsite\Helpers\Alert;
use Illuminate\Http\Request;

class UsersController extends RunsiteController
{
    public function index()
    {
        $items = User::paginate();
        return view('runsite::users.index', compact('items'));
    }

    public function create(User $user)
    {
        return view('runsite::users.create', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('runsite::users.edit', compact('user'));
    }

    public function show()
    {
        return abort(404);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => 'required|max:255',
          'email' => 'required|email|unique:rs_users',
          'group_id' => 'required|exists:rs_user_groups,id',
        ]);

        $data = [
          'name' => $request->input('name'),
          'email' => $request->input('email'),
          'group_id' => $request->input('group_id'),
        ];

        if($request->input('password'))
        {
          $data['password'] = bcrypt($request->input('password'));
        }

        User::create($data);

        Alert::success(trans('runsite::main.created_successful'));

        return redirect()->route('runsite.users.index');
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
          'name' => 'required|max:255',
          'email' => 'required|email|unique:rs_users,email,'.$id,
          'group_id' => 'required|exists:rs_user_groups,id',
        ]);

        $data = [
          'name' => $request->input('name'),
          'email' => $request->input('email'),
          'group_id' => $request->input('group_id'),
        ];

        if($request->input('password'))
        {
          $data['password'] = bcrypt($request->input('password'));
        }

        User::find($id)->update($data);
        Alert::success(trans('runsite::main.updated_successful'));

        return redirect()->route('runsite.users.index');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        Alert::success(trans('runsite::main.deleted_successful'));
        return redirect()->route('runsite.users.index');
    }
}
