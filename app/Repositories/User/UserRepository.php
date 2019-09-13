<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Users;

class UserRepository extends BaseRepository
{
  /**
   * @return string
   */
  public function model(): string
  {
    return Users::class;
  }
}
