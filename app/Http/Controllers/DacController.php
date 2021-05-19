<?php

namespace App\Http\Controllers;

use App\Category;
use App\Dac;
use App\Subcategory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class DacController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index','create']]);
    }

    public function index()
    {   
        $dac = Dac::orderBy('id', 'asc')->get();
        return view('DAC.index', [
            'dacs' => $dac
        ]);
    }

    public function show_alls()
    {   
        $dac = Dac::orderBy('id', 'asc')->get();
        return view('DAC.user_index', [
            'dacs' => $dac
        ]);
    }

    public function get_subcategories(Request $request){
        if($request->ajax()) {
            $subcategories = Subcategory::where('category_id',$request->category)->get();
            return response()->json($subcategories);
        }
    }

    public function filter(Request $request){
        // Recibimos parametros
        // die();
        if(isset($request->name)){
            $name_filter = $request->name;
        }
        if(isset($request->category)){
            $category_filter = $request->name;
        }
        if(isset($request->subcategory)){
            $subcategory_filter = $request->name;
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('dac.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $dac->category_id = $request->category;
        $dac->save();
        return redirect()->route('DAC.index')
            ->with('info', 'Registro creado con exito!!');

    }

    public function getImage($filename)
    {
        $file = \Storage::disk('dac_images')->get($filename);
        return new Response($file, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dac  $dac
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
    }
    public function update(Request $request, $id)
    {
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dac  $dac
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }


    
}
