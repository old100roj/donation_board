<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface AbstractInterface
 * @package App\Repositories
 */
interface BaseRepositoryInterface
{
    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * @param int $id
     * @param array $data
     * @return int
     */
    public function update(int $id, array $data): int;

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id): int;

    /**
     * @param int $id
     * @return Model
     */
    public function find(int $id): Model;
}
