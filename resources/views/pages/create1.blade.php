@extends('layouts.app')

@section('content')
    <div class="custom-bs">
        <div class="col-sm-8 offset-sm-2">
            <h1>Donate</h1>
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
                    <form  action="{{route('donates.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="align-self">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required/>
                        </div>

                        <div class="form-group">
                            <label for="email" class="align-self">{{ __('Email') }}</label>
                            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required/>
                        </div>

                        <div class="form-group">
                            <label for="donationAmount" class="align-self">{{ __('Amount $') }}</label>
                            <input id="donationAmount" class="form-control" name="donationAmount" value="{{ old('donationAmount') }}" required/>
                        </div>

                        <div class="form-group">
                            <label for="message" class="align-self">{{ __('Message') }}</label>
                            <textarea id="name" class="form-control" name="message"     required>{{ old('message') }}</textarea>
                        </div>

                        <div class="form-group">
                            <button id="donationBtn" type="submit" class="btn btn-outline-success">Save changes</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
