<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'admin';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
      'uuid',
      'name',
      'mobile_no',
      'email_id',
      'password',
      'profile_image',
      'document',
      'role',
      'status',
      'created_by',
      'created_at'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['beforeInsert'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['beforeUpdate'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];



        protected function beforeInsert(array $data): array
        {
            return $this->getUpdatedDataWithHashedPassword($data);
        }

        protected function beforeUpdate(array $data): array
        {
            return $this->getUpdatedDataWithHashedPassword($data);
        }

        private function getUpdatedDataWithHashedPassword(array $data): array
        {
            if (isset($data['data']['password'])) {
                $plaintextPassword = $data['data']['password'];
                $data['data']['password'] = $this->hashPassword($plaintextPassword);
            }
            return $data;
        }

        private function hashPassword(string $plaintextPassword): string
        {
            return password_hash($plaintextPassword, PASSWORD_DEFAULT);
        }
}
