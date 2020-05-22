<?php

namespace App\Http\Controllers;

use App\Personajes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

class PersonajesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['personajes']=Personajes::paginate(5);

        return view('personajes.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('personajes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $logs = new Controller;
        $logs->logs("Comparacion De Archivos", Auth::user()->id, Auth::user()->name);
        //
        //dd($request->Foto);
       /* $campos=[
           'Foto'=>'required|max:10000|mimes:jpeg,png,jpg',
           'Nombre'=>'required|string|max:100',
           'Apellido'=>'required|string|max:100',
           'Correo'=>'required|email',
           'Archivo'=>'required|max:20000|mimes:txt,csv',
           
       ];
       $Mensaje=["required"=>'El :attribute es requerido'];

       $this->validate($request,$campos,$Mensaje); */
       
       
        
        //$datospersonajes=request()->all();
        $datosPersonajes=request()->except('_token','_method');

       // Personajes::insert( $datosPersonajes);

       // return response()->json($datosPersonajes);
        

        $personajes = new Personajes();


        $personajes->Foto = $request->Foto;
        
        $personajes->Archivo = $request->Archivo;

        if ($request->hasFile('Foto')) {

            $personajes['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }
        if ($request->hasFile('Archivo')) {

            $personajes['Archivo'] = $request->file('Archivo')->store('uploads', 'public');
        }

        $personajes->save();

        
        $nombre1 = $personajes['Foto'];
        $nombre2 = $personajes['Archivo'];

        $rutaini = "storage/";
        $rut1 = $rutaini . '' . $nombre1;
        $rut2 = $rutaini . '' . $nombre2;

        if ($request->file('Foto')->getSize() == $request->file('Archivo')->getSize()) {
        $var = "los archivos tienen el mismo tamaño";
        } else {
        $var = "los archivos no tienen el mismo tamaño";
        }

        $archivo1contenido = file_get_contents($rut1);
        $archivo2contenido = file_get_contents($rut2);
        $filaa = explode("\n", $archivo1contenido);
        $filab = explode("\n", $archivo2contenido);
        $numerofilaa = count($filaa);
        $numerofilab = count($filab);
        $numfilaacontenido = $numerofilaa - 1;
        $numfilabcontenido = $numerofilab - 1;

        $diferenciadetallada = " ";
        if ($numerofilaa == $numerofilab) {
        $diferencia = "los archivos tienen " . $numfilabcontenido . " columnas y la informacion es la misma";

        for ($z= 0; $z< $numerofilaa; $z++) {

        $columna1 = explode(";", $filaa[$z]);
        $columna2 = explode(";", $filab[$z]);
        $titulo1 = explode(";", $filaa[0]);
        $titulo2 = explode(";", $filab[0]);
        $numcolumna1 = count($columna1);
        $numcolumna2 = count($columna2);

        for ($t= 0; $t< $numcolumna1; $t++) {

        if ($columna1[$t] != $columna2[$t]) {
        $diferencia = "los archivos tienen " . $numfilabcontenido . " columnas y la informacion es la misma";
        $diferenciadetallada .= " en la fila " . $z. " del archivo 1 " . $titulo1[$t] . " es " . $columna1[$t] . " y en el archivo 2 " . $titulo2[$t] . " es " . $columna2[$t];
        }
        }
        }
        } else {
        $diferencia = "los archivos no tienen  el mismo numero de registros, la informacion no es la misma el archivo 1 tiene  " . $numfilaacontenido . " registrosy el archivo 2 tiene " . $numfilabcontenido . " registros";
        
        if ($numerofilab>$numerofilaa){
            $y=$numerofilab;
        }else{
            $y=$numerofilaa;
        }
        for ($z= 0; $z< $y; $z++) {
        
        if (empty($filaa[$z])) {
        $columna1=0;
        }else{
        $columna1 = explode(";", $filaa[$z]);
        $numcolumna1 = count($columna1);
        }
        if (empty($filab[$z])) {
        $columna2=0;
        }else{
        $columna2 = explode(";", $filab[$z]);
        $numcolumna2 = count($columna2);
        }

        $titulo1 = explode(";", $filaa[0]);
        $titulo2 = explode(";", $filab[0]);

        if ($numcolumna2>$numcolumna1){
            $m=$numcolumna2;
        }else{
            $m=$numcolumna1;
        }

        for ($t= 0; $t< $m; $t++) {
        if (empty($columna1[$t])) {
        $var1="";
        }else{
        $var1=$columna1[$t];
        }
        if (empty($columna2[$t])) {
        $var2="";
        }else{
        $var2=$columna2[$t];
        }

        if ($var1 != $var2) {
        $diferenciadetallada .= " en la fila " . $z. " del archivo 1 " . $titulo1[$t] . " es " . $var1 . " y en el archivo 2 " . $titulo2[$t] . " es " . $var2;
        }
        }
        }
        }

        //@ $diferencia contiene la informacion relacionada al numero de filas
        //@ $contendtdiff contiene la informacion relacionada a la diferencia en el contenido del archivo
         
        
        dd($diferencia, $diferenciadetallada,$var);
    

        return redirect('personajes')->with('Mensaje', 'Empleado Agregado Con Exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personajes  $personajes
     * @return \Illuminate\Http\Response
     */
    public function show(Personajes $personajes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personajes  $personajes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $personajes=Personajes::findOrFail($id);

        return view('personajes.edit',compact('personajes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personajes  $personajes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $datosPersonajes=request()->except(['_token','_method']);

        

        if($request->hasFile('Foto')){

            $personajes=Personajes::findOrFail($id);

            Storage::delete('public/'.$personajes->Foto);

            $personajes['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Personajes::where('id','=',$id)->update($datosPersonajes);
        
        $personajes=Personajes::findOrFail($id);
        //return view('personajes.edit',compact('personajes'));
        return redirect('personajes')->with('Mensaje','Empleado Editado Con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personajes  $personajes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Personajes::destroy($id);

        return redirect('personajes')->with('Mensaje','Empleado Eliminado');
    }
}