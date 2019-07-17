<?php

namespace App\Services;

use App\Repositories\Donation\DonationRepository;

class MonthlyAmountRetriever
{
    /** @var DonationRepository */
    private $repository;

    public function __construct(DonationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return float
     */
    public function monthlyAmount(): float
    {
        $monthData = $this->repository->monthlyAmount();

        return (float)reset($monthData);
    }
}
