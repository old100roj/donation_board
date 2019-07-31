<?php

namespace App\Services;

use App\Repositories\Donation\DonationRepository;
use App\Structures\DonationsData;
use App\Structures\PaginatedData;
use App\Structures\SearchData;

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

    public function getDonationData(SearchData $searchData, array $getParams, int $currentPage = 1): DonationsData
    {
        $donationsData = new DonationsData();
        $donationsData->topDonator = $this->topDonatorRetriever->topDonator();
        $donationsData->mounthlyAmount = $this->monthlyAmountRetriever->monthlyAmount();
        $donationsData->allTimeAmount = $this->donationRepository->allTimeAmount();
        $donationsData->donations = $this->donationRepository->search($searchData, $getParams);

        $paginatedData = new PaginatedData();
        $paginatedData->currentPage = ($currentPage > 0) ? $currentPage : 1;
        $paginatedData->lastPage = $donationsData->donations->lastPage();
        $paginatedData->records = $donationsData->donations->items();

        $donationsData->paginationBlock = PaginationHelper::generatePaginationBlock($paginatedData, '/donations?page=');

        return $donationsData;
    }

}
