@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')

    <div class="container mt-3">
        <div class="row justify-content-center mt-3">
            <div class="col-12">
                <h3>Customers</h3>

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-2">
                                <a href="{{ route('customers.create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Create Customer</a>
                            </div>
                            <div class="col-md-6">
                                <form class="d-flex" role="search" action="{{ route('customers.index') }}" method="GET">
                                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>

                            <div class="col-md-2">
                                <form action="{{ route('customers.index') }}" method="GET" class="form-order">
                                    {{-- @csrf --}}
                                    <div class="input-group ms-2">
                                        <select class="form-select" name="order" onchange="this.form.submit()">
                                            <option @selected(request('order') == 'desc') value="desc">Newest To Oldest</option>
                                            <option @selected(request('order') == 'asc') value="asc">Oldest To Newest</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2 text-end">
                                <a href="{{ route('customers.soft') }}" class="btn btn-dark"><i class="fa-solid fa-trash"></i> Trash</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <h1>Customer Page</h1>
        </div>
        
        <div class="d-flex justify-content-center mt-3">
            <table class="table table-dark table-striped table-hover table-bordered text-center">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    {{-- <th scope="col">image</th> --}}
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Bank Account</th>
                    <th scope="col">About</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($customers as $customer)
                  <tr>
                    <td>{{$customer['id']}}</td>
                    {{-- <td>
                      <img src="{{asset('uploads/'.$customer['file'])}}" width="40px" height="40px" alt="">
                    </td> --}}
                    <td>{{$customer['first_name']}}</td>
                    <td>{{$customer['last_name']}}</td>
                    <td>{{$customer['email']}}</td>
                    <td>{{$customer['phone']}}</td>
                    <td>{{$customer['bank_account']}}</td>
                    <td>{{$customer['about']}}</td>
                    <td>
                      <div class="d-flex justify-content-center">
                        <a href="{{ route('customers.edit' , $customer->id) }}" class="btn btn-primary"><i class="fa-regular fa-pen-to-square btn btn-primary"></i></a>
                        <a href="{{ route('customers.show' , $customer->id) }}" class="btn btn-success ms-2 me-2"><i class="fa-solid fa-eye btn btn-success"></i></a>
                        <form action="{{ route('customers.destroy' , $customer->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger"><i class="fa-solid fa-trash btn btn-danger"></i></button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection