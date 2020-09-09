<?php

namespace App\Http\Controllers;

use App\Section;
use App\User;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sections = Section::select()->paginate(10);

      return view('section.index',[
        'sections' => $sections
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $users = User::all();

      return view('section.create',[
        'users' => $users,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->flash();

      $request->validate([
        'name'=>'required',
        // 'description'=>'required',
      ]);

      $section = Section::create($request->all());

      return redirect(route('section.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
      $users = User::all();
      $attached_users = $section->users->modelKeys();

      return view('section.edit',[
        'section' => $section,
        'users' => $users,
        'attached_users' => $attached_users,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
      $request->validate([
        'name'=>'required',
        'users'=>'array',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $section->fill($request->all());
      if ($request->logo) {
        $logo_name = $section['id'].'.jpeg';

        $request->logo->storeAs('logo',$logo_name,'public');
        $section->logo = $logo_name;
      }
      $section->users()->sync($request->get('users'));

      $section->save();

      return redirect(route('section.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
      $section->users()->detach();

      if ($section->logo) {
        \Illuminate\Support\Facades\Storage::disk('public')->delete('logo/'.$section->logo);
      }

      $section->delete();

      return redirect(route('section.index'));
    }
}
