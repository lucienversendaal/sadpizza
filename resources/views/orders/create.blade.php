@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Order Pizza') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <form method="post" action="{{ route('orders.store') }}" class="form-horizontal">
                                @csrf

                                <div class="form-group"><label class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-10"><input type="text" name="address" placeholder="Your Address" class="form-control" value="{{ old('address') }}"></div>
                                    @error('address')
                                        <small class="alert red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Size</label>

                                    <div class="col-sm-10">
                                        <div><label> <input type="radio" value="medium" checked="" id="medium" name="size"> Medium</label></div>
                                        <div><label> <input type="radio" value="large" id="large" name="size"> Large</label></div>
                                        <div><label> <input type="radio" value="extra-large" id="extra-large" name="size"> Extra Large</label></div>
                                    </div>
                                    @error('size')
                                    <small class="alert red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Toppings</label>
                                    <div class="col-sm-10">
                                        <label class="checkbox">
                                            <input type="checkbox" name="toppings[]" value="pepperoni"> Pepperoni
                                        </label>
                                        <label>
                                            <input type="checkbox" name="toppings[]" value="extra-cheese"> Extra Cheese
                                        </label>
                                        <label>
                                            <input type="checkbox" name="toppings[]" value="mushrooms" > Mushrooms
                                        </label>
                                        <label>
                                            <input type="checkbox" name="toppings[]" value="ground-beef" > Ground Beef
                                        </label>
                                        <label>
                                            <input type="checkbox" name="toppings[]" value="pineapple"> Pineapple
                                        </label>
                                    </div>
                                    @error('toppings')
                                    <small class="alert red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-success" type="submit">Order Now</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
