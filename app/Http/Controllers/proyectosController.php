<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateproyectosRequest;
use App\Http\Requests\UpdateproyectosRequest;
use App\Repositories\proyectosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class proyectosController extends AppBaseController
{
    /** @var  proyectosRepository */
    private $proyectosRepository;

    public function __construct(proyectosRepository $proyectosRepo)
    {
        $this->proyectosRepository = $proyectosRepo;
    }

    /**
     * Display a listing of the proyectos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->proyectosRepository->pushCriteria(new RequestCriteria($request));
        $proyectos = $this->proyectosRepository->all();

        return view('proyectos.index')
            ->with('proyectos', $proyectos);
    }

    /**
     * Show the form for creating a new proyectos.
     *
     * @return Response
     */
    public function create()
    {
        return view('proyectos.create');
    }

    /**
     * Store a newly created proyectos in storage.
     *
     * @param CreateproyectosRequest $request
     *
     * @return Response
     */
    public function store(CreateproyectosRequest $request)
    {
        $input = $request->all();

        $proyectos = $this->proyectosRepository->create($input);

        Flash::success('El proyecto se ha guardado correctamente.');

        return redirect(route('proyectos.index'));
    }

    /**
     * Display the specified proyectos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $proyectos = $this->proyectosRepository->findWithoutFail($id);

        if (empty($proyectos)) {
            Flash::error('Proyecto no encontrado');

            return redirect(route('proyectos.index'));
        }

        return view('proyectos.show')->with('proyectos', $proyectos);
    }

    /**
     * Show the form for editing the specified proyectos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $proyectos = $this->proyectosRepository->findWithoutFail($id);

        if (empty($proyectos)) {
            Flash::error('Proyecto no encontrado');

            return redirect(route('proyectos.index'));
        }

        return view('proyectos.edit')->with('proyectos', $proyectos);
    }

    /**
     * Update the specified proyectos in storage.
     *
     * @param  int              $id
     * @param UpdateproyectosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateproyectosRequest $request)
    {
        $proyectos = $this->proyectosRepository->findWithoutFail($id);

        if (empty($proyectos)) {
            Flash::error('Proyecto no encontrado');

            return redirect(route('proyectos.index'));
        }

        $proyectos = $this->proyectosRepository->update($request->all(), $id);

        Flash::success('El proyecto se ha modificado correctamente.');

        return redirect(route('proyectos.index'));
    }

    /**
     * Remove the specified proyectos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $proyectos = $this->proyectosRepository->findWithoutFail($id);

        if (empty($proyectos)) {
            Flash::error('Proyecto no encontrado');

            return redirect(route('proyectos.index'));
        }

        $this->proyectosRepository->delete($id);

        Flash::success('El proyecto se ha eliminado correctamente.');

        return redirect(route('proyectos.index'));
    }
}
