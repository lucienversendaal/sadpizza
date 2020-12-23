@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('My Orders') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(!count($pizzas) > 0)
                        No orders yet...
                    @else
                        <table class="table table-hover border">
                            <thead>
                            <tr>
                                <th scope="col" class="border">Address</th>
                                <th scope="col" class="border">Size</th>
                                <th scope="col" class="border">Toppings</th>
                                <th scope="col" class="border">Date</th>
                                <th scope="col" class="border">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pizzas as $pizza)
                            <tr>
                                <td class="border">{{ $pizza->address }}</td>
                                <td class="border">{{ $pizza->size }}</td>
                                <td class="border">{{ $pizza->toppings }}</td>
                                <td class="border">{{ $pizza->created_at }}</td>
                                <td class="border">Order placed</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
