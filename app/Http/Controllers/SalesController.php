<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\SalesRepository;
use Illuminate\Http\Request;
use Flash;

class SalesController extends AppBaseController
{
    /** @var SalesRepository $salesRepository*/
    private $salesRepository;

    public function __construct(SalesRepository $salesRepo)
    {
        $this->salesRepository = $salesRepo;
    }

    /**
     * Display a listing of the Sales.
     */
    public function index(Request $request)
    {
        $sales = $this->salesRepository->paginate(10);

        return view('sales.index')
            ->with('sales', $sales);
    }

    /**
     * Show the form for creating a new Sales.
     */
    public function create()
    {
        return view('sales.create');
    }

    /**
     * Store a newly created Sales in storage.
     */
    public function store(CreateSalesRequest $request)
    {
        $input = $request->all();

        $sales = $this->salesRepository->create($input);

        Flash::success('Sales saved successfully.');

        return redirect(route('sales.index'));
    }

    /**
     * Display the specified Sales.
     */
    public function show($id)
    {
        $sales = $this->salesRepository->find($id);

        if (empty($sales)) {
            Flash::error('Sales not found');

            return redirect(route('sales.index'));
        }

        return view('sales.show')->with('sales', $sales);
    }

    /**
     * Show the form for editing the specified Sales.
     */
    public function edit($id)
    {
        $sales = $this->salesRepository->find($id);

        if (empty($sales)) {
            Flash::error('Sales not found');

            return redirect(route('sales.index'));
        }

        return view('sales.edit')->with('sales', $sales);
    }

    /**
     * Update the specified Sales in storage.
     */
    public function update($id, UpdateSalesRequest $request)
    {
        $sales = $this->salesRepository->find($id);

        if (empty($sales)) {
            Flash::error('Sales not found');

            return redirect(route('sales.index'));
        }

        $sales = $this->salesRepository->update($request->all(), $id);

        Flash::success('Sales updated successfully.');

        return redirect(route('sales.index'));
    }

    /**
     * Remove the specified Sales from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sales = $this->salesRepository->find($id);

        if (empty($sales)) {
            Flash::error('Sales not found');

            return redirect(route('sales.index'));
        }

        $this->salesRepository->delete($id);

        Flash::success('Sales deleted successfully.');

        return redirect(route('sales.index'));
    }
}
