<?php

namespace App\Http\Controllers;

use App\Deporte;
use App\Horario;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;


class DeporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }


    public function index()
    {
        //

        $deportes = Deporte::orderBy('id', 'asc')->get();

        return view('deportes.index', [
            'page' => 'deportes',
            'deportes' => $deportes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $horarios = Horario::all();
        return view('deportes.create', [
            'page' => 'deportes',
            'horarios' => $horarios
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
        //
        $validateData = $this->validate($request, [
            'name' => 'required|min:5',
            'image' => 'mimes:jpeg,bmp,png',
            'in_charge' => 'required|min:5',
            'profile' => 'required|min:5',
        ]);

        $name = $request->input('name');
        $in_charge = $request->input('in_charge');
        $profile = $request->input('profile');
        $image = $request->file('image');

        $deporte = new Deporte();
        $deporte->name = $name;
        $deporte->in_charge = $in_charge;
        $deporte->profile = $profile;

        if ($image) {
            $image_path = time() . $image->getClientOriginalName();
            \Storage::disk('deportes_images')->put($image_path, \File::get($image));
            $deporte->file = $image_path;
        }
        $deporte->save();
        return redirect()->route('deportes.index')
            ->with('info', 'Deporte creada con exito!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deporte  $deporte
     * @return \Illuminate\Http\Response
     */
    public function show(Deporte $deporte)
    {
        //


        return view('deportes.show', [
            'page' => 'deportes',
            'deporte' => $deporte
        ]);
    }

    public function getImage($filename)
    {
        $file = \Storage::disk('deportes_images')->get($filename);
        return new Response($file, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deporte  $deporte
     * @return \Illuminate\Http\Response
     */
    public function edit(Deporte $deporte)
    {
        //
        return view('deportes.edit', compact('deporte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deporte  $deporte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $validateData = $this->validate($request, [
            'name' => 'required|min:5',
            'image' => 'mimes:jpeg,bmp,png',
            'in_charge' => 'required|min:5',
            'profile' => 'required|min:5',
        ]);

        $name = $request->input('name');
        $in_charge = $request->input('in_charge');
        $profile = $request->input('profile');
        $image = $request->file('image');

        $deporte = Deporte::where('id', '=', $id)->first();


        
        if (count((array)$deporte) >= 1) {
            // dd($deporte);
            $deporte->name = $name;
            $deporte->in_charge = $in_charge;
            $deporte->profile = $profile;

            if ($image) {
                $image_path = time() . $image->getClientOriginalName();
                \Storage::disk('deportes_images')->put($image_path, \File::get($image));
                $deporte->file = $image_path;
            }

            $deporte->update();
        }
        return redirect()->route('deportes.edit', $deporte)
            ->with('info', 'Deporte editado con exito!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deporte  $deporte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deporte $deporte)
    {
        //
    }
}
