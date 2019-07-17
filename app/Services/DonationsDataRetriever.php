<?php

namespace App\Services;

use App\Repositories\Donation\DonationRepository;

class DonationsDataRetriever
{
    /** @var MonthlyAmountRetriever */
    private $monthlyAmountRetriever;

    /** @var TopDonatorRetriever */
    private $topDonatorRetriever;

    /** @var DonationRepository */
    private $donationRepository;


    public function __construct(
        MonthlyAmountRetriever $monthlyAmountRetriever,
        TopDonatorRetriever $topDonatorRetriever,
        DonationRepository $donationRepository
    )
    {
        $this->monthlyAmountRetriever = $monthlyAmountRetriever;
        $this->topDonatorRetriever = $topDonatorRetriever;
        $this->donationRepository = $donationRepository;
    }
    

}
