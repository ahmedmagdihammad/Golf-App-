@extends('layouts.master')
@section('title')
  إضافة الاسعار
@endsection
@section('content')
<br>
<a href="{{route('price_product', $pricelist->id)}}" class="btn btn-danger" style="margin-right: 10px">إلغاء</a>
<br>
<br>
@foreach($categories as $category)
<form action="{{ route('price_product.store') }}" method="POST">

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
  	        @if(count($products)>0)
                <table class="balances table table-striped table-bordered auto-fill">
                  <thead>
                    <tr>
                      <th>إسم الصنف</th>
                      <th> السعر الاساسى </th>
                      <th> سعر الكوبون  </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                    @if($product->category_id == $category['id'])
                    @csrf

                    <tr>
                      <td>{{$product->name}} </td>
                      <td>
                      <input class="hidden pricelist" type="text" name="pricelist_id[]" value="{{$pricelist->id}}">
                      <input class="hidden pricelist" type="text" name="product_id[]" value="{{$product->id}}">
                  	  <input class="base_price form-control" name="base_price[]" placeholder="السعر الاساسى"></td>
                      <td><input class="coupon_price form-control" name="coupon_price[]" type="number" placeholder="سعر الكوبون"></td>
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
                <button id="saveButton" onclick="saveBalance()" type="submit" class="btn btn-sm btn-primary pull-left" ><i class="fa fa-plus"></i> &nbsp; حفظ  </button>
                <br>
  	      </div>
  	    </div>
  	  </div>
  	</div>
  </section>
</form> 

@endforeach
@endsection