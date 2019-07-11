@extends('layouts.app')

@section('content')
    @method('GET')
    <div class="card text-center">
        <div class="card-header">
            {{ $donate->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $donate->email }}</h5>
            <h5 class="card-title">{{$donate->donation_amount}}$</h5>
            <p class="card-text">{{ $donate->message }}</p>
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('donates.edit', $donate->id) }}" class="btn btn-primary">
                        <span class="fa fa-pencil-alt" title="pencil"></span>
                    </a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('donates.destroy', $donate->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">
                            <span class="fa fa-trash"></span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
