@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          @if(Session::has('jsAlert'))

          <script type="text/javascript" >
            alert({{ session()->get('jsAlert') }});
          </script>

          @endif
            <div class="card">
                <div class="card-header">Dashboard <a href="{{route('customers.create')}}" class="btn btn-success mx-1 float-right">Add New Customer</a></div>

                <div class="card-body">
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Code</th>
                          <th scope="col">Company</th>
                          <th scope="col">Name</th>
                          <th scope="col">Contry</th>
                          <th scope="col">Currency</th>
                          <th scope="col">Name</th>
                          <th scope="col">State</th>
                          <th scope="col">City</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Email</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($customers as $key=>$customer)
                        <tr>
                          <th scope="row">{{$customer->id}}</th>
                          <td>{{$customer->code}}</td>
                          <td>{{$customer->company_name}}</td>
                          <td>{{$customer->name}}</td>
                          <td>{{$customer->country}}</td>
                          <td>{{$customer->currency}}</td>
                          <td>{{$customer->name}}</td>
                          <td>{{$customer->state}}</td>
                          <td>{{$customer->city}}</td>
                          <td>{{$customer->phone}}</td>
                          <td>{{$customer->email}}</td>
                          <td><a href="{{route('customers.edit', $customer->id)}}" class="btn btn-warning">Edit</a><td>
                          <button data-route="{{route('customers.destroy',$customer->id)}}" class="btn btn-danger btn-delete" type="button" data-toggle="modal" data-target="#modal-delete-customer" >Delete</button>
                        </tr>
                      @endforeach
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-delete-customer" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white"><i class="fa fa-trash-o mr-1"></i>Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure?
      </div>
      <div class="modal-footer">
          <form action="" method="POST" id="form-delete">
            {{ csrf_field() }}
            @method('DELETE')
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fa fa-close mr-1"></i>Cancel</button>
            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash-o mr-1"></i>Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>



@endsection
