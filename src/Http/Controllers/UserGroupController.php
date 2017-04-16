<?php

namespace Goszowski\Runsite\Http\Controllers;

use Goszowski\Runsite\Http\Controllers\RunsiteController;
use Goszowski\Runsite\Models\User\Group;
use Goszowski\Runsite\Models\User\User;
use Goszowski\Runsite\Helpers\Alert;
use Illuminate\Http\Request;

class UserGroupController extends RunsiteController
{
    public function index()
    {
        $items = Group::paginate();
        return view('runsite::usergroups.index', compact('items'));
    }

    public function create(Group $group)
    {
        return view('runsite::usergroups.create', compact('group'));
    }

    public function edit($id)
    {
        $group = Group::find($id);
        return view('runsite::usergroups.edit', compact('group'));
    }

    public function show()
    {
        return abort(404);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => 'required|max:255|unique:rs_user_groups',
        ]);

        Group::create($request->all());
        Alert::success(trans('runsite::main.created_successful'));

        return redirect()->route('runsite.usergroups.index');
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
          'name' => 'required|max:255|unique:rs_user_groups,name,'.$id,
        ]);

        Group::find($id)->update($request->all());
        Alert::success(trans('runsite::main.updated_successful'));

        return redirect()->route('runsite.usergroups.index');
    }

    public function destroy($id)
    {
        User::where('group_id', $id)->delete();
        Group::find($id)->delete();
        Alert::success(trans('runsite::main.deleted_successful'));
        return redirect()->route('runsite.usergroups.index');
    }
}
