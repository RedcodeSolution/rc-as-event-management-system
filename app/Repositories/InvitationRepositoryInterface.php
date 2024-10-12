<?php

namespace App\Repositories;

interface InvitationRepositoryInterface
{
    public function getAllPaginated($perPage);
    public function create(array $data);
    public function findById($id);
    public function getByStatus($status);
    public function updateStatus($id, $status);
}
