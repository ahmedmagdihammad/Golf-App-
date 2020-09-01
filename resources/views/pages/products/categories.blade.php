@extends('layouts.master')
@section('title')
	الاصناف
@endsection
@section('content')

  <section id="autofill">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add">إضافة صنف</button>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
            <h4 class="card-title">قائمة الاصناف</h4>
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
              @if(count($categories)>0)
              <table class="table table-striped table-bordered auto-fill">
                <thead>
                  <tr>
                    <th>إسم الصنف</th>
                    <th>تم بواسطة</th>
                    <th>تاريخ الانشاء</th>
                    <th> خيارات </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($categories as $category)
                  <tr>
                    <td>{{$category->name}}</td>
                    <td>{{$category->user['name']}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$category->id}}"><i class="la la-edit"></i></button>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete{{$category->id}}"><i class="la la-trash"></i></button>
                    </td>
                  </tr>

                  <!-- Model Edit -->
                    <div id="modal-edit{{$category->id}}" class="modal fade" >
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <i class="la la-edit"> تعديل</i>
                          </div>
                            <form method="POST" action="{{route('category.edit', $category->id)}}">
                              @csrf
                              <div class="modal-body">
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>إسم الصنف</label>
                                      </div>
                                      <div class="col-md-10">
                                        <input class="form-control" type="text" name="upname" id="upname" value="{{$category->name}}" placeholder="Enter Name" required="">
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
                    <div id="modal-delete{{$category->id}}" class="modal fade" >
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <i class="la la-trash"> حذف</i>
                          </div>
                            <form method="POST" action="{{route('category.delete', $category->id)}}">
                              @csrf
                              <div class="modal-body">
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>إسم الصنف</label>
                                      </div>
                                      <div class="col-md-4">
                                        <p>{{$category->name}}</p>
                                      </div>
                                      <div class="col-md-2">
                                        <label>تم بواسطت</label>
                                      </div>
                                      <div class="col-md-4">
                                        <p>{{$category->User['name']}}</p>
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
                  <center><i class="la la-frown-o"></i> Not Categories <i class="la la-frown-o"></i></center>
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
          <form method="POST" action="{{route('category.store')}}">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                      <label>إسم الصنف</label>
                    </div>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="name" id="name" placeholder="Enter Name" required="">
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