@extends('layouts.master')
@section('title')
  قائمة الاسعار
@endsection
@section('content')

  <section id="autofill">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3>قائمة الاسعار : </h3>
            <a href="{{route('price_product.create', $pricelist->id)}}" class="btn btn-sm btn-primary" >إضافة صنف</a>
            <a href="{{route('price_list')}}" class="btn btn-sm btn-danger float-right" >إلغاء </a>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
          </div>
          <div class="card-content collapse show">
            <div class="card-body card-dashboard">
              <table class="table table-striped table-bordered auto-fill">
              @if(count($priceproducts)>0)
                <thead>
                  <tr>
                    <th>إسم الصنف</th>
                    <th>إسم  المنتج</th>
                    <th>السعر الاساسى</th>
                    <th>سعر الكوبون </th>
                    <th>تم بواسطة</th>
                    <th>تاريخ الانشاء</th>
                    <!-- <th> خيارات </th> -->
                  </tr>
                </thead>
                <tbody>
                  @foreach($priceproducts as $price_pro)
                  @if($price_pro->pricelist_id == $pricelist->id)
                  <tr>
                    <td>{{$price_pro->product->category['name']}}</td>
                    <td>{{$price_pro->product['name']}}</td>
                    <td>{{$price_pro->base_price}}</td>
                    <td>{{$price_pro->coupon_price}}</td>
                    <td>{{$price_pro->user['name']}}</td>
                    <td>{{$price_pro->created_at}}</td>
                    <!-- <td>
                      <button type="button" class="btn btn-sm btn-warning"><i class="la la-edit"></i></button>
                      <button type="button" class="btn btn-sm btn-danger"><i class="la la-trash"></i></button>
                    </td> -->
                  </tr>
                  @endif
                  @endforeach
                </tbody>
                  @else
                  <br>
                  <br>
                  <br>
                  <center><i class="la la-frown-o"></i> Not Categories <i class="la la-frown-o"></i></center>
                  <br>
                  <br>
                  <br>
                  <br>
                  @endif
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@foreach($categories as $category)

  <section id="autofill">
    <div class="accordion" id="accordionExample">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne{{$category->id}}" aria-expanded="true" aria-controls="collapseOne{{$category->id}}">
              <i class="la la-plus"> </i> صنف :  {{$category->name}} 
            </button>
          </h2>
        </div>

        <div id="collapseOne{{$category->id}}" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
              <table class="table table-striped table-bordered auto-fill">
              @if(count($priceproducts)>0)
                <thead>
                  <tr>
                    <th>إسم الصنف</th>
                    <th>إسم  المنتج</th>
                    <th>السعر الاساسى</th>
                    <th>سعر الكوبون </th>
                    <th>تم بواسطة</th>
                    <th>تاريخ الانشاء</th>
                    <!-- <th> خيارات </th> -->
                  </tr>
                </thead>
                <tbody>
                  @foreach($priceproducts as $price_pro)
                  @if($price_pro->product['category_id'] == $category->id)
                  @if($price_pro->pricelist['id'] == $pricelist->id)
                  <tr>
                    <td>{{$price_pro->product->category['name']}}</td>
                    <td>{{$price_pro->product['name']}}</td>
                    <td>{{$price_pro->base_price}}</td>
                    <td>{{$price_pro->coupon_price}}</td>
                    <td>{{$price_pro->user['name']}}</td>
                    <td>{{$price_pro->created_at}}</td>
                    <!-- <td>
                      <button type="button" class="btn btn-sm btn-warning"><i class="la la-edit"></i></button>
                      <button type="button" class="btn btn-sm btn-danger"><i class="la la-trash"></i></button>
                    </td> -->
                  </tr>
                  @endif
                  @endif
                  @endforeach
                </tbody>
                  @else
                  <br>
                  <br>
                  <br>
                  <center><i class="la la-frown-o"></i> Not Categories <i class="la la-frown-o"></i></center>
                  <br>
                  <br>
                  <br>
                  <br>
                  @endif
              </table>
          </div>
        </div>
      </div>
    </div>
  </section>

@endforeach

@endsection