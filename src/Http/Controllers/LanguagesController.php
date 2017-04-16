<?php

namespace Goszowski\Runsite\Http\Controllers;

use Goszowski\Runsite\Http\Controllers\RunsiteController;
use Goszowski\Runsite\Models\Language;
use Goszowski\Runsite\Helpers\Alert;
use Illuminate\Http\Request;

class LanguagesController extends RunsiteController
{
    public function index()
    {
        $items = Language::paginate();
        return view('runsite::languages.index', compact('items'));
    }

    public function create(Language $language)
    {
        return view('runsite::languages.create', compact('language'));
    }

    public function edit($id)
    {
        $language = Language::find($id);
        return view('runsite::languages.edit', compact('language'));
    }

    public function show()
    {
        return abort(404);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'locale' => 'required|max:255|unique:rs_languages',
          'display_name' => 'required|max:255',
        ]);

        Language::create([
          'locale' => $request->input('locale'),
          'country_code' => $request->input('country_code'),
          'display_name' => $request->input('display_name'),
          'is_active' => $request->input('is_active') ? true : false,
        ]);

        Alert::success(trans('runsite::main.created_successful'));

        return redirect()->route('runsite.languages.index');
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
          'locale' => 'required|max:255|unique:rs_languages,locale,'.$id,
          'display_name' => 'required|max:255',
        ]);

        Language::find($id)->update([
          'locale' => $request->input('locale'),
          'country_code' => $request->input('country_code'),
          'display_name' => $request->input('display_name'),
          'is_active' => $request->input('is_active') ? true : false,
        ]);
        Alert::success(trans('runsite::main.updated_successful'));

        return redirect()->route('runsite.languages.index');
    }

    public function destroy($id)
    {
        Language::find($id)->delete();
        Alert::success(trans('runsite::main.deleted_successful'));
        return redirect()->route('runsite.languages.index');
    }
}
