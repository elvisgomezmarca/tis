<?php

namespace App\Http\Controllers\Admin;

use App\Announcement;
use App\Area;
use App\Http\Requests\AnnouncementRequest;
use Carbon\Carbon;
use Cassandra\Date;
use http\Client\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        $announcements = $user->announcements;

        if ($user->hasRole(['Admin', 'Calificador']))
            $announcements = Announcement::all();

        return view('admin.announcements.index', [ 'announcements' => $announcements ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();

        $announcements = DB::table('areas')->get();
        if ($announcements->isEmpty())
            return redirect(route('admin.areas.index'))->with([ 'message' => 'Para crear convocatoria debe tener areas disponibles!', 'alert-type' => 'info' ]);

        return view('admin.announcements.create', [ 'areas' => $areas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementRequest $request)
    {
        $announcements = DB::table('areas')->get();
        if ($announcements->isEmpty())
            return redirect(route('admin.areas.index'))->with([ 'message' => 'Para crear convocatoria debe tener areas disponibles!', 'alert-type' => 'info' ]);


        $announcement = new Announcement($request->all());
        $announcement->start_date_announcement = new Carbon($request->start_date_announcement);
        $announcement->end_date_announcement = new Carbon($request->end_date_announcement);
        $announcement->start_date_calification = new Carbon($request->start_date_calification);
        $announcement->end_date_calification = new Carbon($request->end_date_calification);
        $announcement->code = Str::random(6);

        $announcement->save();

        $areas = Area::find($request->areas);

        $announcement->areas()->attach($areas);

        return redirect(route('admin.announcements.index'))->with([ 'message' => 'Convocatoria creado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Display the specified code.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        return response()->json($announcement);
    }

    /**
     * Compare the specified code.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function compare(Request $request, Announcement $announcement)
    {
        if (!$request->code || !$announcement->exists()){
            return response()->json([ 'message' => 'Error de datos enviados' ]);
            //return redirect(route('home.announcements'))->with([ 'message' => 'Error!', 'alert-type' => 'info' ]);
        }

        if ($request->code != $announcement->code) {
            return response()->json([ 'error' => 'El codigo no coincide', 'code' => 400 ]);
            //return redirect(route('home.announcements'))->with([ 'message' => 'Codigo incorrecto!', 'alert-type' => 'info' ]);
        }

        $user = Auth::user();

        $announcement->postulants()->attach($user);

        return response()->json([ 'code' => 200, 'announcement' => $announcement]);

        //return redirect(route('admin.announcements.index'))->with([ 'message' => 'Bienvenido a esta convocatoria!', 'alert-type' => 'info' ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement = Announcement::find($id);

        $areas = Area::all();

        return view('admin.announcements.edit', [ 'announcement' => $announcement ,'areas' => $areas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnnouncementRequest $request, $id)
    {
        $announcement = Announcement::find($id);

        $announcement->update($request->all());
        $announcement->save();

        $announcement->areas()->detach();

        $areas = Area::find($request->areas);

        $announcement->areas()->attach($areas);

        return redirect(route('admin.announcements.index'))->with([ 'message' => 'Convocatoria actualizado exitosamente!', 'alert-type' => 'info' ]);
    }

    /**
     * Update the specified code in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCode(Request $request, Announcement $announcement)
    {
        $announcement->code = $request->code;
        $announcement->save();

        return response()->json($announcement);
    }

    /**
     * view the specified requirements in announcement.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function requirement(Announcement $announcement)
    {
        return view('admin.announcements.requirements.requirement_postulant',
            [ 'announcement' => $announcement ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
