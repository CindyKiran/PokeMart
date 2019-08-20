@extends('layouts.master')

@section('title')
    Pokemart construction
@endsection

@section('content')
    @if(Session::has('success'))
        <div>
            {{Session::get('success')}}
        </div>
    @endif
    @foreach($products->chunk(3) as $productChunk)
        <div class="row">
            @foreach($productChunk as $product)
                <div class="col-sm-6 col-md-4">
                    <div class="card" style="width: 18rem;">
                    <img src="{{$product->imagePath}}" style="width:200px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->title}}</h5>
                            <p class="card-text">{{$product->description}}</p>
                            <h3>{{$product->price}}</h3>
                            <a href="{{ route('product.addToCart', ['id'=> $product->id]) }}" class="btn btn-primary">Order</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
