@extends('layouts.master')
@section('title')
   المهمات
@endsection
@section('content')
  <section id="autofill">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add"><i class="la la-plus"></i>  إضافة  المهمة </button>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
          </div>
          <div class="card-content collapse show">
            <div class="card-body card-dashboard">
              @if(count($tasks)>0)
              <table class="table table-striped table-bordered auto-fill">
                <thead>
                  <tr>
                    <th>تم بواسطة</th>
                    <th> المستخدم	</th>
                    <th>إسم المهمة </th>
                    <th> تفاصيل المهمة </th>
                    <th> تاريخ الانتهاء </th>
                    <th> تاريخ الانشاء </th>
                    <th> خيارات </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($tasks as $task)
                  <tr>
                    <td>{{$task->user['name']}}</td>
                    <td>{{$task->user['name']}}</td>
                    <td>{{$task->name}}</td>
                    <td>{{$task->descsription}}</td>
                    <td>{{$task->deadline}}</td>
                    <td>{{$task->created_at}}</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$task->id}}"><i class="la la-edit"></i></button>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete{{$task->id}}"><i class="la la-trash"></i></button>
                    </td>
                  </tr>

                  <!-- Model Edit -->
                    <div id="modal-edit{{$task->id}}" class="modal fade" >
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <i class="la la-edit"> تعديل</i>
                          </div>
                            <form method="POST" action="{{route('task.edit', $task->id)}}" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-body">
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <label>المستخدم </label>
                                    </div>
                                    <div class="col-md-10">
                                      <select class="form-control" name="upuser_id">
                                        <option value="{{$task->user['id']}}">{{$task->user['name']}}</option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <label>إسم المهمة </label>
                                    </div>
                                    <div class="col-md-10">
                                      <input class="form-control" type="text" name="upname" value="{{$task->name}}">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <label>وصف   المهمة </label>
                                    </div>
                                    <div class="col-md-10">
                                      <textarea class="form-control" name="updescsription">{{$task->descsription}}</textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <label>تاريخ الانتهاء </label>
                                    </div>
                                    <div class="col-md-10">
                                      <input class="form-control" type="date" name="updeadline" value="{{$task->deadline}}">
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
                    <div id="modal-delete{{$task->id}}" class="modal fade" >
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <i class="la la-trash"> حذف</i>
                          </div>
                            <form method="POST" action="{{route('task.delete', $task->id)}}">
                              @csrf
                              <div class="modal-body">
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <label>سبب الشكوة</label>
                                      </div>
                                      <div class="col-md-4">
                                        <p>{{$task->name}}</p>
                                      </div>
                                      <div class="col-md-2">
                                        <label>سبب المشكلة</label>
                                      </div>
                                      <div class="col-md-4">
                                        <p>{{$task->description}}</p>
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
          <form method="POST" action="{{route('task.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>المستخدم </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" name="user_id">
                      @foreach($users as $user)
                      <option value="{{$user->id}}">{{$user->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>إسم المهمة </label>
                  </div>
                  <div class="col-md-10">
                    <input class="form-control" type="text" name="name" placeholder="إسم المهمة">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>وصف   المهمة </label>
                  </div>
                  <div class="col-md-10">
                    <textarea class="form-control" name="descsription" placeholder="تفاصيل المهمة"></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>تاريخ الانتهاء </label>
                  </div>
                  <div class="col-md-10">
                    <input class="form-control" type="date" name="deadline">
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