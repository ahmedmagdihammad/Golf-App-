@extends('layouts.master')
@section('title')
   الفنين
@endsection
@section('content')
  <section id="autofill">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add"><i class="la la-plus"></i>  إضافة  فنى </button>
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
              @if(count($technicianes)>0)
              <table class="table table-striped table-bordered auto-fill">
                <thead>
                  <tr>
                    <th>صورة </th>
                    <th>إسم   الفنى </th>
                    <th>إسم    التاجر </th>
                    <th>الموبايل</th>
                    <th>العنوان</th>
                    <th>رقم البطاقة</th>
                    <th>تم بواسطة </th>
                    <th>تارخ الانشاء </th>
                    <th> خيارات </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($technicianes as $technician)
                  <tr>
                    <td><img src="{{$technician->picture}}" style="width: 100px; height: 80px; border-radius:50%"></td>
                    <td>{{$technician->name}}</td>
                    <td>@if($technician->merchant_id == 'بدون تاجر' ) بدون تاجر  @else {{$technician->merchant['name']}} @endif</td>
                    <td>{{$technician->phone}}</td>
                    <td>{{$technician->address}}</td>
                    <td>{{$technician->national_id}}</td>
                    <td>{{$technician->user['name']}}</td>
                    <td>{{$technician->created_at}}</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$technician->id}}"><i class="la la-edit"></i></button>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete{{$technician->id}}"><i class="la la-trash"></i></button>
                    </td>
                  </tr>

                  <!-- Model Edit -->
                    <div id="modal-edit{{$technician->id}}" class="modal fade" >
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <i class="la la-edit"> تعديل</i>
                          </div>
                            <form method="POST" action="{{route('technician.edit', $technician->id)}}" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-body">
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>إسم  الفنى </label>
                                      </div>
                                      <div class="col-md-10">
                                        <input class="form-control" type="text" name="upname" id="upname" value="{{$technician->name}}" placeholder="إسم  الفنين " required="">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>إسم   التاجر </label>
                                      </div>
                                      <div class="col-md-10">
                                        <select class="form-control" name="upmerchant_id">
                                          <option value="{{$technician->merchant['id']}}">{{$technician->merchant['name']}}</option>
                                          <option>بدون تاجر</option>
                                          @foreach($merchantes as $merchant)
                                          <option value="{{$merchant->id}}">{{$merchant->name}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>الموبايل</label>
                                      </div>
                                      <div class="col-md-10">
                                        <input class="form-control" type="number" name="upphone" id="upphone" value="{{$technician->phone}}" placeholder="الموبايل" required="">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>العنوان</label>
                                      </div>
                                      <div class="col-md-10">
                                        <input class="form-control" type="text" name="upaddress" id="upaddress" value="{{$technician->address}}" placeholder="العنوان" required="">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>رقم البطاقة</label>
                                      </div>
                                      <div class="col-md-10">
                                        <input class="form-control" type="text" name="upnational_id" id="upnational_id" value="{{$technician->national_id}}" placeholder="رقم البطاقة" required="">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>صورة </label>
                                      </div>
                                      <div class="col-md-7">
                                        <input class="form-control" type="file" name="uppicture" id="uppicture" value="{{$technician->picture}}" placeholder="Enter Address" >
                                      </div>
                                      <div class="col-md-2">
                                        <img src="{{$technician->picture}}" style="width: 100px; height: 80px">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group hidden">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>تم بواسطت</label>
                                      </div>
                                      <div class="col-md-10">
                                        <input class="form-control" type="text" name="upcreated_by" id="upcreated_by" value="{{Auth::user()->id}}" placeholder="Enter Created by" required="">
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
                    <div id="modal-delete{{$technician->id}}" class="modal fade" >
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <i class="la la-trash"> حذف</i>
                          </div>
                            <form method="POST" action="{{route('technician.delete', $technician->id)}}">
                              @csrf
                              <div class="modal-body">
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>إسم   الفنى</label>
                                      </div>
                                      <div class="col-md-4">
                                        <p>{{$technician->name}}</p>
                                      </div>
                                      <div class="col-md-2">
                                        <label>موبايل</label>
                                      </div>
                                      <div class="col-md-4">
                                        <p>{{$technician->phone}}</p>
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
                  <center><i class="la la-frown-o"></i> لايوجد  فنين <i class="la la-frown-o"></i></center>
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
          <form method="POST" action="{{route('technician.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                      <label>إسم  الفنى  </label>
                    </div>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="name" id="name" placeholder="إسم   الفنى " required="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                      <label>إسم   التاجر </label>
                    </div>
                    <div class="col-md-10">
                      <select class="form-control" name="merchant_id">
                        <option value="بدون تاجر">بدون تاجر</option>
                        @foreach($merchantes as $merchant)
                        <option value="{{$merchant->id}}">{{$merchant->name}}</option>
                        @endforeach
                      </select>
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
                      <label>رقم البطاقة </label>
                    </div>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="national_id" id="national_id" placeholder=" رقم البطاقة " required="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                      <label>صورة </label>
                    </div>
                    <div class="col-md-10">
                      <input class="form-control" type="file" name="picture" id="picture" placeholder="صورة " required="">
                    </div>
                  </div>
                </div>
                <div class="form-group hidden">
                  <div class="row">
                    <div class="col-md-2">
                      <label>تم بواسطت</label>
                    </div>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="created_by" id="created_by" value="{{Auth::user()->id}}" placeholder="Enter Name" required="">
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