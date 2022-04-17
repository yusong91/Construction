<?php

namespace Vanguard\Repositories\Maintenance;

interface MaintenanceRepository
{
    public function all();
    public function findByKey($key);
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function paginate($perPage, $search = null);
}