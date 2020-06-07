<?php

namespace App\Http\Controllers\Admin;

use App\Announcement;
use App\File;
use App\Requirement;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PostulantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Announcement $announcement)
    {
        $postulants = $announcement->postulants;

        return View('admin.postulants.index', [ 'announcement' => $announcement, 'postulants' => $postulants ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement, User $postulant)
    {
        return View('admin.postulants.show', [ 'announcement' => $announcement, 'postulant' => $postulant ]);
    }

    /**
     * Checked file requirement.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checked(Announcement $announcement, User $postulant, Requirement $requirement)
    {
        $file = File::where('user_id', $postulant->id)
            ->where('requirement_id', $requirement->id)->first();

        if (!isset($file))
            return response()->json(['code' => 404, 'message' => 'no existe el registro']);

        if ($file->checked)
            $file->checked = 0;
        else
            $file->checked = 1;

        $file->save();

        return response()->json(['code' => 200, 'message' => 'Archivo Validado', 'data' => $file]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
