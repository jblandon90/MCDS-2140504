<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use Illuminate\Support\Facades\Validator;

use App\Exports\UserExport;
use App\Imports\UserImport;


class UserController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::all();
        $users = User::paginate(10);
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //dd($request->all());
        $user = new User;
        $user->fullname  = $request->fullname;
        $user->email     = $request->email;
        $user->phone     = $request->phone;
        $user->birthdate = $request->birthdate;
        $user->gender    = $request->gender;
        $user->address   = $request->address;
        if ($request->hasFile('photo')) {
            $file = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('imgs'), $file);
            $user->photo = 'imgs/'.$file;
        }
        $user->password  = bcrypt($request->password);

        if($user->save()) {
            return redirect('users')->with('message', 'El Usuario: '.$user->fullname.' fue Adicionado con Exito!');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //dd($user);
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        //dd($request->all());
        $user->fullname  = $request->fullname;
        $user->email     = $request->email;
        $user->phone     = $request->phone;
        $user->birthdate = $request->birthdate;
        $user->gender    = $request->gender;
        $user->address   = $request->address;
        if ($request->hasFile('photo')) {
            $file = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('imgs'), $file);
            $user->photo = 'imgs/'.$file;
        }

        if($user->save()) {
            return redirect('users')->with('message', 'El Usuario: '.$user->fullname.' fue Modificado con Exito!');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete()) {
            return redirect('users')->with('message', 'El Usuario: '.$user->fullname.' fue Eliminado con Exito!');
        } 
    }

    public function pdf() {
        $users = User::all();
        $pdf = \PDF::loadView('users.pdf', compact('users'));
        return $pdf->download('allusers.pdf');
    }

    public function excel() {
        return \Excel::download(new UserExport, 'allusers.xlsx');
    }

    public function import(Request $request) {
        $file = $request->file('file');
        \Excel::import(new UserImport, $file);
        return redirect()->back()->with('message', 'Usuarios importados con exito!');
    }

    public function search(Request $request) {
        $users = User::names($request->q)->orderBy('id','ASC')->paginate(10);
        return view('users.search')->with('users', $users);
    }

    // Customer UPD
    public function customerupd(Request $request, $id)
    {
        Validator::make($request->all(), [
            'fullname'  => 'required',
            'email'     => 'required|email|unique:users,email,'.$request->id,
            'phone'     => 'required|numeric',
            'birthdate' => 'required|date',
            'gender'    => 'required',
            'address'   => 'required',
            'photo'     => 'max:1000',
        ],
        [
            'fullname.required'  => 'El campo "Nombre Completo" es obligatorio.',
            'email.required'     => 'El campo "Correo Electrónico" es obligatorio.',
            'phone.required'     => 'El campo "Número Telefónico" es obligatorio.',
            'birthdate.required' => 'El campo "Fecha de Nacimiento" es obligatorio.',
            'gender.required'    => 'El campo "Genero" es obligatorio.',
            'address.required'   => 'El campo "Dirección" es obligatorio.',
        ])->validate();

        //dd($request->all());
        $user = User::find($id);
        $user->fullname  = $request->fullname;
        $user->email     = $request->email;
        $user->phone     = $request->phone;
        $user->birthdate = $request->birthdate;
        $user->gender    = $request->gender;
        $user->address   = $request->address;
        if ($request->hasFile('photo')) {
            $file = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('imgs'), $file);
            $user->photo = 'imgs/'.$file;
        }

        if($user->save()) {
            return redirect('home')->with('message', 'Mis Datos fueron Modificados con Exito!');
        } 
    }

}