<?php

namespace Vanguard\Repositories\Equipment;

interface EquipmentRepository
{

    public function paginate($perPage, $search = null);
    public function find($id);
    public function create($type_id, array $data);
    public function update($id, array $data);
    public function delete($id);
    public function paginateList($id, $perPage, $search = null);
    public function outstanding($key);

}