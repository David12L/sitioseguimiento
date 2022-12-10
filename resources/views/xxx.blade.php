<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <!-- <x-jet-welcome /> -->
@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Página de lista</h1>
@endsection

@section('seccion')
    @if(session('msj'))
        <div class="alert alert-success">
            {{ session('msj') }}
        </div>
    @endif

    <form action="{{ route('Estudiante.xRegistrar') }}" method="post" class="d-grid gap-2">
        @csrf

        @error('codEst')
            <div class="alert alert-danger">
                El código es requerido
            </div>
        @enderror

        @error('nomEst')
            <div class="alert alert-danger">
                El nombre es requerido
            </div>
        @enderror

        @if($errors ->has('apeEst'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong>apellido</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <select name="praMod1" class="form-control mb-2">
            <option value="">Seleccione... sobre la práctica modular 1...</option>
            <option value="0">No hizo nada</option>
            <option value="1">Proceso</option>
            <option value="2">Haciendo informe / termino</option>
            <option value="3">Solicito constancia</option>
            <option value="4">Ya tiene constancia de prácticas</option>
        </select>
        
        <select name="praMod2" class="form-control mb-2">
            <option value="">Seleccione... sobre la práctica modular 2...</option>
            <option value="0">No hizo nada</option>
            <option value="1">Proceso</option>
            <option value="2">Haciendo informe / termino</option>
            <option value="3">Solicito constancia</option>
            <option value="4">Ya tiene constancia de prácticas</option>
        </select>
        <select name="praMod3" class="form-control mb-2">
            <option value="">Seleccione... sobre la práctica modular 3...</option>
            <option value="0">No hizo nada</option>
            <option value="1">Proceso</option>
            <option value="2">Haciendo informe / termino</option>
            <option value="3">Solicito constancia</option>
            <option value="4">Ya tiene constancia de prácticas</option>
        </select>
        <input type="text" name="udMod1" placeholder="Número de U.D. desaprobado en Módulo 1" value="{{ old('udMod1') }}" class="form-control mb-2">
        <input type="text" name="udMod2" placeholder="Número de U.D. desaprobado en Módulo 2" value="{{ old('udMod2') }}" class="form-control mb-2">
        <input type="text" name="udMod3" placeholder="Número de U.D. desaprobado en Módulo 3" value="{{ old('udMod3') }}" class="form-control mb-2">
        <select name="cerIdi" class="form-control mb-2">
            <option value="">Seleccione... sobre la práctica modular 3...</option>
            <option value="0">No hizo nada</option>
            <option value="1">Proceso</option>
            <option value="2">Termino</option>
            <option value="3">Solicito certificado</option>
            <option value="4">Ya tiene certificado de idiomas</option>
        </select>
        <select name="modTit" class="form-control mb-2">
            <option value="">Seleccione... sobre la modalidad de titulacion...</option>
            <option value="0">No responde</option>
            <option value="1">Por proyecto productivo</option>
            <option value="2">Por sufiencia académica</option>
            <option value="3">Ya tiene título</option>
        </select>
        <input type="date" name="fecDet" placeholder="Fecha detalle" value="{{ old('codEst') }}" class="form-control mb-2">
        <select name="estDet" class="form-control mb-2">
            <option value="">Seleccione estado del detalle...</option>
            <option value="0">Inactivo</option>
            <option value="1">Activo</option>
        </select>
        <button class="btn btn-primary" type="submit">Agregar</button>
    </form>

    <br>
    <h3>Lista. Estamos en pág. {{ $xAlumnosDetalle->correctPage()}} de {{ $xAlumnosDetalle->count() }} </h3>

    <table class="table">
        <thead class="table-dark">
            <tr> 
                <th scope="col">Id</th>
                <th scope="col">Práctica modular 1</th>
                <th scope="col">Certificado de idioma</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($xAlumnosDetalle as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->praMod1 }}</td>
                <td>
                    <a href="{{ route('Estudiante.xDetalle', $item->id ) }}">
                        {{ $item->apeEst }}, {{ $item->nomEst }}
                    </a>
                </td>
                <td>
                    <form action="{{ route('Estudiante.xEliminar',  $item->id) }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">x</button>
                    </form>
                    <a class="btn btn-warning btn-sm" href="{{ route('Estudiante.xActualizar', $item->id ) }}">
                        ...A
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $xAlumnosDetalle->links() }}
    
@endsection
            </div>
        </div>
    </div>
</x-app-layout>
