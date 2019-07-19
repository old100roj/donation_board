<?php

namespace App\Services;

use App\Repositories\Donation\DonationRepository;
use App\Structures\TopDonator;

class TopDonatorRetriever
{
    private const TOTAL_AMOUNT_KEY = 'TotalAmount';
    private const NAME_KEY = 'name';

    /** @var DonationRepository */
    private $repository;

    public function __construct(DonationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return TopDonator
     */
    public function topDonator(): TopDonator
    {
        $topDonatorData = $this->repository->topDonator();
        $topDonator = new TopDonator();

        if (array_key_exists(self::TOTAL_AMOUNT_KEY, $topDonatorData)) {
            $topDonator->amount = $topDonatorData[self::TOTAL_AMOUNT_KEY];
        }

        if (array_key_exists(self::NAME_KEY, $topDonatorData)) {
            $topDonator->name = $topDonatorData[self::NAME_KEY];
        }

        return $topDonator;
    }
}
