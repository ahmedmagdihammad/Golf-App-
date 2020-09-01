@extends('layouts.master')
@section('title')
   الشكاوى
@endsection
@section('content')
<section id="autofill">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add"><i class="la la-plus"></i>  إضافة  شكوة </button>
          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        </div>
        <div class="card-content collapse show">
          <div class="card-body card-dashboard">
            @if(count($complaints)>0)
            <table class="table table-striped table-bordered auto-fill">
              <thead>
                <tr>
                  <th>سبب الشكوة</th>
                  <th> وصف الشكوة </th>
                  <th>تم بواسطة </th>
                  <th> تاريخ الانشاء </th>
                  <th> خيارات </th>
                </tr>
              </thead>
              <tbody>
                @foreach($complaints as $complaint)
                  <tr>
                    <td>{{$complaint->name}}</td>
                    <td>{{$complaint->descsription}}</td>
                    <td>{{$complaint->user['name']}}</td>
                    <td>{{$complaint->created_at}}</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$complaint->id}}"><i class="la la-edit"></i></button>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete{{$complaint->id}}"><i class="la la-trash"></i></button>
                    </td>
                  </tr>

                <!-- Model Edit -->
                    <div id="modal-edit{{$complaint->id}}" class="modal fade" >
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <i class="la la-edit"> تعديل</i>
                          </div>
                          <form method="POST" action="{{route('complaint.edit', $complaint->id)}}" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-body">
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <label>سبب الشكوة </label>
                                    </div>
                                    <div class="col-md-10">
                                      <input class="form-control" type="text" name="upname" value="{{$complaint->name}}">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <label>وصف المشكلة </label>
                                    </div>
                                    <div class="col-md-10">
                                      <textarea class="form-control" name="updescsription">{{$complaint->descsription}}</textarea>
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
                    <div id="modal-delete{{$complaint->id}}" class="modal fade" >
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <i class="la la-trash"> حذف</i>
                          </div>
                          <form method="POST" action="{{route('complaint.delete', $complaint->id)}}">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <label>سبب الشكوة</label>
                                    </div>
                                    <div class="col-md-4">
                                      <p>{{$complaint->name}}</p>
                                    </div>
                                    <div class="col-md-2">
                                      <label>سبب المشكلة</label>
                                    </div>
                                    <div class="col-md-4">
                                      <p>{{$complaint->description}}</p>
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
          <form method="POST" action="{{route('complaint.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>سبب الشكوة </label>
                  </div>
                  <div class="col-md-10">
                    <input class="form-control" type="text" name="name" placeholder="سبب المشكلة">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>وصف المشكلة </label>
                  </div>
                  <div class="col-md-10">
                    <textarea class="form-control" name="descsription" placeholder="وصف المشكلة..."></textarea>
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