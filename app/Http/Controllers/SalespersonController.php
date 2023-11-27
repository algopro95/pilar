<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSalespersonRequest;
use App\Http\Requests\UpdateSalespersonRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\SalespersonRepository;
use Illuminate\Http\Request;
use Flash;

class SalespersonController extends AppBaseController
{
    /** @var SalespersonRepository $salespersonRepository*/
    private $salespersonRepository;

    public function __construct(SalespersonRepository $salespersonRepo)
    {
        $this->salespersonRepository = $salespersonRepo;
    }

    /**
     * Display a listing of the Salesperson.
     */
    public function index(Request $request)
    {
        $salespeople = $this->salespersonRepository->paginate(10);

        return view('salespeople.index')
            ->with('salespeople', $salespeople);
    }

    /**
     * Show the form for creating a new Salesperson.
     */
    public function create()
    {
        return view('salespeople.create');
    }

    /**
     * Store a newly created Salesperson in storage.
     */
    public function store(CreateSalespersonRequest $request)
    {
        $input = $request->all();

        $salesperson = $this->salespersonRepository->create($input);

        Flash::success('Salesperson saved successfully.');

        return redirect(route('salespeople.index'));
    }

    /**
     * Display the specified Salesperson.
     */
    public function show($id)
    {
        $salesperson = $this->salespersonRepository->find($id);

        if (empty($salesperson)) {
            Flash::error('Salesperson not found');

            return redirect(route('salespeople.index'));
        }

        return view('salespeople.show')->with('salesperson', $salesperson);
    }

    /**
     * Show the form for editing the specified Salesperson.
     */
    public function edit($id)
    {
        $salesperson = $this->salespersonRepository->find($id);

        if (empty($salesperson)) {
            Flash::error('Salesperson not found');

            return redirect(route('salespeople.index'));
        }

        return view('salespeople.edit')->with('salesperson', $salesperson);
    }

    /**
     * Update the specified Salesperson in storage.
     */
    public function update($id, UpdateSalespersonRequest $request)
    {
        $salesperson = $this->salespersonRepository->find($id);

        if (empty($salesperson)) {
            Flash::error('Salesperson not found');

            return redirect(route('salespeople.index'));
        }

        $salesperson = $this->salespersonRepository->update($request->all(), $id);

        Flash::success('Salesperson updated successfully.');

        return redirect(route('salespeople.index'));
    }

    /**
     * Remove the specified Salesperson from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $salesperson = $this->salespersonRepository->find($id);

        if (empty($salesperson)) {
            Flash::error('Salesperson not found');

            return redirect(route('salespeople.index'));
        }

        $this->salespersonRepository->delete($id);

        Flash::success('Salesperson deleted successfully.');

        return redirect(route('salespeople.index'));
    }
}
