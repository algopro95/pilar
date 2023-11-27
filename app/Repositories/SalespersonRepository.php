<?php

namespace App\Repositories;

use App\Models\Salesperson;
use App\Repositories\BaseRepository;

class SalespersonRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'sales_person_name',
        'address',
        'contact'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Salesperson::class;
    }
}
