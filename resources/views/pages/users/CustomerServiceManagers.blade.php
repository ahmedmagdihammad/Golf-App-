@extends('layouts.master')
@section('title')
	مديرين المحافظات
@endsection
@section('content')
<section>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add"><i class="la la-plus" style="font-size:14px"></i>  إضافة  مدير خدمة عملاء</button>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        </div>
        <div class="card-body">
          <div class="card-body">
            @if(count($CustomerServiceManagers)>0)
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>صورة </th>
                  <th>الأسم </th>
                  <th>الموبايل</th>
                  <th>العنوان</th>
                  {{-- <th>رقم البطاقة</th> --}}
                  <th>مدير المحافظة </th>
                  <th>تم بواسطة </th>
                  <th>تارخ الانشاء </th>
                  <th> خيارات </th>
                </tr>
              </thead>
              <tbody>
                @foreach($CustomerServiceManagers as $cust_servi_manag)
                <tr>
                  <td><img src="{{$cust_servi_manag->picture}}" style="width: 64px; height: 64px;border-radius:50%"></td>
                  <td>{{$cust_servi_manag->name}}</td>
                  <td>{{$cust_servi_manag->phone}}</td>
                  <td>{{$cust_servi_manag->address}}</td>
                  {{-- <td>{{$cust_servi_manag->national_id}}</td> --}}
                  <td>{{$cust_servi_manag->manager['name']}}</td>
                  
                  <td>{{$cust_servi_manag->user['name']}}</td>
                  <td>{{$cust_servi_manag->created_at->toFormattedDateString()}}</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$cust_servi_manag->id}}"><i class="la la-edit"></i></button>
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete{{$cust_servi_manag->id}}"><i class="la la-trash"></i></button>
                  </td>
                </tr>

                <!-- Model Edit -->
                  <div id="modal-edit{{$cust_servi_manag->id}}" class="modal fade" >
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <i class="la la-edit"> تعديل</i>
                          {{-- <a href="#" data-dismiss="modal" class="la la-close"></a> --}}
                        </div>
                          <form method="POST" action="{{route('cust_servi_manag.edit', $cust_servi_manag->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-md-2">
                                    <label>إسم  مدير خدمة العلاء </label>
                                  </div>
                                  <div class="col-md-10">
                                    <input class="form-control" type="text" name="upname" id="upname" value="{{$cust_servi_manag->name}}" placeholder="إسم   مدير خدمة العلاء" required="">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-md-2">
                                    <label>مدير المحافظة</label>
                                  </div>
                                  <div class="col-md-10">
                                    <select class="form-control" name="upgovernorate_manager_id" required="">
                                      <option value="{{$cust_servi_manag->manager['id']}}">{{$cust_servi_manag->manager['name']}}</option>
                                      @foreach($GovManagers as $GovManag)
                                      <option value="{{$GovManag->id}}">{{$GovManag->name}}</option>
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
                                    <input class="form-control" type="number" name="upphone" id="upphone" value="{{$cust_servi_manag->phone}}" placeholder="الموبايل" required="">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-md-2">
                                    <label>العنوان</label>
                                  </div>
                                  <div class="col-md-10">
                                    <input class="form-control" type="text" name="upaddress" id="upaddress" value="{{$cust_servi_manag->address}}" placeholder="العنوان" required="">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-md-2">
                                    <label>رقم البطاقة</label>
                                  </div>
                                  <div class="col-md-10">
                                    <input class="form-control" type="text" name="upnational_id" id="upnational_id" value="{{$cust_servi_manag->national_id}}" placeholder="رقم البطاقة" required="">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-md-2">
                                    <label>صورة </label>
                                  </div>
                                  <div class="col-md-7">
                                    <input class="form-control" type="file" name="uppicture" id="uppicture" value="{{$cust_servi_manag->picture}}" placeholder="Enter Address" >
                                  </div>
                                  <div class="col-md-2">
                                    <img src="{{$cust_servi_manag->picture}}" style="width: 100px; height: 80px">
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
                  <div id="modal-delete{{$cust_servi_manag->id}}" class="modal fade" >
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <i class="la la-trash"> حذف</i>
                          {{-- <a href="#" data-dismiss="modal" class="la la-close"></a> --}}
                        </div>
                          <form method="POST" action="{{route('cust_servi_manag.delete', $cust_servi_manag->id)}}">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <label>إسم  مدير  البيع</label>
                                    </div>
                                    <div class="col-md-4">
                                      <p>{{$cust_servi_manag->name}}</p>
                                    </div>
                                    <div class="col-md-2">
                                      <label>موبايل</label>
                                    </div>
                                    <div class="col-md-4">
                                      <p>{{$cust_servi_manag->phone}}</p>
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
              </tbody>
              @else
              <br>
              <br>
              <br>
              <center><i class="la la-frown-o"></i> لايوجد   مدرين البيع <i class="la la-frown-o"></i></center>
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

<!-- Model Add -->
  <div id="modal-add" class="modal fade ">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <i class="la la-plus"> إضافة</i>
          {{-- <a href="#" data-dismiss="modal" class="la la-close"></a> --}}
        </div>
          <form method="POST" action="{{route('cust_servi_manag.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                      <label>إسم  مدير خدمة العلاء</label>
                    </div>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="name" id="name" placeholder="إسم  مدير خدمة العلاء" required="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                      <label>مدير الحافظة </label>
                    </div>
                    <div class="col-md-10">
                      <select class="form-control" name="governorate_manager_id" required="">
                        @foreach($GovManagers as $GovManager)
                        <option value="{{$GovManager->id}}">{{$GovManager->name}}</option>
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