<?php

namespace App\Http\Controllers;

use App\DataTables\TransferDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTransferRequest;
use App\Http\Requests\UpdateTransferRequest;
use App\Repositories\TransferRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Driver;
use App\Models\Category;
use App\Models\Forward;
use App\Models\Transfer;
use Illuminate\Support\Carbon;

class TransferController extends AppBaseController
{
    /** @var  TransferRepository */
    private $transferRepository;

    public function __construct(TransferRepository $transferRepo)
    {
        $this->transferRepository = $transferRepo;
    }

    /**
     * Display a listing of the Transfer.
     *
     * @param TransferDataTable $transferDataTable
     * @return Response
     */
    public function index(TransferDataTable $transferDataTable)
    {
        return $transferDataTable->render('transfers.index');
    }

    /**
     * Show the form for creating a new Transfer.
     *
     * @return Response
     */
    public function create()
    {
        $current = Carbon::now();

        $drivers = Driver::all();
        $forwards = Forward::all();
        $categories= Category::all();
        
        // dd( $drivers);
        return view('transfers.create', compact('drivers','categories', 'forwards'));

    }

    /**
     * Store a newly created Transfer in storage.
     *
     * @param CreateTransferRequest $request
     *
     * @return Response
     */
    public function store(CreateTransferRequest $request)
    {
        $input = $request->all();
        $file = $request->file('img');
        if (!empty($file)) {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            request()->img->move(public_path('/uploads/files/carts'), $filename);
            $input['img'] = $filename;
        }


        $transfer = $this->transferRepository->create($input);

        $transfer->categories()->attach(request('categories'));

        Flash::success('Transfer saved successfully.');

        return redirect(route('transfers.index'));
    }

    /**
     * Display the specified Transfer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transfer = $this->transferRepository->find($id);

        if (empty($transfer)) {
            Flash::error('Transfer not found');

            return redirect(route('transfers.index'));
        }

        return view('transfers.show')->with('transfer', $transfer);
    }

    /**
     * Show the form for editing the specified Transfer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $drivers = Driver::all();
        $categories = Category::all();
        $forwards = Forward::all();

        $transferCategIds = [];

        $transfer = $this->transferRepository->find($id);

        if (empty($transfer)) {
            Flash::error('Transfer not found');

            return redirect(route('transfers.index'));
        }

        foreach ($transfer->categories as $transCat) {
            $transferCategIds[] = $transCat->id;
        } 
        return view('transfers.edit',compact('transfer', 'drivers', 'forwards', 'categories', 'transferCategIds'));
    }

    /**
     * Update the specified Transfer in storage.
     *
     * @param  int              $id
     * @param UpdateTransferRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransferRequest $request)
    {
        // dd($request);
        $transfer = $this->transferRepository->find($id);

        if (empty($transfer)) {
            Flash::error('Transfer not found');

            return redirect(route('transfers.index'));
        }
        $oldimg = $transfer->img;
        $input = $request->all();
        $file = $request->file('img');
        if (!empty($file)) {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            request()->img->move(public_path('/uploads/files/carts'), $filename);
            $input['img'] = $filename;
        } else {
            $input['img'] = $oldimg;
        }
        $transfer->categories()->detach();
        $transfer->categories()->attach($request->categories);
    
        $transfer = $this->transferRepository->update($input, $id);


        Flash::success('Transfer updated successfully.');

        return redirect(route('transfers.index'));
    }

    /**
     * Remove the specified Transfer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transfer = $this->transferRepository->find($id);

        if (empty($transfer)) {
            Flash::error('Transfer not found');

            return redirect(route('transfers.index'));
        }

        $this->transferRepository->delete($id);

        Flash::success('Transfer deleted successfully.');

        return redirect(route('transfers.index'));
    }
}
