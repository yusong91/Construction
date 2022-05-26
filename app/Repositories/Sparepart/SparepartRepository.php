<?php

namespace Vanguard\Repositories\Sparepart;

interface SparepartRepository
{
    public function all();
    public function find($id);
    
    public function update($id, array $data);
    public function delete($id);
    public function paginate($perPage, $search = null);
}