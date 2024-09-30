@extends('layouts.login')
@section('content')
    <style>
        .content {
            text-align: center;
        }

        .title {
            font-size: 24px;
            padding-top: 10px;
        }
    </style>
    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading"> Product Listing</h1>
                <p class="lead text-muted">Online Store</p>

            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    @foreach ($products as $y)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="{{ asset('images/MockUp1.jpg') }}" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">
                                        <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $y->product_name }}</h5>
                                    <!-- Product price-->
                                    ₹ {{ $y->product_price }}

                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="/products/{{ $y->id }}"
                                                class="btn btn-sm btn-outline-secondary">View options</a>

                                        </div>
                                        <small class="text-muted">10K Sold</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="container px-4 px-lg-5 mt-5">
                        <div class="d-flex justify-content-center">
                            {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>


@stop
