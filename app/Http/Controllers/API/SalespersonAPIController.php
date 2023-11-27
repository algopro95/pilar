<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSalespersonAPIRequest;
use App\Http\Requests\API\UpdateSalespersonAPIRequest;
use App\Models\Salesperson;
use App\Repositories\SalespersonRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class SalespersonAPIController
 */
class SalespersonAPIController extends AppBaseController
{
    private SalespersonRepository $salespersonRepository;

    public function __construct(SalespersonRepository $salespersonRepo)
    {
        $this->salespersonRepository = $salespersonRepo;
    }

    /**
     * Display a listing of the Salespeople.
     * GET|HEAD /salespeople
     */
    public function index(Request $request): JsonResponse
    {
        $salespeople = $this->salespersonRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($salespeople->toArray(), 'Salespeople retrieved successfully');
    }

    /**
     * Store a newly created Salesperson in storage.
     * POST /salespeople
     */
    public function store(CreateSalespersonAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $salesperson = $this->salespersonRepository->create($input);

        return $this->sendResponse($salesperson->toArray(), 'Salesperson saved successfully');
    }

    /**
     * Display the specified Salesperson.
     * GET|HEAD /salespeople/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Salesperson $salesperson */
        $salesperson = $this->salespersonRepository->find($id);

        if (empty($salesperson)) {
            return $this->sendError('Salesperson not found');
        }

        return $this->sendResponse($salesperson->toArray(), 'Salesperson retrieved successfully');
    }

    /**
     * Update the specified Salesperson in storage.
     * PUT/PATCH /salespeople/{id}
     */
    public function update($id, UpdateSalespersonAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Salesperson $salesperson */
        $salesperson = $this->salespersonRepository->find($id);

        if (empty($salesperson)) {
            return $this->sendError('Salesperson not found');
        }

        $salesperson = $this->salespersonRepository->update($input, $id);

        return $this->sendResponse($salesperson->toArray(), 'Salesperson updated successfully');
    }

    /**
     * Remove the specified Salesperson from storage.
     * DELETE /salespeople/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Salesperson $salesperson */
        $salesperson = $this->salespersonRepository->find($id);

        if (empty($salesperson)) {
            return $this->sendError('Salesperson not found');
        }

        $salesperson->delete();

        return $this->sendSuccess('Salesperson deleted successfully');
    }
}
