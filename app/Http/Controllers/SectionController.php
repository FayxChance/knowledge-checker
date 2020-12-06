<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        return Section::all();
    }

    public function show($id)
    {
        return User::find($id)->personalSections;
    }

    public function store(Request $request)
    {
        return Section::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $section = Section::findOrFail($id);
        $section->update($request->all());

        return $section;
    }

    public function delete(Request $request, $id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        return 204;
    }
}
