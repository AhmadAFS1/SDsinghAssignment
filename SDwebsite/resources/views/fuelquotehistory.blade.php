
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Quote History</div>
                    <div class = "card-body">

                            <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                                <div id="body_container">
                                    <div id="body_contents">
                                        <table>
                                            <tr>
                                                <th><label for="Gallons" class="row-md-4 row-form-label">{{ __('GR') }}</label></th>
                                                <th><label for="Del-Add" class="row-md-4 row-form-label">{{ __('DA') }}</label></th>
                                                <th><label for="Del-Date" class="row-md-4 row-form-label">{{ __('DD') }}</label></th>
                                                <th><label for="Sug-Price" class="row-md-4 row-form-label">{{ __('SP') }}</label></th>
                                                <th><label for="Tot-Am-Due" class="row-md-4 row-form-label">{{ __('TAD') }}</label></th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>

            </div>
        </div>
    </div>
</div>
@endsection
