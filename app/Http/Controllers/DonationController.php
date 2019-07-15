<?php

namespace App\Http\Controllers;

use App\Donation;
use Carbon\Carbon;
use DB;
use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DonationController extends Controller
{
    /** @var Container */
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     * @throws BindingResolutionException
     */
    public function index(Request $request)
    {
        $builder = $this->getBuilder();
        $search = (string)$request->get('search');

        if ($search !== '') {
            $builder->where(function (Builder $query) use ($search) {
                $search = '%' . $search . '%';
                $query
                    ->where('name', 'like', $search)
                    ->orWhere('email', 'like', $search)
                    ->orWhere('message', 'like', $search);
            });
        }

        $minAmount = $request->get('min_amount');

        if (!is_null($minAmount)) {
            $minAmount = round((float)$minAmount, 2);
            $builder->where('donation_amount', '>=', $minAmount);
        }

        $maxAmount = $request->get('max_amount');

        if (!is_null($maxAmount)) {
            $maxAmount = round((float)$maxAmount, 2);
            $builder->where('donation_amount', '<=', $maxAmount);
        }

        $minDate = $request->get('min_date');

        if (!is_null($minDate)) {
            $builder->whereDate('created_at', '>=', (string)$minDate);
        }

        $maxDate = $request->get('max_date');

        if (!is_null($maxDate)) {
            $builder->whereDate('created_at', '<=', (string)$maxDate);
        }

//        DB::enableQueryLog();
        $donates = $builder->paginate(10);

        $totalAmountData = DB::table('donations')
            ->selectRaw('name, SUM(donation_amount) as TotalAmount')
            ->groupBy('name')
            ->orderByDesc('TotalAmount')
            ->first()
        ;

        $currentDate = Carbon::now();

        $builder = $this->getBuilder();
        $currentMonthAmount = $builder
            ->selectRaw('SUM(donation_amount) as monthly_amount_sum')
            ->whereYear('created_at', $currentDate->year)
            ->whereMonth('created_at', $currentDate->month)
            ->first()
        ;

        $builder = $this->getBuilder();
        $allTimeAmount = $builder
            ->sum('donation_amount')
        ;

//        dd((array)$totalAmountData);

//        dd(DB::getQueryLog());

        return view('pages.welcome', [
            'donates' => $donates->appends($request->except('page')),
            'top' => (array)$totalAmountData,
            'month' => $currentMonthAmount->toArray(),
            'allTime' => $allTimeAmount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required', 'string', 'max:50'],
            'email'=>['required', 'string', 'email', 'max:255', 'unique:donations'],
            'donationAmount'=>['required', 'regex:/\d+(\.\d{1,2})?$/'],
            'message'=>['required', 'string', 'max:3000']
        ]);

        Donation::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'donation_amount'=> $request->get('donationAmount'),
            'message' => $request->get('message')
        ]);
        return redirect('/donates')->with('success', 'Donation accepted, thank you!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $donate = Donation::find($id);

        return view('pages.loupe', ['donate' => $donate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $donate = Donation::find($id);

        if (!$donate) {
            return redirect(route('donates.create'));
        }

        return view('pages.create-edit', ['donate' => $donate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>['required', 'string', 'max:50'],
            'email'=>['required', 'string', 'email', 'max:255', 'unique:donations,email,' . $id],
            'donationAmount'=>['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'message'=>['required', 'string', 'max:3000']
        ]);

        Donation::where('id', $id)->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'donation_amount'=> $request->get('donationAmount'),
            'message' => $request->get('message')
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Donation::where('id', $id)->delete();

        return redirect()->back();
    }

    /**
     * @return Builder
     * @throws BindingResolutionException
     */
    private function getBuilder(): Builder
    {
        return $this->container->make(Donation::class)->newModelQuery();
    }
}
