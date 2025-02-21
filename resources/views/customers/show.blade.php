@extends('layouts.app')

@section('content')

<div class="row py-5 px-4">
    <div class="col-md-5 mx-auto">
        <a href="{{ route('customers.index') }}" class="btn btn-success mb-1"><i class="fas fa-chevron-left"></i> Back</a>
        <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 cover">
                <div class="media align-items-end profile-head d-flex">
                    <div class="profile mt-4 mr-3">
                        <img class="rounded mb-2 img-thumbnail" style="width: 150px" src="{{ asset($customer->file) }}">
                    </div>
                    {{-- <div class="media-body mb-5 ms-3">
                        <h4 class="mt-0 mb-5">{{$customer->first_name}} {{$customer->last_name}}</h4>
                        <p class="small mb-4">{{$customer->email}}</p>
                    </div> --}}
                </div>
            </div>

            <div class="px-4 py-3">
                <div class="p-4 rounded shadow-sm bg-light">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td style="width:250px">First Name</td>
                                <td style="width:250px">{{$customer->first_name}}</td>
                            </tr>
                            <tr>
                                <td style="width:250px">Last Name</td>
                                <td style="width:250px">{{$customer->last_name}}</td>
                            </tr>
                            <tr>
                                <td style="width:250px">Email</td>
                                <td style="width:250px">{{$customer->email}}</td>
                            </tr>
                            <tr>
                                <td style="width:250px">Phone</td>
                                <td style="width:250px">{{$customer->phone}}</td>
                            </tr>
                            <tr>
                                <td style="width:250px">Bank Account</td>
                                <td style="width:250px">{{$customer->bank_account}}</td>
                            </tr>
                            <tr>
                                <td style="width:250px">About</td>
                                <td style="width:250px">{{$customer->about}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection