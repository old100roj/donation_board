<?php

namespace App\Repositories\Donation;

use App\Repositories\BaseRepository;
use App\Donation;
use App\Structures\SearchData;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class DonationRepository
 * @package App\Repositories\Donation
 */
class DonationRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Donation::class;
    }

    /**
     * @param SearchData $searchData
     * @param array $getParams
     * @return LengthAwarePaginator
     */
    public function search(SearchData $searchData, array $getParams): LengthAwarePaginator
    {
        $builder = $this->getBuilder();
        
        if ($searchData->search !== '') {
            $builder->where(function (Builder $query) use ($searchData) {
                $search = '%' . $searchData->search . '%';
                $query
                    ->where('name', 'like', $search)
                    ->orWhere('email', 'like', $search)
                    ->orWhere('message', 'like', $search);
            });
        }

        if ($searchData->minAmount > 0) {
            $builder->where('donation_amount', '>=', $searchData->minAmount);
        }
        
        if ($searchData->maxAmount != 0) {
            $builder->where('donation_amount', '<=', $searchData->maxAmount);
        }

        if ($searchData->minDate !== '') {
            $builder->whereDate('created_at', '>=', $searchData->minDate);
        }

        if ($searchData->maxDate !== '') {
            $builder->whereDate('created_at', '<=', $searchData->maxDate);
        }

        return $builder->paginate(10)->appends($getParams);
    }

    /**
     * @return array
     */
    public function topDonator(): array
    {
        return $this->getBuilder()
            ->selectRaw('name, SUM(donation_amount) as TotalAmount')
            ->groupBy('name')
            ->orderByDesc('TotalAmount')
            ->first()
            ->toArray()
        ;
    }

    /**
     * @return array
     */
    public function monthlyAmount(): array
    {
        $currentDate = Carbon::now();

        return $this->getBuilder()
            ->selectRaw('SUM(donation_amount) as monthly_amount_sum')
            ->whereYear('created_at', $currentDate->year)
            ->whereMonth('created_at', $currentDate->month)
            ->first()
            ->toArray()
        ;
    }

    /**
     * @return string
     */
    public function allTimeAmount(): string
    {
        return $this->getBuilder()->sum('donation_amount');
    }
}
