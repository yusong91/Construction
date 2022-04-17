<?php

namespace Vanguard\Repositories\Supplier;

interface SupplierRepository
{

    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function paginate($perPage, $search = null);
}