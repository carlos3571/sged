<?php

namespace App\Http\Controllers;

use App\Models\Participacion;
use App\Models\Evento;
use App\Models\Equipo;
use Illuminate\Http\Request;

class ParticipacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participaciones = Participacion::with(['evento', 'equipo'])->get();
        return view('participaciones.index', compact('participaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventos = Evento::all();
        $equipos = Equipo::all();
        return view('participaciones.create', compact('eventos', 'equipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'evento_id' => 'required|exists:eventos,id',
            'equipo_id' => 'required|exists:equipos,id',
            'resultado' => 'nullable|string|max:255',
            'premios' => 'nullable|string|max:255',
        ]);

        Participacion::create($request->all());

        return redirect()->route('participaciones.index')->with('success', 'Participación registrada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $participacion = Participacion::with(['evento', 'equipo'])->findOrFail($id);
        return view('participaciones.show', compact('participacion'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $participacion = Participacion::findOrFail($id);
        $eventos = Evento::all();
        $equipos = Equipo::all();
        return view('participaciones.edit', compact('participacion', 'eventos', 'equipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'evento_id' => 'required|exists:eventos,id',
            'equipo_id' => 'required|exists:equipos,id',
            'resultado' => 'nullable|string|max:255',
            'premios' => 'nullable|string|max:255',
        ]);

        $participacion = Participacion::findOrFail($id);
        $participacion->update($request->all());

        return redirect()->route('participaciones.index')->with('success', 'Participación actualizada correctamente.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participacion = Participacion::findOrFail($id);
        $participacion->delete();

        return redirect()->route('participaciones.index')->with('success', 'Participación eliminada.');
    }
}
