<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\{StoreTeamRequest, UpdateTeamRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;
use RealRashid\SweetAlert\Facades\Alert;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:team view')->only('index', 'show');
        $this->middleware('permission:team create')->only('create', 'store');
        $this->middleware('permission:team edit')->only('edit', 'update');
        $this->middleware('permission:team delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $teams = Team::query();

            return Datatables::of($teams)
                
                ->addColumn('photo', function ($row) {
                    if ($row->photo == null) {
                    return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                }
                    return asset('storage/uploads/photos/' . $row->photo);
                })

                ->addColumn('action', 'teams.include.action')
                ->toJson();
        }

        return view('teams.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request)
    {
        $attr = $request->validated();
        
        if ($request->file('photo') && $request->file('photo')->isValid()) {

            $path = storage_path('app/public/uploads/photos/');
            $filename = $request->file('photo')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('photo')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            $attr['photo'] = $filename;
        }

        Team::create($attr);

        return redirect()
            ->route('teams.index')
            ->with('success', __('The team was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        $attr = $request->validated();
        
        if ($request->file('photo') && $request->file('photo')->isValid()) {

            $path = storage_path('app/public/uploads/photos/');
            $filename = $request->file('photo')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('photo')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            // delete old photo from storage
            if ($team->photo != null && file_exists($path . $team->photo)) {
                unlink($path . $team->photo);
            }

            $attr['photo'] = $filename;
        }

        $team->update($attr);

        return redirect()
            ->route('teams.index')
            ->with('success', __('The team was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        try {
            $path = storage_path('app/public/uploads/photos/');

            if ($team->photo != null && file_exists($path . $team->photo)) {
                unlink($path . $team->photo);
            }

            $team->delete();

            return redirect()
                ->route('teams.index')
                ->with('success', __('The team was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('teams.index')
                ->with('error', __("The team can't be deleted because it's related to another table."));
        }
    }
}
