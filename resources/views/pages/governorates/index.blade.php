@extends('layouts.master')
@section('title')
    المحافظات
@endsection
@section('content')
  <section id="autofill">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-sm mt-2 mb-2 btn-primary" data-toggle="modal" data-target="#addNewGovernorateModal"><i class="la la-plus" style="font-size:14px"></i> اضافة جديد</button>

                    @if (Session::has('successfully_created'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('successfully_created') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>تم بواسطة</th>
                            <th>تاريخ الأنشاء</th>
                            <th>خيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($governorates as $governorate)
                            <tr>
                                <td>{{ $governorate->name }}</td>
                                <td>{{ $governorate->user['name'] }}</td>
                                <td>{{ $governorate->created_at->toFormattedDateString() }}</td>
                                <td>
                                    <button class="btn btn-sm btn-danger" title="Delete"><i class="la la-trash"></i></button>
                                    <button class="btn btn-sm btn-success" title="Edit"><i class="la la-edit"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-center m-auto">
                    {{ $governorates->render() }}
                </div>
            </div>
        </div>
    </div>
</section>
    
    
<!-- Modal -->
<div class="modal fade" id="addNewGovernorateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اضافة محافظة جديدة</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['action'=>'GovernoratesController@store','method'=>'POST']) !!}
      <div class="modal-body">
        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'مثال : القاهرة , الجيزة , إلخ ..']) !!}
        {!! Form::hidden('created_by',Auth()->user()->id) !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">اغلاق</button>
        <button type="submit" class="btn btn-primary btn-sm">حفظ التغييرات</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
</div>

@endsection