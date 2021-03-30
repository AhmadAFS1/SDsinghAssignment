
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
                                <td>${{$item->Suggested_Price }}</td>
                                <td>${{$item->Due }}</td>
                            </tr>  
                            @endforeach
                        </table>
                        

                        
                                                  
                    </div>           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
