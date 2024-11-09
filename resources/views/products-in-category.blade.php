@extends('layouts.app')

@section('content')

    <div class="container my-3">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
                <li class="">
                    <a class="link-body-emphasis text-decoration-none"  href="{{route('main.index')}}">
                        {{--                        <i class="fa fa-home"></i>--}}
                        الصفحة الرئيسية
                    </a>
                </li>
                <li>
                    <i class="fa fa-angle-left mx-1 text-secondary  "></i>

                </li>
                <li class="">
                    <span class=" text-decoration-none " >{{$category->name}}</span>
                </li>
            </ol>
        </nav>
    </div>

    <div class="container mb-5">
        <div class="row">
            <aside class="col-md-3 mb-5">

                <div class="card mt-2">
                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" style="direction: revert" data-target="#collapse_3" aria-expanded="true" class="row justify-content-between text-decoration-none">
                                <h6 class="title col-3" style="color: #7ac400">السعر </h6>
                                <i class="icon-control fa fa-minus col-2" style="color:#7ac400;"></i>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse_3" style="">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>من</label>
                                        <input class="form-control" placeholder="$0" type="number">
                                    </div>
                                    <div class="form-group text-right col-md-6">
                                        <label>إلى</label>
                                        <input class="form-control" placeholder="$1,0000" type="number">
                                    </div>
                                </div> <!-- form-row.// -->
                                <button class="btn btn-block my-2" style="background-color: #7ac400;color: white" >فلترة</button>
                            </div><!-- card-body.// -->
                        </div>
                    </article> <!-- filter-group .// -->
                </div> <!-- card.// -->

            </aside>
            <main class="col-md-9">

                <header class="row justify-content-end border-bottom mb-4 pb-3 ">
                    <span class="col-1">ترتيب</span>
                    <div class="form-inline col-3 ">
                        <select class="mr-2 form-control">
                            <option>مقترحاتنا</option>
                            <option>المنتجات الحديثة</option>
                            <option>الأكثر مبيعا</option>
                            <option>ترتيب من الأقل سعرا</option>
                            <option>ترتيب من الأعلى سعرا</option>
                        </select>
                    </div>
                </header><!-- sect-heading -->

                <div class="row">
                    @foreach($category->products as $product)
                    <div class="col-md-4">
                        <figure class="card card-product-grid">
                            <div class="img-wrap">
                                <span class="badge badge-danger"> جديد </span>
                                <img src="{{$product->image}}" class="img-fluid">
                                <a class="btn-overlay" href="{{route('products.show', $product->id)}}"><i class="fa fa-file-text-o"></i> عرض التفاصيل</a>
                            </div> <!-- img-wrap.// -->
                            <figcaption class="info-wrap text-center">
                                <div class="thumb-content">
                                    <h6 class="fw-bold">{{ $product->name }}</h6>
                                    <p class="item-price">
                                        <b>${{ 20 }}</b>
                                    </p>
                                </div>
{{--                                <a href="{{ route('cart.add', $product->id) }}" class="btn add-to-cart">--}}
{{--                                    <i class="fas fa-shopping-bag"></i>--}}
{{--                                    إضافة للسلة</a>--}}
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->

                    @endforeach
                </div> <!-- row end.// -->


{{--                <nav class="mt-4" aria-label="Page navigation sample">--}}
{{--                    <ul class="pagination">--}}
{{--                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>--}}
{{--                        <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}

            </main>
        </div>
    </div>

@endsection
