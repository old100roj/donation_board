@extends('layouts.app')

@section('content')
    <div class="custom-bs">
        <div class="col-sm-8 offset-sm-2">
            <h1>@if (isset($donate)) Edit @else Make @endif Donate</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form method="post" action="@if(isset($donate)) {{route('donates.update', ['donate' => $donate->id])}} @else {{route('donates.store')}} @endif">
                        @if(isset($donate))
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="name" class="align-self">{{ __('Name') }}</label>
                            <input
                                id="name"
                                type="text"
                                class="form-control"
                                name="name"
                                value="@if (!is_null(old('name'))) {{old('name')}} @elseif (isset($donate)) {{$donate->name}} @endif"
                                required
                            />
                        </div>
                        <div class="form-group">
                            <label for="email" class="align-self">{{ __('Email') }}</label>
                            <input
                                id="email"
                                type="text"
                                class="form-control"
                                name="email"
                                value="@if (!is_null(old('email'))) {{old('email')}} @elseif (isset($donate)) {{$donate->email}} @endif"
                                required
                            />
                        </div>

                        <div class="form-group">
                            <label for="donationAmount" class="align-self">{{ __('Amount $') }}</label>
                            <input
                                id="donationAmount"
                                class="form-control"
                                name="donationAmount"
                                value="@if (!is_null(old('donationAmount'))) {{old('donationAmount')}} @elseif (isset($donate)) {{$donate->donation_amount}} @endif"
                                required
                            />

                        </div>

                        <div class="form-group">
                            <label for="message" class="align-self">{{ __('Message') }}</label>
                            <textarea
                                id="name"
                                class="form-control"
                                name="message"
                                required
                            >@if (!is_null(old('message'))) {{old('message')}} @elseif (isset($donate)) {{$donate->message}} @endif</textarea>
                        </div>

                        <div class="form-group">
                            <button id="donationBtn" type="submit" class="btn btn-outline-success">Save changes</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
