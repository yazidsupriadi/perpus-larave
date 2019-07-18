 @extends('homepage.master')
 @section('header')
  <title>Oncom Shop - Jual gadget murah</title>
    
 @endsection
 @section('slider')
     <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">{{$books->name}}</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">{{$books->name}}</li>
                <li class="breadcrumb-item active"></li>
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
            <!-- LEFT COLUMN _________________________________________________________-->
            <div class="col-lg-9">
              <p class="lead">Detail lengkap buku yang ingin dibaca . Selamat membaca!! Keliling Dunia dengan membaca!!</p>
              <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">Scroll to product details, material & care and sizing</a></p>
              <div id="productMain" class="row">
                <div class="col-sm-6">
                  <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                    <div> <img src="{{asset('admin/img/book/'.$books->picture)}}" alt="" class="img-fluid"></div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="box">
                      <p class="price">Code : {{$books->code}}</p>
                      <input type="hidden" name="id" value="{{$books->name}}"> 
                      <p class="text-center">
                        @if(Auth::user())
                        <a href="{{url('/cart/'.$books->id.'/formulir')}}">Pinjam</a>
                        <button type="submit" data-toggle="tooltip" data-placement="top" title="Add to wishlist" class="btn btn-default"><i class="fa fa-heart-o"></i></button>
                        @else
                        <h6>anda harus login terlebih dahulu untuk melakukan peminjaman buku</h6>
                        @endif
                      </p>
                  </div>
                  
                </div>
              </div>
              <div id="details" class="box mb-4 mt-4">
                <p></p>
                <h4>Book details</h4>
                      <p>Penerbit : {{$books->publication_year}}</p>
                      <p>Jumlah buku{{$books->qty}}</p>               
                <p>{!!$books->description!!}</p>
                <blockquote class="blockquote">
                  <p class="mb-0"><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em></p>
                </blockquote>
              </div>
              <div id="product-social" class="box social text-center mb-5 mt-5">
                <h4 class="heading-light">Show it to your friends</h4>
                <ul class="social list-inline">
                  <li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="external facebook"><i class="fa fa-facebook"></i></a></li>
                  <li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="external gplus"><i class="fa fa-google-plus"></i></a></li>
                  <li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="external twitter"><i class="fa fa-twitter"></i></a></li>
                  <li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="email"><i class="fa fa-envelope"></i></a></li>
                </ul>
              </div>
           
            </div>
            <div class="col-lg-3">
              <!-- MENUS AND FILTERS-->
              <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  <h3 class="h4 panel-title">Categories</h3>
                </div>
                <div class="panel-body">
                  <ul class="nav nav-pills flex-column text-sm category-menu">
                    <li class="nav-item"><a href="shop-category.html" class="nav-link d-flex align-items-center justify-content-between"><span>Men </span><span class="badge badge-secondary">42</span></a>
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
                    </li>
                 
                  </ul>
                </div>
              </div>
        
            
            </div>
          </div>
        </div> 
      </div>
@endsection