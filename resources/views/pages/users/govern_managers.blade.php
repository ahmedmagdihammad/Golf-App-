@extends('layouts.master')
@section('title')
	مديرين المحافظات
@endsection
@section('content')
  <section class="container mt-3" id="autofill">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add"><i class="la la-plus" style="font-size:14px"></i>  إضافة  مدير محافظة</button>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
            </div>
          </div>
          <div class="card-content collapse show">
            <div class="card-body card-dashboard">
              @if(count($govern_managers)>0)
              <table class="table table-striped table-bordered auto-fill">
                <thead>
                  <tr>
                    <th>صورة </th>
                    <th>إسم</th>
                    <th>الموبايل</th>
                    <th>العنوان</th>
                    {{-- <th>رقم البطاقة</th> --}}
                    <th>تم بواسطة </th>
                    <th>تارخ الانشاء </th>
                    <th> خيارات </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($govern_managers as $gov_manag)
                  <tr>
                    <td><img src="{{$gov_manag->picture}}" style="width: 64px; height: 64px;border-radius:50%"></td>
                    <td>{{$gov_manag->name}}</td>
                    <td>{{$gov_manag->phone}}</td>
                    <td>{{$gov_manag->address}}</td>
                    {{-- <td>{{$gov_manag->national_id}}</td> --}}
                    <td>{{$gov_manag->user['name']}}</td>
                    <td>{{$gov_manag->created_at}}</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$gov_manag->id}}"><i class="la la-edit"></i></button>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete{{$gov_manag->id}}"><i class="la la-trash"></i></button>
                    </td>
                  </tr>

                  <!-- Model Edit -->
                    <div id="modal-edit{{$gov_manag->id}}" class="modal fade" >
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <i class="la la-edit"> تعديل</i>
                            <a href="#" data-dismiss="modal" class="la la-close"></a>
                          </div>
                            <form method="POST" action="{{route('gov_manag.edit', $gov_manag->id)}}" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-body">
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>إسم  مدير المحافظة</label>
                                      </div>
                                      <div class="col-md-10">
                                        <input class="form-control" type="text" name="upname" id="upname" value="{{$gov_manag->name}}" placeholder="Enter Name" required="">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>الموبايل</label>
                                      </div>
                                      <div class="col-md-10">
                                        <input class="form-control" type="number" name="upphone" id="upphone" value="{{$gov_manag->phone}}" placeholder="Enter Mobile" required="">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>العنوان</label>
                                      </div>
                                      <div class="col-md-10">
                                        <input class="form-control" type="text" name="upaddress" id="upaddress" value="{{$gov_manag->address}}" placeholder="Enter Address" required="">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>رقم البطاقة</label>
                                      </div>
                                      <div class="col-md-10">
                                        <input class="form-control" type="text" name="upnational_id" id="upnational_id" value="{{$gov_manag->national_id}}" placeholder="Enter Address" required="">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>صورة </label>
                                      </div>
                                      <div class="col-md-7">
                                        <input class="form-control" type="file" name="uppicture" id="uppicture" value="{{$gov_manag->picture}}" placeholder="Enter Address" >
                                      </div>
                                      <div class="col-md-2">
                                        <img src="{{$gov_manag->picture}}" style="width: 100px; height: 80px">
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
                    <div id="modal-delete{{$gov_manag->id}}" class="modal fade" >
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <i class="la la-trash"> حذف</i>
                            <a href="#" data-dismiss="modal" class="la la-close"></a>
                          </div>
                            <form method="POST" action="{{route('gov_manag.delete', $gov_manag->id)}}">
                              @csrf
                              <div class="modal-body">
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>إسم  مدير المحافظة</label>
                                      </div>
                                      <div class="col-md-4">
                                        <p>{{$gov_manag->name}}</p>
                                      </div>
                                      <div class="col-md-2">
                                        <label>موبايل</label>
                                      </div>
                                      <div class="col-md-4">
                                        <p>{{$gov_manag->phone}}</p>
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
                  <h4 class="text-center mt-3"><i class="la la-frown-o"></i> لايوجد مديرين محافظات <i class="la la-frown-o"></i></h4>
                  <br>
                  <br>
                  <br>
                  <br>
                  @endif
                </tbody>
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
          <h3>
              <i class="la la-plus"> </i>
              إضافة  
          </h3>
          
        </div>
          <form method="POST" action="{{route('gov_manag.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                      <label>إسم  مدير المحافظة</label>
                    </div>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="name" id="name" placeholder="إسم مدير المحافظة" required="">
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
                      <input class="form-control" type="file" name="picture" id="picture" placeholder=" صورة " required="">
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
                <div class="accordion" id="accordionExample">
                  @foreach ($governorates as $governorate)
                    <div class="card ">
                      <div class="card-header  bg-dark" id="headingOne{{$governorate->id}}">
                        <h2 class="mb-0">
                          <button class="btn btn-link text-light" type="button" data-toggle="collapse" data-target="#collapseOne{{$governorate->id}}" aria-expanded="true" aria-controls="collapseOne{{$governorate->id}}">
                            <div class="custom-control custom-checkbox d-inline-block ml-2">
                                <input type="checkbox" onchange="checkStates(this)" name="{{$governorate->id}}" class="custom-control-input" id="customCheck{{$governorate->id}}">
                                <label class="custom-control-label" for="customCheck{{$governorate->id}}"></label>
                              </div>
                            {{ $governorate->name }}
                          </button>
                        </h2>
                      </div>
                  
                      <div id="collapseOne{{$governorate->id}}" class="collapse" aria-labelledby="headingOne{{$governorate->id}}" data-parent="#accordionExample">
                        <div class="card-body">
                          @if (count($governorate->states) <= 0)
                            <h4 class="text-center">لا يوجد مراكز لهذة المحافظة</h4>
                            <small class="d-block text-center">
                              <a href="{{ route('states.index') }}">
                                  <i class="la la-plus-circle" style="font-size:14px"></i> اضافة مركز جديد
                              </a>
                            </small>
                          @endif
                          @if (count($governorate->states) > 0)
                          @foreach ($governorate->states as $state)
                            <div class="custom-control custom-checkbox d-inline-block ml-2">
                              <input type="checkbox" name="{{ $state->id }}" class="custom-control-input governorateId{{ $governorate->id }}" id="customCheck{{ $state->id }}">
                              <label class="custom-control-label" for="customCheck{{ $state->id }}">{{ $state->name }}</label>
                            </div>
                          @endforeach
                          @endif
                         
                        </div>
                      </div>
                    </div>
                  @endforeach
                    
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">إلغاء</button>
              <button type="submit" class="btn btn-primary btn-sm">حفظ</button>
            </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
    <script>
      function checkStates(checkbox){
        if(checkbox.checked)
        {
          var governorate_id = checkbox.id;
          $(".governorateId"+governorate_id.charAt(checkbox.id.length -1)+"").attr("checked","checked");
        }else{
          var governorate_id = checkbox.id;
          $(".governorateId"+governorate_id.charAt(checkbox.id.length -1)+"").removeAttr("checked");
        }
        
        
      }
    </script>
@endsection