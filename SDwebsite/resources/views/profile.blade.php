@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit My Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update-profile') }}">
                        @csrf

                        @method('PUT')

                        <div class="form-group row">
                            <label for="Full Name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input name= "name" id="name" type="text" value = "{{ $user->name }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="Address" class="col-md-4 col-form-label text-md-right">{{ __('Address 1') }}</label>

                            <div class="col-md-6">
                                <input name = "address1" id="address1" type="text" value = "{{ $user->address1 }}" >

                                @error('Address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<!-- DONT FORGET TO ADD USER ADDRESS AND EVERYTHING TO USER TABLE 
                        <div class="form-group row">
                            <label for="Address2" class="col-md-4 col-form-label text-md-right">{{ __('Address 2') }}</label>

                            <div class="col-md-6">
                                <input id="Address" type="text" >

                                @error('Address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="City" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="City" type="text" >

                                @error('Address')
                                    <span class="invalid-feedback" role="alert" value = "">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="State" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <input id="State" type="text" >

                                @error('State')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <Label class="col-md-4 col-form-label text-md-right">ZIP Code</Label>
                           

                            <div class="col-md-6">
                                 <input type="text" pattern="[0-9]{5}" title="Five digit zip code" />

                                @error('Zipcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('SUBMIT') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
