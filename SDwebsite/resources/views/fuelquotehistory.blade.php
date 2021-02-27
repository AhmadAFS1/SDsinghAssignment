
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Fuel Quote History') }}</div>
                    <div class="card-body">
                        <h1> History (Note for future self: $orders from controller and $order to dynamically show order drom Database)</h1>
                        <div id="table_thingy">
                            <table>
                                <tr>
                                    <th>--Name--</th>
                                    <th>--Email--</th>
                                    <th>--Amount Due--</th>
                                    <th>--Address--</th>
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
