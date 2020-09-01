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
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add">إضافة  قائمة اسعار</button>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
          </div>
          <div class="card-content collapse show">
            <div class="card-body card-dashboard">
              @if(count($pricelists)>0)
              <table class="table table-striped table-bordered auto-fill">
                <thead>
                  <tr>
                    <th>إسم  قائمة الاسعار</th>
                    <th>تم بواسطة</th>
                    <th>تاريخ الانشاء</th>
                    <th> خيارات </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pricelists as $price_list)
                  <tr>
                    <td>{{$price_list->name}}</td>
                    <td>{{$price_list->user['name']}}</td>
                    <td>{{$price_list->created_at}}</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$price_list->id}}"><i class="la la-edit"></i></button>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete{{$price_list->id}}"><i class="la la-trash"></i></button>
                      <a href="{{route('price_product', $price_list->id)}}" class="btn btn-sm btn-info"><i class="la la-money"></i> أسعار المنتجات</a>
                    </td>
                  </tr>

                  <!-- Model Edit -->
                    <div id="modal-edit{{$price_list->id}}" class="modal fade" >
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <i class="la la-edit"> تعديل</i>
                          </div>
                            <form method="POST" action="{{route('price_list.edit', $price_list->id)}}">
                              @csrf
                              <div class="modal-body">
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>إسم  قائمة الاسعار</label>
                                      </div>
                                      <div class="col-md-10">
                                        <input class="form-control" type="text" name="upname" id="upname" value="{{$price_list->name}}" placeholder="إسم قائمة الاسعار" required="">
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">إلغاء</button>
                                <button type="submit" class="btn btn-success">تعديل</button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>

                  <!-- Model Delete -->
                    <div id="modal-delete{{$price_list->id}}" class="modal fade" >
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <i class="la la-trash"> حذف</i>
                          </div>
                            <form method="POST" action="{{route('price_list.delete', $price_list->id)}}">
                              @csrf
                              <div class="modal-body">
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>إسم  قائمة الاسعار</label>
                                      </div>
                                      <div class="col-md-4">
                                        <p>{{$price_list->name}}</p>
                                      </div>
                                      <div class="col-md-2">
                                        <label>تم بواسطت</label>
                                      </div>
                                      <div class="col-md-4">
                                        <p>{{$price_list->User['name']}}</p>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal">إلغاء</button>
                                <button type="submit" class="btn btn-danger">حذف</button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>

                  @endforeach
                  @else
                  <br>
                  <br>
                  <br>
                  <center><i class="la la-frown-o"></i> لايوجد قائمة اسعار <i class="la la-frown-o"></i></center>
                  <br>
                  <br>
                  <br>
                  <br>
                  @endif
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- Model Add -->
  <div id="modal-add" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <i class="la la-plus"> إضافة</i>
        </div>
          <form method="POST" action="{{route('price_list.store')}}">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                      <label>إسم  قائمة الاسعار </label>
                    </div>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="name" id="name" placeholder="إسم قائمة الاسعار" required="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                      <label>السعر الاساسى </label>
                    </div>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="base_price" id="base_price" placeholder="السعر الاساسى " required="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                      <label>سعر القسيمة</label>
                    </div>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="coupon_price" id="coupon_price" placeholder="سعر القسيمة" required="">
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">إلغاء</button>
              <button type="submit" class="btn btn-success float-left">حفظ</button>
            </div>
        </form>
      </div>
    </div>
  </div>

@endsection