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
                    <a class="link-body-emphasis text-decoration-none " href="{{route('products.inCategory', $product->category_id)}}" >{{$product->category->name}}</a>
                </li>
                <li>
                    <i class="fa fa-angle-left mx-1 text-secondary  "></i>

                </li>
                <li class="">
                    <span class=" text-decoration-none " >{{$product->name}}</span>
                </li>
            </ol>
        </nav>
    </div>

    <section class="container py-5">
        <div class="container">
            <div class="row gx-5">
                <aside class="col-lg-6">
                    <div  class="border rounded-4 mb-3 d-flex justify-content-center">
{{--                        <a data-fslightbox="mygallery" class="rounded-4" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp">--}}
                            <img style="width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{$product->image}}" id="feature"/>
{{--                        </a>--}}
                    </div>
                    <div class="d-flex justify-content-center mb-3" id="mygallery" onclick="selectedImage(event)">
                        @foreach($category->products as $p)
{{--                        <a data-fslightbox="mygallery" class="border mx-1 rounded-2" target="_blank" data-type="image" href="{{$product->image}}"  class="item-thumb">--}}
                            <img width="60" height="60" class="rounded-2 mx-1" src="{{$p->image}}"  />
{{--                        </a>--}}
                        @endforeach

                    </div>
                </aside>
                <main class="col-lg-6">
                    <div class="ps-lg-3">
                        <h4 class="title text-dark">
                            {{$product->name}}
                        </h4>
                        <div class="d-flex flex-row my-3">
                            <div class="text-warning mb-1 me-2">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ms-1">
                                    4.5
                                </span>
                            </div>
                            <span class="text-muted"><i class="fa fa-shopping-basket fa-sm mx-1"></i>154 عملية شراء</span>
                            <span class="text-success ms-2">متوفر</span>
                        </div>

                        <div class="mb-3">
                            <span class="h5">${{ 20  }}</span>
                            <span class="text-muted">/في الصندوق</span>
                        </div>

                        <p>
                            {{$product->description}}

                        <p class="">
                            مواصفات سبورك:
                        </p>
                        <div class="row mb-4">
                            <div class="col-12 col-md-8">
                                <ul class=" mb-0">
                                    <li><i class="fas fa-check text-success me-2"></i>                                    يحتوي الكرتون على 20 مغلف كل مغلف يحتوي على 50 حبة.
                                    </li>
                                    <li><i class="fas fa-check text-success me-2"></i>                                    الارتفاع : 13 سم، العرض : 3.2 سم.
                                    </li>
                                    <li><i class="fas fa-check text-success me-2"></i>                                    متوفر منها العديد من الألوان المختلفة
                                    </li>
                                </ul>
                            </div>
                        </div>
                        </p>




                        <a href="#" class="btn btn-warning shadow-0"> اشتر الآن </a>
{{--                        <a href="#" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> إضافة للسلة </a>--}}
                        <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> حفظ </a>
                    </div>
                </main>
            </div>
        </div>
    </section>

    <section class="bg-light border-top py-4">
        <div class="container">
            <div class="row gx-4">
                <div class="col-lg-8 mb-4">
                    <div class="border rounded-2 px-3 py-2 bg-white">
                        <!-- Pills navs -->
                        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100 active" id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1" aria-selected="true">تفاصيل المنتج</a>
                            </li>
                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-2" data-mdb-toggle="pill" href="#ex1-pills-2" role="tab" aria-controls="ex1-pills-2" aria-selected="false">تقييمات المنتج</a>
                            </li>
                        </ul>
                        <!-- Pills navs -->

                        <!-- Pills content -->
                        <div class="tab-content pb-5 px-3" id="ex1-content">
                            <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                                <p class="mt-5">
                                    مواصفات سبورك:
                                </p>
                                <div class="row mb-4">
                                    <div class="col-12 col-md-8">
                                        <ul class=" mb-0">
                                            <li><i class="fas fa-check text-success me-2"></i>                                    يحتوي الكرتون على 20 مغلف كل مغلف يحتوي على 50 حبة.
                                            </li>
                                            <li><i class="fas fa-check text-success me-2"></i>                                    الارتفاع : 13 سم، العرض : 3.2 سم.
                                            </li>
                                            <li><i class="fas fa-check text-success me-2"></i>                                    متوفر منها العديد من الألوان المختلفة
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <p>
                                    مميزات سبورك:

                                </p>
                                <div class="row mb-2">
                                    <div class="col-12 col-md-8">
                                        <ul class=" mb-0">
                                            <li><i class="fas fa-check text-success me-2"></i> مصنوع من مادة PS</li>
                                            <li><i class="fas fa-check text-success me-2"></i> تعتبر آمنة للغذاء.</li>
                                            <li><i class="fas fa-check text-success me-2"></i>                                                                    قابلة لإعادة التدوير
                                            <li><i class="fas fa-check text-success me-2"></i>                                    متوفر منها العديد من الألوان المختلفة
                                            <li><i class="fas fa-check text-success me-2"></i>                                                                     صناعة سعودية

                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade mb-2" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                                Tab content or sample information now <br />
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            </div>
                       </div>
                        <!-- Pills content -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="px-0 border rounded-2 shadow-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">منتجات مشابهة</h5>
                                @foreach($category->products as $p)

                                <div class="d-flex mb-3">
                                    <a href="{{route('products.show', $p->id)}}" class="me-3">
                                        <img src="{{$p->image}}" style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                    </a>
                                    <div class="info">
                                        <a href="{{route('products.show', $p->id)}}" class="nav-link mb-1">
                                            {{$p->name}}
                                        </a>
                                        <strong class="text-dark"> $38.90</strong>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        var images = document.getElementById("mygallery").getElementsByTagName("img");

        function selectedImage(e){
            e = event || window.event;

            var target = e.target || e.srcElement;

            if(target.tagName == "IMG"){
                document.getElementById("feature").src = target.getAttribute("src");

            }
        }

        for(var i=0; i < images.length; i++){

            images[i].onmouseover = function(){
                this.style.cursor = 'hands';
                this.style.borderColor = '#1a1aff';
            }

            images[i].onmouseout = function(){
                this.style.cursor = 'pointer';
                this.style.borderColor = 'grey';
            }
        }
    </script>
@endsection
