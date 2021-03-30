

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Fuel Quote') }}</div>

                <div class="card-body">
                    <form action="fuelquoteform" oninput="result.value = {{$QuoteFormData[0]}} * parseInt(Gallons.value)" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="Gallons" class="col-md-4 col-form-label text-md-right">{{ __('Gallons Requested') }}</label>

                            <div class="col-md-6">
                                <input name ="Gallons" id = "Gallons" type="number" pattern = "[0-9]" >

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

                                    
                                    {{$QuoteFormData[1]}}
                                        
                                        
                                    
                                @else
                                    <p>You are a guest!
                                    <br>
                                    Using Out of Texas Price ($3)</p>
                                @endauth

                                
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
                                <input name ="Price" value="{{$QuoteFormData[0]}}" id = "Price" type="hidden" pattern = "[0-9]">${{$QuoteFormData[0]}}</output>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Due" class="col-md-4 col-form-label text-md-right">{{ __('Total Amount Due') }}</label>

                            <div class="col-md-6">
                                $<output name = result></output>
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
