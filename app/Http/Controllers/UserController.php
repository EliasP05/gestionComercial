<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Models\Tipo;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios=User::with('tipo')->get();
        return view('user',['usuarios'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos=Tipo::get();
        return view('usuarios.create',['user' => new User],['tipos'=>$tipos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveUserRequest $request)
    {
        User::create($request->validated());

        session()->flash('status','Usuario registrado');
        return redirect()->route('usuarios');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user)
    {
        $usuario= User::with('tipo')->find($user);

        $tipos=Tipo::where('tip_id','!=',$usuario->tip_id)->get();
        return view('usuarios.edit',['user'=>$usuario],['tipos'=>$tipos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveUserRequest $request, User $user)
    {
        $user->update($request->validated());

        session()->flash('status','Usuario Acualizado');
        return redirect()->route('usuarios');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        
        session()->flash('status','Registro Eliminado');
        return redirect()->route('usuarios');
    }
    public function generarPdf(){
        $usuarios=User::with('tipo')->get();
        $pdf=Pdf::loadView('usuarios.pdf', compact('usuarios'));
        //return $pdf->download('reporteUser.pdf');
        return view('usuarios.pdf',['usuarios'=>$usuarios]);
    }
}
