<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Estudiantedetalle;

class PagesController extends Controller
{
    public function fnIndex(){
        return view('welcome');
    }

    public function fnEstDetalle($id){
        $xDetAlumnos = Estudiante::findOrFail($id);     //Datos de BD por Id
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function fnEstActualizar($id){
        $xActAlumnos = Estudiante::findOrFail($id);     //Datos de BD por Id
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    public function fnUpdate(Request $request, $id){

        $xUpdateAlumnos = Estudiante::findOrFail($id);

        $xUpdateAlumnos -> codEst = $request -> codEst;
        $xUpdateAlumnos -> nomEst = $request -> nomEst;
        $xUpdateAlumnos -> apeEst = $request -> apeEst;
        $xUpdateAlumnos -> fnaEst = $request -> fnaEst;
        $xUpdateAlumnos -> modMat = $request -> modMat;
        $xUpdateAlumnos -> turMat = $request -> turMat;
        $xUpdateAlumnos -> semMat = $request -> semMat;
        $xUpdateAlumnos -> estMat = $request -> estMat;

        $xUpdateAlumnos -> save();          //Guardando en BD

        //$xAlumnos = Estudiante1::all();                   //Datos de BD
        //return view('pagLista', compact('xAlumnos'));     //Equivalente
        return back()->with('msj','Se actualizo con éxito...');        
    }

    public function fnRegistrar(Request $request){
        //return $request;          //Verificando datos recibidos

        $request -> validate([
            'codEst'=>'required',
            'nomEst'=>'required',
            'apeEst'=>'required',
            'fnaEst'=>'required',
            'modMat'=>'required',
            'turMat'=>'required',
            'semMat'=>'required',
            'estMat'=>'required'
        ]);

        $nuevoEstudiante = new Estudiante;

        $nuevoEstudiante -> codEst = $request -> codEst;
        $nuevoEstudiante -> nomEst = $request -> nomEst;
        $nuevoEstudiante -> apeEst = $request -> apeEst;
        $nuevoEstudiante -> fnaEst = $request -> fnaEst;
        $nuevoEstudiante -> modMat = $request -> modMat;
        $nuevoEstudiante -> turMat = $request -> turMat;
        $nuevoEstudiante -> semMat = $request -> semMat;
        $nuevoEstudiante -> estMat = $request -> estMat;

        $nuevoEstudiante -> save();         //Guardando en BD

        //return view('pagLista');          //Equivalente sin mensaje
        return back()->with('msj','Se registro con éxito...');
    }

    public function fnEliminar($id){
        $deleteAlumno = Estudiante::findOrFail($id);     //Datos de BD por Id
        $deleteAlumno->delete();
        return back()->with('msj','Se elimino con éxito...');
    }
    
    public function fnLista(){
        //$xAlumnos = Estudiante1::all();     //Datos de BD
        $xAlumnos = Estudiante::paginate(4);     //Datos de BD
        return view('dashboard', compact('xAlumnos'));
    }

    public function fnGaleria($numero=0){
        //return view('pagGaleria', ['valor' => $numero, 'otro' => 25]);
        $valor=$numero;
        $otro=25;
        return view('pagGaleria', compact('valor', 'otro'));
    }

    ////////////////////////////////////////////////////////////////////
    /////////////////////// DETALLE ////////////////////////////////////
    ////////////////////////////////////////////////////////////////////

    public function fnListaDetalle(){
        $xAlumnosDetalle = Estudiantedetalle::paginate(4);     //Datos de BD
        return view('pagListadetalle', compact('xAlumnosDetalle'));
    }
}