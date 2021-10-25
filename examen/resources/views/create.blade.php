@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @if($errors->any())
            <h4>{{$errors->first()}}</h4>
            @endif
            <div class="card">
                <div class="card-header">Add a new customer</div>

                <div class="card-body">
                  <form action="{{route('customers.store')}}" method="post">
                    @csrf
                    <div class="form-group row {{ $errors->has('code') ? 'has-danger' : '' }}">
                      <label class="col-sm-3 col-form-label">Code</label>
                      <div class="col-sm-9">
                        <input class="form-control {{ $errors->has('code') ? 'form-control-danger' : '' }}" type="text" placeholder="Code" name="code" value="{{old('code')}}">
                        @if ($errors->has('code'))
                            <div class="form-control-feedback">{{ $errors->first('code') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="form-group row {{ $errors->has('company_name') ? 'has-danger' : '' }}">
                      <label class="col-sm-3 col-form-label">Company Name</label>
                      <div class="col-sm-9">
                        <input class="form-control {{ $errors->has('company_name') ? 'form-control-danger' : '' }}" type="text" placeholder="Company Name" name="company_name" value="{{old('company_name')}}">
                        @if ($errors->has('company_name'))
                            <div class="form-control-feedback">{{ $errors->first('code') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="form-group row {{ $errors->has('name') ? 'has-danger' : '' }}">
                      <label class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input class="form-control {{ $errors->has('name') ? 'form-control-danger' : '' }}" type="text" placeholder="Name" name="name" value="{{old('name')}}">
                        @if ($errors->has('name'))
                            <div class="form-control-feedback">{{ $errors->first('code') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="form-group row {{ $errors->has('country') ? 'has-danger' : '' }}">
                      <label class="col-sm-3 col-form-label">Country</label>
                      <div class="col-sm-9">
                        <input class="form-control {{ $errors->has('country') ? 'form-control-danger' : '' }}" type="text" placeholder="Country" name="country" value="{{old('country')}}">
                        @if ($errors->has('country'))
                            <div class="form-control-feedback">{{ $errors->first('country') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="form-group row {{ $errors->has('state') ? 'has-danger' : '' }}">
                      <label class="col-sm-3 col-form-label">State</label>
                      <div class="col-sm-9">
                        <input class="form-control {{ $errors->has('state') ? 'form-control-danger' : '' }}" type="text" placeholder="State" name="state" value="{{old('state')}}">
                        @if ($errors->has('state'))
                            <div class="form-control-feedback">{{ $errors->first('state') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="form-group row {{ $errors->has('city') ? 'has-danger' : '' }}">
                      <label class="col-sm-3 col-form-label">City</label>
                      <div class="col-sm-9">
                        <input class="form-control {{ $errors->has('city') ? 'form-control-danger' : '' }}" type="text" placeholder="city" name="city" value="{{old('city')}}">
                        @if ($errors->has('city'))
                            <div class="form-control-feedback">{{ $errors->first('city') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="form-group row {{ $errors->has('email') ? 'has-danger' : '' }}">
                      <label class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input class="form-control {{ $errors->has('email') ? 'form-control-danger' : '' }}" type="text" placeholder="email" name="email" value="{{old('email')}}">
                        @if ($errors->has('email'))
                            <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="form-group row {{ $errors->has('phone') ? 'has-danger' : '' }}">
                      <label class="col-sm-3 col-form-label">Phone</label>
                      <div class="col-sm-9">
                        <input class="form-control {{ $errors->has('phone') ? 'form-control-danger' : '' }}" type="text" placeholder="Phone" name="phone" value="{{old('phone')}}">
                        @if ($errors->has('phone'))
                            <div class="form-control-feedback">{{ $errors->first('phone') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="form-group row {{ $errors->has('currency') ? 'has-danger' : '' }}">
                      <label class="col-sm-3 col-form-label">Currency</label>
                      <div class="col-sm-9">
                        <input class="form-control {{ $errors->has('city') ? 'form-control-danger' : '' }}" type="text" placeholder="currency" name="currency" value="{{old('currency')}}">
                        @if ($errors->has('currency'))
                            <div class="form-control-feedback">{{ $errors->first('currency') }}</div>
                        @endif
                      </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-12 text-right">
                          <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
