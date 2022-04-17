<?php

namespace Vanguard\Repositories\EquipmentSold;

interface EquipmentSoldRepository
{

    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function paginate($perPage, $search = null);
}