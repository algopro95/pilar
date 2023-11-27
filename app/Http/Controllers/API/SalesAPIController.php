<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSalesAPIRequest;
use App\Http\Requests\API\UpdateSalesAPIRequest;
use App\Models\Sales;
use App\Repositories\SalesRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class SalesAPIController
 */
class SalesAPIController extends AppBaseController
{
    private SalesRepository $salesRepository;

    public function __construct(SalesRepository $salesRepo)
    {
        $this->salesRepository = $salesRepo;
    }

    /**
     * Display a listing of the Sales.
     * GET|HEAD /sales
     */
    public function index(Request $request): JsonResponse
    {
        $sales = $this->salesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sales->toArray(), 'Sales retrieved successfully');
    }

    /**
     * Store a newly created Sales in storage.
     * POST /sales
     */
    public function store(CreateSalesAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $sales = $this->salesRepository->create($input);

        return $this->sendResponse($sales->toArray(), 'Sales saved successfully');
    }

    /**
     * Display the specified Sales.
     * GET|HEAD /sales/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Sales $sales */
        $sales = $this->salesRepository->find($id);

        if (empty($sales)) {
            return $this->sendError('Sales not found');
        }

        return $this->sendResponse($sales->toArray(), 'Sales retrieved successfully');
    }

    /**
     * Update the specified Sales in storage.
     * PUT/PATCH /sales/{id}
     */
    public function update($id, UpdateSalesAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Sales $sales */
        $sales = $this->salesRepository->find($id);

        if (empty($sales)) {
            return $this->sendError('Sales not found');
        }

        $sales = $this->salesRepository->update($input, $id);

        return $this->sendResponse($sales->toArray(), 'Sales updated successfully');
    }

    /**
     * Remove the specified Sales from storage.
     * DELETE /sales/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Sales $sales */
        $sales = $this->salesRepository->find($id);

        if (empty($sales)) {
            return $this->sendError('Sales not found');
        }

        $sales->delete();

        return $this->sendSuccess('Sales deleted successfully');
    }
}
