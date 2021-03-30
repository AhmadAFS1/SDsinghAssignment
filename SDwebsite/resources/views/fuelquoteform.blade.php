

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Fuel Quote') }}</div>

                <div class="card-body">
                    <form oninput="result.value = parseInt(Suggested_Price.value)*parseInt(Gallons.value)"   method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="Gallons" class="col-md-4 col-form-label text-md-right">{{ __('Gallons Requested') }}</label>

                            <div class="col-md-6">
                                <input name ="Gallons" id = "Gallons" type="number" pattern = "[0-9]">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Address" class="col-md-4 col-form-label text-md-right">{{ __('Full Delivery Address') }}</label>

                            <div class="col-md-6">
                                @auth

                                    
                                    @if(empty(auth()->user()->address1) || empty(auth()->user()->city) || empty(auth()->user()->zipcode))
                                        <output name ="Address" value = "{{ auth()->user()->address1 }}">
                                        
                                            <p>Full Address not given!
                                            <br>
                                            Using Texas Price ($5) as default
                                            </p>
                                        </output>
                                    
                                     @else
                                        
                                        <output name = "Address" value = "{{ auth()->user()->address1 }}">
                                            {{ auth()->user()->address1 }}
                                            {{ auth()->user()->city}} ,
                                            {{ auth()->user()->state}} 
                                            {{ auth()->user()->zipcode}}
                                        </output>
                                    
                                     @endif
                                        
                                        
                                    
                                @else
                                    <p>You are a guest!
                                    <br>
                                    Using Texas Price ($5) as default</p>
                                @endauth

                                @error('Address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- INSERT DATE PICKER HERE -->
                        <div class="form-group row">
                            <label for="start" class="col-md-4 col-form-label text-md-right">{{ __('Delivery date') }}</label>
                        
                            <div class="col-md-6">
                                <input type="date" name ="start" name="trip-start" value="2021-01-2" min="2021-01-01" max="2021-12-31">
                                
                                @error('Date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        
                        <div class="form-group row">
                            <label for="Price" class="col-md-4 col-form-label text-md-right">{{ __('Suggested Price/Gallon') }}</label>

                            <div class="col-md-6">


                                @auth
                                    
                                    @if((auth()->user()->state) == "TX")
                                    <output name ="Suggested_Price" id = "Suggested_Price" type="text" pattern = "[0-9]">5</output>
                                    
                                    @else
                                    <output name ="Suggested_Price" id = "Suggested_Price" type="text" pattern = "[0-9]">8</output> 
                                       
                                    
                                    @endif
                                    
                                   
                                    
                                
                                @endauth
                               

                                @error('Suggested_Price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Due" class="col-md-4 col-form-label text-md-right">{{ __('Total Amount Due') }}</label>

                            <div class="col-md-6">
                                <output name ="result" ></output>

                                @error('Number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        @auth
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('SUBMIT') }}
                                </button>
                            </div>
                        </div>
                        @endauth

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
