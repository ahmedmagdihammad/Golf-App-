@extends('layouts.app')
@section('content')

<div class="app-content content" style="margin-top: 100px">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <div class="p-1">
                    </div>
                  </div>
                  <h2 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Golf App v3</span>
                  </h2>
                </div>
                <div class="card-content">
                  <div class="card-body">


                    <form class="form-horizontal form-simple" method="POST" action="{{ route('login') }}" novalidate>
                      
                        @csrf
                        <div class="form-group">
                            <input id="email" type="email" class="form-control form-control-lg input-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email" autocomplete="email" autofocus required>

                            <div class="form-control-position">
                              <i class="ft-user"></i>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" class="form-control form-control-lg input-lg @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" autocomplete="current-password" required>

                            <div class="form-control-position">
                              <i class="la la-key"></i>
                            </div>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                      <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
                    </form>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

@endsection
