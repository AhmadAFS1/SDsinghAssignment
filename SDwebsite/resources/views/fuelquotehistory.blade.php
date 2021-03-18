
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Fuel Quote History') }}</div>
                    <div class="card-body">
                       <!-- <h1> History (Note for future : $orders from controller and $order to dynamically show order drom Database)</h1> -->

                        <table class = "card body-table">
                            <tr>
                                <td>        Gallons       </td>
                                <td>        Address       </td>
                                <td>     Delivery Date    </td>
                                <td>    Suggested Price   </td>
                                <td>   Total Amount Due   </td>
                            </tr>
                            @foreach ($collection as $item)
                            <tr>
                                <td>{{$item->Gallons }} gallon(s)</td>
                                <td>{{$item->Address }}</td>
                                <td>{{$item->start }}</td>
                                <td>${{$item->Due }}</td>
                                <td>${{$item->Due }}</td>
                            </tr>  
                            @endforeach
                        </table>
                        

                        
                                                    <!--<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
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
                                                        
                                                    </div> -->
                    </div>           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
