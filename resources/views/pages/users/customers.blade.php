@extends('layouts.master')
@section('title')
   العملاء
@endsection
@section('content')
  <section id="autofill">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add"><i class="la la-plus"></i>  إضافة  عميل </button>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li> -->
              </ul>
            </div>
          </div>
          <div class="card-content collapse show">
            <div class="card-body card-dashboard">
              @if(count($customers)>0)
              <table class="table table-striped table-bordered auto-fill">
                <thead>
                  <tr>
                    <th>إسم   العميل </th>
                    <th> رقم الهاتف	</th>
                    <th>العنوان</th>
                    <th>نقاط</th>
                    <th>تم بواسطة	</th>
                    <th>الأنشاء</th>
                    <th> خيارات </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($customers as $customer)
                  <tr>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->address}}</td>
                    <td>{{$customer->points}}</td>
                    <td>{{$customer->user['name']}}</td>
                    <td>{{$customer->created_at}}</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$customer->id}}"><i class="la la-edit"></i></button>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete{{$customer->id}}"><i class="la la-trash"></i></button>
                    </td>
                  </tr>

                  <!-- Model Edit -->
                    <div id="modal-edit{{$customer->id}}" class="modal fade" >
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <i class="la la-edit"> تعديل</i>
                          </div>
                            <form method="POST" action="{{route('customer.edit', $customer->id)}}" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-body">
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <label>إسم  العميل </label>
                                    </div>
                                    <div class="col-md-10">
                                      <input class="form-control" type="text" name="upname" id="upname" value="{{$customer->name}}" placeholder="إسم  العميل " required="">
                                    </div>
                                  </div>
                                </div>
                                 <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <label>الموبايل</label>
                                    </div>
                                    <div class="col-md-10">
                                      <input class="form-control" type="text" name="upphone" id="upphone" value="{{$customer->phone}}" placeholder="الموبايل" required="">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <label>العنوان</label>
                                    </div>
                                    <div class="col-md-10">
                                      <input class="form-control" type="text" name="upaddress" id="upaddress" value="{{$customer->address}}" placeholder="العنوان" required="">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <label>النقاط</label>
                                    </div>
                                    <div class="col-md-10">
                                      <input class="form-control" type="text" name="uppoints" id="uppoints" value="{{$customer->points}}" placeholder="نقاط" required="">
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
                    <div id="modal-delete{{$customer->id}}" class="modal fade" >
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <i class="la la-trash"> حذف</i>
                          </div>
                            <form method="POST" action="{{route('customer.delete', $customer->id)}}">
                              @csrf
                              <div class="modal-body">
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>إسم   العميل</label>
                                      </div>
                                      <div class="col-md-4">
                                        <p>{{$customer->name}}</p>
                                      </div>
                                      <div class="col-md-2">
                                        <label>موبايل</label>
                                      </div>
                                      <div class="col-md-4">
                                        <p>{{$customer->phone}}</p>
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
                  <center><i class="la la-frown-o"></i> لايوجد  عملاء <i class="la la-frown-o"></i></center>
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
  <div id="modal-add" class="modal fade ">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <i class="la la-plus"> إضافة</i>
        </div>
          <form method="POST" action="{{route('customer.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                      <label>إسم  العميل  </label>
                    </div>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="name" id="name" placeholder="إسم   العميل " required="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                      <label>موبايل </label>
                    </div>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="phone" id="phone" placeholder=" موبايل " required="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                      <label>العنوان </label>
                    </div>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="address" id="address" placeholder=" العنوان " required="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                      <label>النقاط  </label>
                    </div>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="points" id="points" placeholder=" النقاط " required="">
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