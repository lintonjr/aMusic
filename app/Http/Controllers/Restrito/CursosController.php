<?php

namespace Amusic\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use Amusic\Http\Controllers\Controller;
use Amusic\Models\Curso;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::paginate(15);

        return view('cursos.index')->with(['cursos' => $cursos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = new Curso();
        return view('cursos.form')->with(['cursos' => $cursos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Curso::create($request->all());
        return response()->redirectToRoute('cursos.index')
        ->with(['mensagem' => 'Curso salvo com Sucesso!', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cursos = Curso::find($id);

        return view('cursos.form')->with([
          'cursos' => $cursos,
      ]);
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
        $cursos = Curso::findOrFail($id);
        $cursos->update($request->all());
        return response()->redirectToRoute('cursos.index')
            ->with(['message' => 'Curso editado com sucesso!', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cursos = Curso::findOrFail($id);
        $cursos->delete();
        return response()->redirectToRoute('cursos.index', compact('cursos'));
    }

    public function alterarStatus($id)
    {

      $cursos = Curso::findOrFail($id);

      $cursos->status = $cursos->status == 0 ? 1 : 0;

      $cursos->save();

      return redirect()->route('cursos.index');

    }
}
