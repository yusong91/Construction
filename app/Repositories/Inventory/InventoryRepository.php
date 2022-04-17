<?php

namespace Vanguard\Repositories\Inventory;

interface InventoryRepository
{

    public function all();
    public function find($id);
    public function create($spare_id, array $data);
    public function update($id, array $data);
    public function delete($id);
    public function paginate($perPage, $search = null);
}