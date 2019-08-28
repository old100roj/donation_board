<?php

namespace App\Structures;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DonationsData
{
    /** @var TopDonator */
    public $topDonator;

    /** @var float */
    public $mounthlyAmount;

    /** @var float */
    public $allTimeAmount;

    /** @var LengthAwarePaginator */
    public $donations;

    /** @var array */
    public $paginationBlock = [];
}
