<?php

namespace App\Http\Controllers;

use App\Noticia;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Http\Request;
use PHPUnit\Framework\Error\Notice;

class NoticiaController extends Controller
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
        // $noticias_count = Noticia::count();
        $noticias = Noticia::orderBy('id', 'DESC')->get();


        // dd(empty($noticias));
        // dd($noticias);



        return view('noticias.index', [
            'page' => 'notices',
            'noticias' => $noticias
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
        return view('noticias.create', [
            'page' => 'notices'
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
            'title' => 'required|min:5',
            'noticia' => 'required',
            'image' => 'mimes:jpeg,bmp,png',
            'status' => 'required|in:DRAFT,PUBLISHED'
        ]);

        $user_id = \Auth::user()->id;
        $name = $request->input('title');
        $body = $request->input('noticia');
        $image = $request->file('image');
        $status = $request->input('status');



        $noticia = new Noticia();
        $noticia->user_id = $user_id;
        $noticia->name = $name;
        $noticia->body = $body;
        $noticia->status = $status;

        if ($image) {
            $image_path = time() . $image->getClientOriginalName();
            \Storage::disk('notices_images')->put($image_path, \File::get($image));
            $noticia->file = $image_path;
        }
        $noticia->save();


        return redirect()->route('noticias.index')
            ->with('info', 'Entrada creada con exito!!');
    }


    public function getImage($filename)
    {
        $file = \Storage::disk('notices_images')->get($filename);
        return new Response($file, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        // dd($noticia);
        return view('noticias.show', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        //
        return view('noticias.edit', compact('noticia'));
    }


    public function main_section()
    {


        // $noticias = Noticia::orderBy('id', 'DESC')->get();
        $noticias = Noticia::orderBy('id', 'DESC')->where('status','!=','DRAFT')->get();




        // dd();

        // dd(sizeof($noticias));

        return view('welcome', [
            'page' => 'welcome',
            'noticias' => $noticias
        ]);
    }


    public function show_users_notices()
    {
        $noticias = Noticia::orderBy('id', 'DESC')->get();
        return view('users.notices.show_notices', [
            'page' => 'notices',
            'noticias' => $noticias
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validateData = $this->validate($request, [
            'title' => 'required|min:5',
            'noticia' => 'required',
            'image' => 'mimes:jpeg,bmp,png',
            'status' => 'required|in:DRAFT,PUBLISHED'
        ]);

        $name = $request->input('title');
        $body = $request->input('noticia');
        $image = $request->file('image');
        $status = $request->input('status');

        $noticia = Noticia::where('id', '=', $id)->first();

        if (count((array)$noticia) >= 1) {
            $noticia->name = $name;
            $noticia->body = $body;
            $noticia->status = $status;

            if ($image) {
                $image_path = time() . $image->getClientOriginalName();
                \Storage::disk('notices_images')->put($image_path, \File::get($image));
                $noticia->file = $image_path;
            }

            $noticia->update();
        }
        return redirect()->route('noticias.edit', $noticia)
            ->with('info', 'Noticia editada con exito!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        return back()->with('info', 'Eliminado correctamente!!');
    }
}
