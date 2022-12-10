<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Página de lista</h1>
@endsection

@section('seccion')
    <h3> Detalle estudiante </h3>
    
    <p> Id:                     {{ $xDetAlumnos->id }} </p>
    <p> Código:                 {{ $xDetAlumnos->codEst }} </p>
    <p> Apellidos y nombres:    {{ $xDetAlumnos->apeEst }}, {{ $xDetAlumnos->nomEst }}</p>
    <p> Fecha de nacimiento:    {{ $xDetAlumnos->fnaEst }} </p>
    <p> Turno:                  {{ $xDetAlumnos->turMat }} </p>
    <p> Semestre:               {{ $xDetAlumnos->semMat }} </p>
    <p> Estado de matricula:    {{ $xDetAlumnos->estMat }} </p>

@endsection

            </div>
        </div>
    </div>
</x-app-layout>
