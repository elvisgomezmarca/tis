<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostulantRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostulantController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('postulant_register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostulantRequest $request)
    {
        $postulant = new User($request->all());
        $postulant->password = (bcrypt($postulant->ci));
        $postulant->save();

        $postulant->syncRoles(['Comisión conocimiento']);
        // $postulant->assignRole(['Postulante']);

        return redirect(route('login'))->with([ 'message' => 'Usuario creado exitosamente!', 'alert-type' => 'success' ]);
    }

}
