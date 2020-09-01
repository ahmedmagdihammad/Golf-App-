@extends('layouts.master')
@section('title')
	مديرين المحافظات
@endsection
@section('content')
  <section id="autofill">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add"><i class="la la-plus" style="font-size:14px"></i>  إضافة  مدير بيع</button>
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
              @if(count($salesManagers)>0)
              <table class="table table-striped table-bordered auto-fill">
                <thead>
                  <tr>
                    <th>صورة </th>
                    <th>إسم  مدير البيع</th>
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
                  @foreach($salesManagers as $sales_manag)
                  <tr>
                    <td><img src="{{$sales_manag->picture}}" style="width: 64px; height: 64px;border-radius:50%"></td>
                    <td>{{$sales_manag->name}}</td>
                    <td>{{$sales_manag->phone}}</td>
                    <td>{{$sales_manag->address}}</td>
                    {{-- <td>{{$sales_manag->national_id}}</td> --}}
                    <td>{{$sales_manag->manager['name']}}</td>
                    <td>{{$sales_manag->user['name']}}</td>
                    <td>{{$sales_manag->created_at}}</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$sales_manag->id}}"><i class="la la-edit"></i></button>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete{{$sales_manag->id}}"><i class="la la-trash"></i></button>
                    </td>
                  </tr>

                  <!-- Model Edit -->
                    <div id="modal-edit{{$sales_manag->id}}" class="modal fade" >
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <i class="la la-edit"> تعديل</i>
                            {{-- <a href="#" data-dismiss="modal" class="la la-close"></a> --}}
                          </div>
                            <form method="POST" action="{{route('sales_manag.edit', $sales_manag->id)}}" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-body">
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>إسم  مدير  البيع</label>
                                      </div>
                                      <div class="col-md-10">
                                        <input class="form-control" type="text" name="upname" id="upname" value="{{$sales_manag->name}}" placeholder="إسم  مدرين لبيع" required="">
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
                                          <option value="{{$sales_manag->manager['id']}}">{{$sales_manag->manager['name']}}</option>
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
                                        <input class="form-control" type="number" name="upphone" id="upphone" value="{{$sales_manag->phone}}" placeholder="الموبايل" required="">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>العنوان</label>
                                      </div>
                                      <div class="col-md-10">
                                        <input class="form-control" type="text" name="upaddress" id="upaddress" value="{{$sales_manag->address}}" placeholder="العنوان" required="">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>رقم البطاقة</label>
                                      </div>
                                      <div class="col-md-10">
                                        <input class="form-control" type="text" name="upnational_id" id="upnational_id" value="{{$sales_manag->national_id}}" placeholder="رقم البطاقة" required="">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>صورة </label>
                                      </div>
                                      <div class="col-md-7">
                                        <input class="form-control" type="file" name="uppicture" id="uppicture" value="{{$sales_manag->picture}}" placeholder="Enter Address" >
                                      </div>
                                      <div class="col-md-2">
                                        <img src="{{$sales_manag->picture}}" style="width: 100px; height: 80px">
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
                    <div id="modal-delete{{$sales_manag->id}}" class="modal fade" >
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <i class="la la-trash"> حذف</i>
                            {{-- <a href="#" data-dismiss="modal" class="la la-close"></a> --}}
                          </div>
                            <form method="POST" action="{{route('sales_manag.delete', $sales_manag->id)}}">
                              @csrf
                              <div class="modal-body">
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>إسم  مدير  البيع</label>
                                      </div>
                                      <div class="col-md-4">
                                        <p>{{$sales_manag->name}}</p>
                                      </div>
                                      <div class="col-md-2">
                                        <label>موبايل</label>
                                      </div>
                                      <div class="col-md-4">
                                        <p>{{$sales_manag->phone}}</p>
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
                  <center><i class="la la-frown-o"></i> لايوجد   مدرين البيع <i class="la la-frown-o"></i></center>
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
          {{-- <a href="#" data-dismiss="modal" class="la la-close"></a> --}}
        </div>
          <form method="POST" action="{{route('sales_manag.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                      <label>إسم  مدير  البيع</label>
                    </div>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="name" id="name" placeholder="إسم مدير  البيع" required="">
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