<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Services;

class BranchMasterModel extends Model
{
    protected $table = 'branch_master';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'business_id',
        'subdivision_code',
        'branch_name',
        'branch_slug',
        'branch_local_names',
        'timezone_code',
        'branch_type',
        'branch_address',
        'branch_postal_code',
        'branch_status',
        'created_by',
        'created_at',
        'updated_at'
    ];
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getBranches(int $businessId): array
    {
        $cache    = Services::cache();
        $cacheKey = 'branch-master-' . $businessId;
        if ($cache->get($cacheKey)) {
            return $cache->get($cacheKey);
        }
        $branches = $this->where('business_id', $businessId)->findAll();
        for ($i = 0; $i < count($branches); $i++) {
            $branches[$i]['branch_local_names'] = json_decode($branches[$i]['branch_local_names'], true);
        }
        $cache->save($cacheKey, $branches, CACHE_TTL);
        return $branches;
    }

}