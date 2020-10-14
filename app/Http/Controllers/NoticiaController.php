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
    public function index()
    {
        //
        // $noticias_count = Noticia::count();
        $noticias = Noticia::orderBy('id','ASC')->get();


        // dd(empty($noticias));
        // dd($noticias);



        return view('noticias.index',[
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
        return view('noticias.create',[
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


        $validateData = $this->validate($request,[
            'title' => 'required|min:5',
            'slug' => 'required',
            'resumen' => 'required',
            'noticia' => 'required',
            'image' => 'mimes:jpeg,bmp,png',
            'status' => 'required|in:DRAFT,PUBLISHED'
        ]);

        $user_id = \Auth::user()->id;
        $name = $request->input('title');
        $slug = $request->input('slug');
        $excerpt = $request->input('resumen');
        $body = $request->input('noticia');
        $image = $request->file('image');
        $status = $request->input('status');



        $noticia = new Noticia();
        $noticia->user_id = $user_id;
        $noticia->name = $name;
        $noticia->slug = $slug;
        $noticia->excerpt = $excerpt;
        $noticia->body = $body;
        $noticia->status = $status;

        if($image){
            $image_path = time().$image->getClientOriginalName();
            \Storage::disk('images')->put($image_path, \File::get($image));
            $noticia->file = $image_path;
        }
        $noticia->save();


        return redirect()->route('noticias.index')
                ->with('info','Entrada creada con exito!!');


    }


    public function getImage($filename){
        $file = \Storage::disk('images')->get($filename);
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
        return view('noticias.show',compact('noticia'));
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        //
    }
}
