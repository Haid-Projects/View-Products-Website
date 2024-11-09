@extends('layouts.app')

@section('content')
    <div class=" container mt-5">

        <div class="containerr w-100 mb-5">
            <img class="img" src="https://cdn.salla.sa/form-builder/c9Wev1i43Lg9a5iDGdGM0ibz2n6upnCzkYKlWoUE.jpg"/>
            <img class="img" src="https://cdn.salla.sa/form-builder/5Tcd9mlrmtE2dYgNDuHDiKEt171J3ePyW9KSWYWJ.jpg"/>
            <img class="img" src="https://cdn.salla.sa/form-builder/SbykhSTcwbUtPtLj3ZXWVAUXV97hpJxhYPuTLknV.jpg"/>
            <img class="img" src="https://cdn.salla.sa/form-builder/rgvO0zcfWSBAKVwO39aQr93NLhzLoglOj9vemjrp.jpg"/>
        </div>


        <h2 class="hh2 mt-5">الاكثر مبيعا</h2>
        <div id="mostSoldCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($mostSoldProducts->chunk(4) as $chunkIndex => $productChunk)
                    <div class="carousel-item @if($chunkIndex == 0) active @endif">
                        <div class="row pb-1">
                            @foreach ($productChunk as $product)
                                <div class="col-sm-12 col-md-3">
                                    <div class="thumb-wrapper">
                                        <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                        <img src="{{$product->image}}" class="card-img-top w-100" alt="{{ $product->name }}">
                                        <div class="thumb-content p-4">
                                            <h6 class="fw-bold">{{ $product->name }}</h6>
                                            <p class="item-price">
                                                <b>${{ 20 }}</b>
                                            </p>
                                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">
                                                <i class="fa fa-eye"></i>
                                                عرض التفاصيل</a>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#mostSoldCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mostSoldCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        @foreach($categories as $category)
            <div class="mt-5 ">
                <img class="" src="{{$category->image}}" style="border-radius: 10px" />
            </div>
            <h2 class="hh2 mt-5">{{$category->name}}</h2>
            <div id="{{$category->name}}" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($category->products->chunk(4) as $chunkIndex => $productChunk)
                        <div class="carousel-item @if($chunkIndex == 0) active @endif">
                            <div class="row pb-1">
                                @foreach ($productChunk as $product)
                                    <div class="col-sm-12 col-md-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                            <img src="{{$product->image}}" class="card-img-top w-100" alt="{{ $product->name }}">
                                            <div class="thumb-content p-4">
                                                <h6 class="fw-bold">{{ $product->name }}</h6>
                                                <p class="item-price">
                                                    <b>${{ 20 }}</b>
                                                </p>
                                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-eye"></i>
                                                    عرض التفاصيل</a>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#{{$category->name}}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#{{$category->name}}" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @endforeach

        <h2 class="ms mx-auto text-dark text-center" style="font-size: 26px;font-weight: 300;position: relative;margin: 30px 0 60px;">
            <span>آ</span><span>ر</span><span>ا</span><span>ء</span><span> </span><span>ا</span><span>ل</span><span>ع</span><span>م</span><span>ل</span><span>ا</span><span>ء</span>
        </h2>
        <div id="reviews" class="carousel slide mx-5" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($mostSoldProducts->chunk(4) as $chunkIndex => $productChunk)
                    <div class="carousel-item @if($chunkIndex == 0) active @endif">
                        <div class="row pb-1">
                            @foreach ($productChunk as $product)
                                @if($product->id % 4 == 1)
                                    <div class="col-lg-3 text-center">
                                        <img class="rounded-circle shadow-1-strong mb-4 "
                                             src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp" alt="avatar"
                                             style="width: 150px;" />
                                        <h5 class="mb-3">نور محمد</h5>
                                        <h5 class="text-muted">
                                            <i class="fas fa-quote-left pe-2"></i>
                                            منتجات رائعة وتوصيل سريع
                                        </h5>
                                    </div>
                                @elseif($product->id % 4 == 2)
                                    <div class="col-lg-3 text-center">
                                        <img class="rounded-circle shadow-1-strong mb-4 "
                                             src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(3).webp" alt="avatar"
                                             style="width: 150px;" />
                                        <h5 class="mb-3">احمد محمد</h5>
                                        <h5 class="text-muted">
                                            <i class="fas fa-quote-left pe-2"></i>
                                            منتجات ممتازة
                                        </h5>
                                    </div>
                                @elseif($product->id % 4 == 3)
                                    <div class="col-lg-3 text-center">
                                        <img class="rounded-circle shadow-1-strong mb-4 "
                                             src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(4).webp" alt="avatar"
                                             style="width: 150px;" />
                                        <h5 class="mb-3">هدى</h5>
                                        <h5 class="text-muted">
                                            <i class="fas fa-quote-left pe-2"></i>
                                            رائع
                                        </h5>
                                    </div>
                                @else

                                    <div class="col-lg-3 text-center">
                                        <img class="rounded-circle shadow-1-strong mb-4 "
                                             src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(9).webp" alt="avatar"
                                             style="width: 150px;" />
                                        <h5 class="mb-3"> محمد</h5>
                                        <h5 class="text-muted">
                                            <i class="fas fa-quote-left pe-2"></i>
                                            خدمة ممتازة
                                        </h5>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center my-5 ">
                <button data-mdb-button-init class="carousel-control-prev position-relative mx-3" type="button"
                        data-bs-target="#reviews" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon text-body" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button data-mdb-button-init class="carousel-control-next position-relative mx-3" type="button"
                        data-bs-target="#reviews" data-bs-slide="next">
                    <span class="carousel-control-next-icon text-body" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

@endsection
