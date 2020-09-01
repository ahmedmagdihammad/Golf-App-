@extends('layouts.master')
@section('title')
   الهدايا
@endsection
@section('content')
  <section id="autofill">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add"><i class="la la-plus"></i>  إضافة  هدية </button>
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
              @if(count($gifts)>0)
              <table class="table table-striped table-bordered auto-fill">
                <thead>
                  <tr>
                    <th>الاسم</th>
                    <th> تم  بواسطة	</th>
                    <th>تاريخ الانشاء</th>
                    <th> خيارات </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($gifts as $gift)
                  <tr>
                    <td>{{$gift->name}}</td>
                    <td>{{$gift->user['name']}}</td>
                    <td>{{$gift->created_at}}</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$gift->id}}"><i class="la la-edit"></i></button>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete{{$gift->id}}"><i class="la la-trash"></i></button>
                    </td>
                  </tr>

                  <!-- Model Edit -->
                    <div id="modal-edit{{$gift->id}}" class="modal fade" >
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <i class="la la-edit"> تعديل</i>
                          </div>
                            <form method="POST" action="{{route('gift.edit', $gift->id)}}" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-body">
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <label>الاسم </label>
                                    </div>
                                    <div class="col-md-10">
                                      <textarea class="form-control" name="upname" placeholder="أدخل إسم الهدية">{{$gift->name}}</textarea>
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
                    <div id="modal-delete{{$gift->id}}" class="modal fade" >
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <i class="la la-trash"> حذف</i>
                          </div>
                            <form method="POST" action="{{route('gift.delete', $gift->id)}}">
                              @csrf
                              <div class="modal-body">
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>الاسم</label>
                                      </div>
                                      <div class="col-md-10">
                                        <p>{{$gift->name}}</p>
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
                  <center><i class="la la-frown-o"></i> لايوجد  هدايا <i class="la la-frown-o"></i></center>
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
          <form method="POST" action="{{route('gift.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>الاسم </label>
                  </div>
                  <div class="col-md-10">
                    <textarea class="form-control" name="name" placeholder="أدخل إسم الهدية"></textarea>
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