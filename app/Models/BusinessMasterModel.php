<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Services;

class BusinessMasterModel extends Model
{
    protected $table = 'business_master';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'business_type_id',
        'business_name',
        'business_slug',
        'business_local_names',
        'country_code',
        'currency_code',
        'tax_percentage',
        'tax_inclusive',
        'mart_primary_color',
        'mart_text_color',
        'mart_background_color',
        'business_logo',
        'contract_anchor_day',
        'contract_expiry',
        'created_by',
        'created_at',
        'updated_at'
    ];
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    /**
     * @param string $businessSlug
     * @return array
     */
    public function getBusiness(string $businessSlug): array
    {
        $cache    = Services::cache();
        $cacheKey = 'business-master-' . $businessSlug;
        if ($cache->get($cacheKey)) {
            return $cache->get($cacheKey);
        }
        $business                         = $this->where('business_slug', $businessSlug)->first();
        $business['business_local_names'] = json_decode($business['business_local_names'], true);
        $branchModel                      = new BranchMasterModel();
        $business['branches']             = $branchModel->getBranches($business['id']);
        $cache->save($cacheKey, $business, CACHE_TTL);
        return $business;
    }
}