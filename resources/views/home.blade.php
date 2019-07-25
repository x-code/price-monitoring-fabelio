@extends('layouts.app')
@section('content')
    <div class="card text-center">
        <div class="card-body">
            <form method="POST" action="{{ route('product.store') }}">
                @csrf
                <div class="card-text">
                        <div class="container">
                            <div class="row">
                            <div class="input-group">
                                <input type="text" class="form-control" name="link"  placeholder="Please insert link of fabelio.com product detail here (example : https://fabelio.com/ip/kabinet-tromso-chest-of-drawers.html)">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-search" type="button"><i class="fa fa-search fa-fw"></i> Search</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
@endsection
