@extends('layouts.app')

@section('content')
    <div class="row px-2">
        @if(array_key_exists('TotalAmount', $top) && array_key_exists('name', $top))
            <div class="card m-1 text-white bg-primary col-md" style="width: 18rem">
                <div class="text-center">
                    <p>Top Donator</p>
                    <h3>{{$top['TotalAmount']}}$</h3>
                    <p>{{$top['name']}}</p>
                </div>
            </div>
        @endif
        <div class="card m-1 text-white bg-success col-md" style="width: 18rem">
            <div class="text-center">
                <p>Last Month Amount</p>
                <h3>{{$month['monthly_amount_sum']}}$</h3>
            </div>
        </div>
        <div class="card m-1 text-white bg-danger col-md" style="width: 18rem">
            <div class="text-center">
                <p>All Time Amount</p>
                <h3>{{$allTime}}$</h3>
            </div>
        </div>
    </div>

    <table  class="table table-striped table-dark">
        <thead>
        <tr class="row m-0">
            <th class="d-inline-block col-2">Donator Name</th>
            <th class="d-inline-block col-3">Email</th>
            <th class="d-inline-block col-1">Amount</th>
            <th class="d-inline-block col-2">Message</th>
            <th class="d-inline-block col-2">Date</th>
            <th class="d-inline-block col-2">Actions</th>
        </tr>

        </thead>
        <tbody>
            @foreach($donates as $donate)
                <tr class="row m-0">
                    <td class="d-inline-block col-2">{{$donate->name}}</td>
                    <td class="d-inline-block col-3">{{$donate->email}}</td>
                    <td class="d-inline-block col-1">{{$donate->donation_amount}}</td>
                    <td class="d-inline-block col-2">{{$donate->message}}</td>
                    <td class="d-inline-block col-2">{{$donate->created_at}}</td>
                    <td class="d-inline-block col-2">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ route('donates.show', $donate->id) }}" class="btn btn-secondary">
                                    <span class="fa fa-search-plus" title="loupe"></span>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('donates.edit', $donate->id) }}" class="btn btn-primary">
                                    <span class="fa fa-pencil-alt" title="pencil"></span>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <form action="{{ route('donates.destroy', $donate->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">
    {{ $donates->links() }}
    </div>
@endsection
