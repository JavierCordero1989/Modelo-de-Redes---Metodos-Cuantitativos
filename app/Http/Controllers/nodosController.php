<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatenodosRequest;
use App\Http\Requests\UpdatenodosRequest;
use App\Repositories\nodosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class nodosController extends AppBaseController
{
    /** @var  nodosRepository */
    private $nodosRepository;

    public function __construct(nodosRepository $nodosRepo)
    {
        $this->nodosRepository = $nodosRepo;
    }

    /**
     * Display a listing of the nodos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->nodosRepository->pushCriteria(new RequestCriteria($request));
        $nodos = $this->nodosRepository->all();

        return view('nodos.index')
            ->with('nodos', $nodos);
    }

    /**
     * Show the form for creating a new nodos.
     *
     * @return Response
     */
    public function create()
    {
        return view('nodos.create');
    }

    /**
     * Store a newly created nodos in storage.
     *
     * @param CreatenodosRequest $request
     *
     * @return Response
     */
    public function store(CreatenodosRequest $request)
    {
        $input = $request->all();

        $nodos = $this->nodosRepository->create($input);

        Flash::success('Nodos saved successfully.');

        return redirect(route('nodos.index'));
    }

    /**
     * Display the specified nodos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nodos = $this->nodosRepository->findWithoutFail($id);

        if (empty($nodos)) {
            Flash::error('Nodos not found');

            return redirect(route('nodos.index'));
        }

        return view('nodos.show')->with('nodos', $nodos);
    }

    /**
     * Show the form for editing the specified nodos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nodos = $this->nodosRepository->findWithoutFail($id);

        if (empty($nodos)) {
            Flash::error('Nodos not found');

            return redirect(route('nodos.index'));
        }

        return view('nodos.edit')->with('nodos', $nodos);
    }

    /**
     * Update the specified nodos in storage.
     *
     * @param  int              $id
     * @param UpdatenodosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatenodosRequest $request)
    {
        $nodos = $this->nodosRepository->findWithoutFail($id);

        if (empty($nodos)) {
            Flash::error('Nodos not found');

            return redirect(route('nodos.index'));
        }

        $nodos = $this->nodosRepository->update($request->all(), $id);

        Flash::success('Nodos updated successfully.');

        return redirect(route('nodos.index'));
    }

    /**
     * Remove the specified nodos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nodos = $this->nodosRepository->findWithoutFail($id);

        if (empty($nodos)) {
            Flash::error('Nodos not found');

            return redirect(route('nodos.index'));
        }

        $this->nodosRepository->delete($id);

        Flash::success('Nodos deleted successfully.');

        return redirect(route('nodos.index'));
    }
}
