@extends('shop.master')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <section class="our-publication pt-100 pb-70">
        <div class="container">
            <div class="section-header">
                <i class="fa fa-book"></i>
                <h2>Our Publications</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod labore et dolore magna
                    aliqua.</p>
            </div>

            <div class="row">
                @foreach($products as $product)
                    <div class="col-sm-6 col-lg-3">
                        <div class="single-publication">
                            <figure>
                                <a href="#">
                                    <img src="https://envytheme.com/tf-demo/edusplash/assets/img/publication/1.jpg"
                                         alt="Publication Image">
                                </a>

                                <ul>
                                    <li><a href="#" title="Add to Favorite"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#" title="Add to Compare"><i class="fa fa-refresh"></i></a></li>
                                    <li><a href="#" title="Quick View"><i class="fa fa-search"></i></a></li>
                                </ul>
                            </figure>

                            <div class="publication-content">
                                <span class="category">{{ $product->category->name }}</span>
                                <h3><a href="#">{{ $product->name }}</a></h3>
                                <ul>
                                    <li><i class="icofont-star"></i></li>
                                    <li><i class="icofont-star"></i></li>
                                    <li><i class="icofont-star"></i></li>
                                    <li><i class="icofont-star"></i></li>
                                    <li><i class="icofont-star"></i></li>
                                </ul>
                                <h4 class="price">{{ $product->price }}</h4>
                            </div>

                            <div class="add-to-cart">
                                <a href="{{ route('addToCart', $product->id) }}" class="default-btn">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    @toastr_render
@endsection
