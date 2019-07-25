@extends('layouts.app')
@section('content')
    <table class="table table-striped table-responsive product-list" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Product Title</th>
                <th>Description</th>
                <th>Type</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($products AS $product)
                <tr>
                    <th scope="row" class="align-middle"><b>{{ $loop->iteration }}</b></th>
                    <td>{{ $product->title }}</td>
                    <td>{{ str_limit($product->description, 50) }}</td>
                    @if($product->type_price == 'promo')
                    <td>Sale Price</td>
                    <td>
                        <span>{{ $product->special_price }}</span>
                        <span style="text-decoration:line-through">{{ $product->old_price }}</span>
                    </td>
                    @else($product->type_pric == 'flat')
                    <td>Regular Price</td>
                    <td>{{ $product->price }}</td>
                    @endif
                    
                    <td>
                        <a href="{{ route('product.detail', [$product->id]) }}" class="btn btn-primary">Detail</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No Product Found</span>
                </tr>
            @endforelse
        </tbody>

    </table>
@endsection
