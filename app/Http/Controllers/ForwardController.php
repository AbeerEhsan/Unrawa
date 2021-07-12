<?php

namespace App\Http\Controllers;

use App\DataTables\ForwardDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateForwardRequest;
use App\Http\Requests\UpdateForwardRequest;
use App\Repositories\ForwardRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ForwardController extends AppBaseController
{
    /** @var  ForwardRepository */
    private $forwardRepository;

    public function __construct(ForwardRepository $forwardRepo)
    {
        $this->forwardRepository = $forwardRepo;
    }

    /**
     * Display a listing of the Forward.
     *
     * @param ForwardDataTable $forwardDataTable
     * @return Response
     */
    public function index(ForwardDataTable $forwardDataTable)
    {
        return $forwardDataTable->render('forwards.index');
    }

    /**
     * Show the form for creating a new Forward.
     *
     * @return Response
     */
    public function create()
    {
        return view('forwards.create');
    }

    /**
     * Store a newly created Forward in storage.
     *
     * @param CreateForwardRequest $request
     *
     * @return Response
     */
    public function store(CreateForwardRequest $request)
    {
        $input = $request->all();

        $forward = $this->forwardRepository->create($input);

        Flash::success('Forward saved successfully.');

        return redirect(route('forwards.index'));
    }

    /**
     * Display the specified Forward.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $forward = $this->forwardRepository->find($id);

        if (empty($forward)) {
            Flash::error('Forward not found');

            return redirect(route('forwards.index'));
        }

        return view('forwards.show')->with('forward', $forward);
    }

    /**
     * Show the form for editing the specified Forward.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $forward = $this->forwardRepository->find($id);

        if (empty($forward)) {
            Flash::error('Forward not found');

            return redirect(route('forwards.index'));
        }

        return view('forwards.edit')->with('forward', $forward);
    }

    /**
     * Update the specified Forward in storage.
     *
     * @param  int              $id
     * @param UpdateForwardRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateForwardRequest $request)
    {
        $forward = $this->forwardRepository->find($id);

        if (empty($forward)) {
            Flash::error('Forward not found');

            return redirect(route('forwards.index'));
        }

        $forward = $this->forwardRepository->update($request->all(), $id);

        Flash::success('Forward updated successfully.');

        return redirect(route('forwards.index'));
    }

    /**
     * Remove the specified Forward from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $forward = $this->forwardRepository->find($id);

        if (empty($forward)) {
            Flash::error('Forward not found');

            return redirect(route('forwards.index'));
        }

        $this->forwardRepository->delete($id);

        Flash::success('Forward deleted successfully.');

        return redirect(route('forwards.index'));
    }
}
