@extends('layouts.master')
@section('title')
    مناديب البيع
@endsection
@section('content')

<section id="autofill">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if (Session::has('successfully_created'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('successfully_created') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <button class="btn btn-sm btn-primary mb-1" data-toggle="modal" data-target="#addNewSalesRepresentative"><i class="la la-plus" style="font-size:14px"></i> اضافة مندوب بيع</button>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <table class="table table-striped table-bordered auto-fill">
                            <thead>
                                <tr>
                                    <th>الصورة</th>
                                    <th>الأسم</th>
                                    <th>رقم الهاتف</th>
                                    <th>العنوان</th>
                                    <th>المدير</th>
                                    <th>تم بواسطة</th>
                                    <th>تاريخ الأنشاء</th>
                                    <th>خيارات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($salesrepresentatives as $salesrepresentative)
                                    <tr>
                                        <td><img src="{{ asset('images/'.$salesrepresentative->picture.'') }}" width="50" height="50"></td>
                                        <td>{{ $salesrepresentative->name }}</td>
                                        <td>{{ $salesrepresentative->phone }}</td>
                                        <td>{{ $salesrepresentative->address }}</td>
                                        <td>{{ $salesrepresentative->manager['name'] }}</td>
                                        <td>{{ $salesrepresentative->user['name'] }}</td>
                                        <td>{{ $salesrepresentative->created_at->toFormattedDateString() }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-danger"><i class="la la-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="addNewSalesRepresentative" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اضافة مندوب بيع جديد</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['action'=>'SalesRepresentativeController@store','method'=>'POST','files'=>true]) !!}
      <div class="modal-body">
        <div class="form-group">
            {!! Form::file('picture',['class'=>'form-control','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name','الأسم بالكامل') !!}
            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'الأسم بالكامل']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('phone','رقم الهاتف') !!}
            {!! Form::text('phone',null,['class'=>'form-control','placeholder'=>'رقم الهاتف']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('address','العنوان') !!}
            {!! Form::text('address',null,['class'=>'form-control','placeholder'=>'العنوان بالتفصيل']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('national_id','رقم البطاقة') !!}
            {!! Form::text('national_id',null,['class'=>'form-control','placeholder'=>'رقم البطاقة']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('sales_manager_id','المدير') !!}
            {!! Form::select('sales_manager_id',$salesmanagers,null,['class'=>'form-control']) !!}
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">اغلاق</button>
        {!! Form::button('اضافة', ['class'=>'btn btn-sm btn-primary','type'=>'submit']) !!}
        {{-- <button type="button" class="btn btn-primary btn-sm">اضافة</button> --}}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection