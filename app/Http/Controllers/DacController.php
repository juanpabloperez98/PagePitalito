<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dac;
use App\Subcategory;
use Symfony\Component\HttpFoundation\Response;



class DacController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index', 'create']]);
    }

    public function index()
    {
        $dac = Dac::orderBy('id', 'asc')->get();
        return view('DAC.index', [
            'dacs' => $dac
        ]);
    }

    public function create()
    {
        return view('dac.create');
    }

    public function store(Request $request)
    {
        $validateData = $this->validate($request, [
            "category" => 'required',
            "subcategory" => 'required',
            "name" => 'required|min:5',
            "cell_phone" => 'required|min:5',
            "address" => 'required|min:5',
            "email" => 'required|email|min:5',
            "link" => 'required',
            "image" => 'required|mimes:jpeg,bmp,png'
        ]);
        $dac = new Dac();
        // $dac->category = $request->category;
        // $dac->subcategory = $request->subcategory;
        $dac->name = $request->name;
        $dac->cell_phone = $request->cell_phone;
        $dac->address = $request->address;
        $dac->email = $request->email;
        $dac->link_socialnetwork = $request->link;
        if ($request->image) {
            $image_path = time() . $request->image->getClientOriginalName();
            \Storage::disk('dac_images')->put($image_path, \File::get($request->image));
            $dac->path = $image_path;
        }
        $dac->subcategory_id = $request->subcategory;
        $dac->save();
        return redirect()->route('dac.index')
            ->with('info', 'Registro creado con exito!!');
    }

    public function show($id)
    {
        $dac = Dac::where('id', $id)->first();
        return view('dac.show', [
            'dac' => $dac
        ]);
    }

    public function index_users()
    {
        $dacs = Dac::orderBy('id', 'asc')->get();
        return view('dac.index_users', [
            'dacs' => $dacs
        ]);
    }

    public function getImage($filename)
    {
        $file = \Storage::disk('dac_images')->get($filename);
        return new Response($file, 200);
    }

    public function get_subcategories(Request $request)
    {
        if ($request->ajax()) {
            $subcategories = Subcategory::where('category_id', $request->category)->get();
            return response()->json($subcategories);
        }
    }

    public function search(Request $request)
    {

        if ($request->category != 'default') {
            $dacs = Dac::where('name', 'LIKE', '%' . $request->name . '%')
                ->whereHas('subcategory', function ($q) use ($request) {
                    $q->where('id', $request->subcategory);
                })->get();
        } else {
            $dacs = Dac::where('name', 'LIKE', '%' . $request->name . '%')->get();
        }
        return view('dac.index_users', [
            'dacs' => $dacs
        ]);
    }
}
