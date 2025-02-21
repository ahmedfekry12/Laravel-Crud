@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <h3>Edit Customer's informations</h3>
            @if ($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach    
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col md-2">
                            <a href="{{ route('customers.index') }}" class="btn btn-success"><i class="fas fa-chevron-left"></i> Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('customers.update' , $customer->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 md-3">
                                    <img style="width:70px" src="{{ asset($customer->file) }}">
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" name="file" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input type="text" name="first_name" id="" class="form-control" value="{{$customer['first_name']}}">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <input type="text" name="last_name" id="" class="form-control" value="{{$customer['last_name']}}">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" id="" class="form-control" value="{{$customer['email']}}">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="text" name="phone" id="" class="form-control" value="{{$customer['phone']}}">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="">Bank Account Number</label>
                                        <input type="text" name="bank_account" id="" class="form-control" value="{{$customer['bank_account']}}">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="">About</label>
                                        <textarea name="about" class="form-control" id="">{{$customer['about']}}</textarea>
                                    </div>
                                </div>
        
                                <div class="col md-8 mt-3">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection