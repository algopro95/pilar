<?php

namespace App\Repositories;

use App\Models\Sales;
use App\Repositories\BaseRepository;

class SalesRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'sales_date',
        'product_id',
        'sales_amount',
        'sales_amount',
        'sales_person_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Sales::class;
    }
}
