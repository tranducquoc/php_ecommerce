@extends('layouts.app')
@section('title', 'Shop')

@section('content')

@component('partials.header')
    @slot('img')
        ../img/home-bg.jpg
    @endslot

    @slot('heading')
        @lang('common.text.shop_page.heading')
    @endslot

    @slot('subheading')
        @lang('common.text.shop_page.subheading')
    @endslot
@endcomponent

<div class="container">

    <div class="row">
        <div class="col-lg-3">
            <h1 class="my-4">@lang('common.text.shop_page.category')</h1>
            <div class="list-group">
                @foreach($categories as $category)
                <a href="#" class="list-group-item">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
        <div class="col-lg-9">
            <h1 class="my-4">@lang('common.text.shop_page.available_product')</h1>
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="{{ route('shop.show', $product->slug) }}"><img class="card-img-top" src="{{ asset($product->image) }}.jpg"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{ route('shop.show', $product->slug) }}">
                                    {{ $product->name }}
                                </a>
                            </h4>
                            <h5>{{ $product->price }}</h5>
                            <p class="card-text">{{ $product->description }} @lang('common.text.shop_page.buy')</p>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-outline-primary float-right">@lang('common.text.shop_page.buy')</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="float-right">{{ $products->links() }}</div>
        </div>
    </div>
</div>
@endsection