 @extends('homepage.master')
 @section('header')
  <title>Oncom Shop - Jual gadget murah</title>
    
 @endsection
 @section('slider')
     <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">All Product</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">See all products</li>
                <li class="breadcrumb-item active">{{$name}}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
 @endsection
 @section('content')
  <div id="content">
        <div class="container">
          <div class="row bar">
            <div class="col-md-3">
              <!-- MENUS AND FILTERS-->
              <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  <h3 class="h4 panel-title">Categories</h3>
                </div>
                <div class="panel-body">
                  <ul class="nav nav-pills flex-column text-sm category-menu">
                    @foreach($category as $cat)
                    <li class="nav-item"><a href="shop-category.html" class="nav-link d-flex align-items-center justify-content-between"><span>{{$cat->name}} </span><span class="badge badge-secondary">42</span></a>
                      <ul class="nav nav-pills flex-column">
                        @foreach($cat->children as $sub)
                        <li class="nav-item"><a href="shop-category.html" class="nav-link">{{$sub->name}}</a></li>
                        @endforeach
                      </ul>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <p class="text-muted lead">Disini kami menyediakan buku buku terbaik di dalam dan luar negeri Selamat membaca ! Stay hungry Stay Foolish</p>
              <div class="row products products-big">
                @foreach($books as $book)
                <div class="col-lg-4 col-md-6">                  
                  <div class="product">
                    <div class="image"><a href="{{url('/book/detail/'.$book->id)}}"><img src="{{asset('admin/img/book/'.$book->picture)}}" alt="" class="img-fluid image1"></a></div>
                    <div class="text">
                      <h3 class="h5"><a href="{{url('/book/detail/'.$book->id)}}">{{$book->name}}</a></h3>
                      <p class="price">Halaman Buku : {{$book->pages}}</p>
                        <p class="price">pengarang : {{$book->author->name}}</p>
                        <p class="price">Tahun terbit : {{$book->publication_year}}</p>
                      
                      <p class="price"></p>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              <div class="row">
                <div class="col-md-12 banner mb-small"><a href="#"><img src="img/banner2.jpg" alt="" class="img-fluid"></a></div>
              </div>
              <div class="pages">
                <p class="loadMore text-center"><a href="#" class="btn btn-template-outlined"><i class="fa fa-chevron-down"></i> Load more</a></p>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection