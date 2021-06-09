<?php

namespace App\Http\Controllers;

use App\Efd;
use App\Instructor;
use App\Schedule;
use App\Efd_Schedule;
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

        $deportes = Efd::orderBy('id', 'asc')->get();


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
        // $horarios = Horario::all();
        // $instructors = Instructor::orderBy('id', 'asc')->get();

        // var_dump($instructors);
        // die();

        return view('deportes.create', [
            'page' => 'deportes'
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

        // var_dump($request->prueba);
        // die();
        $validateData = $this->validate($request, [
            'modality' => 'required|min:5',
            'image' => 'mimes:jpeg,bmp,png',
            'instructor' => 'required',
            'schedule1' => 'required',
        ]);

        $array_schedules = [];

        $total_schedules = intval($request->input('totalhorarios'));

        for ($i = 1; $i <= $total_schedules; $i++){
            $index = "schedule".$i;
            $schedule = intval($request->input($index));
            array_push($array_schedules,$schedule);
        }


        $name = $request->input('modality');

        
        $instructor = $request->input('instructor');
        $image = $request->file('image');

        $deporte = new Efd();
        $deporte->modality = $name;
        $deporte->instructor_id = intval($instructor);

        if ($image) {
            $image_path = time() . $image->getClientOriginalName();
            \Storage::disk('deportes_images')->put($image_path, \File::get($image));
            $deporte->path = $image_path;
        }

        $deporte->save();

        $new_deporte = Efd::orderBy("id","desc")->first();

        foreach($array_schedules as $schedule){
            $efd_schedule = new Efd_Schedule();
            $efd_schedule->efd_id = $new_deporte->id;
            $efd_schedule->schedule_id = $schedule;
            $efd_schedule->save();
        }

        return redirect()->route('deportes.index')
            ->with('info', 'Deporte creada con exito!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deporte  $deporte
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $deporte =  Efd::where('id',$id)->first();

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

    public function save_schudele(Request $request){
        if($request->ajax()) {
            $day = $request->input('day');
            
            
            $start = explode(".",$request->input('start'));
            count($start) == 1 ?  $start = $start[0].':00' : $start = $start[0].':30';
            $fin = explode(".",$request->input('finish'));
            count($fin) == 1 ?  $fin = $fin[0].':00' : $fin = $fin[0].':30';            
            $h_ = Schedule::where([
                ['day',$day],
                ['start',$start],
                ['end',$fin]
            ])->first();


            if(isset($h_) && !empty($h_)){
                return response()->json(['message' => 'Este horario ya ha sido creado!!','status'=>'400']);
            }else{
                $horario = new Schedule();
                $horario->day = $day;
                $horario->start = $start;
                $horario->end = $fin;
                $horario->save();
                return response()->json(['message' => 'Horario creado con exito!!','status'=>'200']);
            }
        }
    }

    public function show_schudele(Request $request){
        if($request->ajax()) {
            $horarios = Schedule::all();
            $html = "";
            foreach ($horarios as $horario) {
                $html = $html.'<option id = '. $horario->id .'>'.$horario->day.' '.$horario->start.' - '.$horario->end.'</option>';
            }
            // $html_entities = htmlentities($html);
            $html_entities = $html;
            // return response()->json(['html' => 'Este horario ya ha sido creado!!','status'=>'400']); 
            return $html_entities;          
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deporte  $deporte
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $deporte = Efd::where("id",$id)->first();
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
            'modality' => 'required|min:5',
            'image' => 'mimes:jpeg,bmp,png',
            'instructor' => 'required',
            'schedule1' => 'required',
        ]);

        $array_schedules = [];

        $total_schedules = intval($request->input('totalhorarios'));

        for ($i = 1; $i <= $total_schedules; $i++){
            $index = "schedule".$i;
            $schedule = intval($request->input($index));
            array_push($array_schedules,$schedule);
        }


        $name = $request->input('modality');
        $instructor = $request->input('instructor');
        $image = $request->file('image');

        $deporte = Efd::find($id);
        $deporte->modality = $name;
        $deporte->instructor_id = intval($instructor);

        if ($image) {
            $image_path = time() . $image->getClientOriginalName();
            \Storage::disk('deportes_images')->put($image_path, \File::get($image));
            $deporte->path = $image_path;
        }

        $deporte->save();

        $new_deporte = Efd::orderBy("id","desc")->first();

        // Eliminar anteriores
        $schedules = Efd_Schedule::where("efd_id",$new_deporte->id)->get();
        foreach($schedules as $schedule){
            $schedule->delete();
        }

        foreach($array_schedules as $schedule){
            $efd_schedule = new Efd_Schedule();
            $efd_schedule->efd_id = $new_deporte->id;
            $efd_schedule->schedule_id = $schedule;
            $efd_schedule->save();
        }

        return redirect()->route('deportes.index')
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
