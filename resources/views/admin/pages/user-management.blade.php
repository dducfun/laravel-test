@extends('admin.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('admin.content')
    @include('admin.layouts.navbars.auth.topnav', ['title' => 'User Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="alert alert-light" role="alert">
                Đây là danh sách user admin.
            </div>
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Users</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Create Date</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($data))
                                    @foreach($data as $cust)
                                        <tr>
                                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                                                <p class="text-sm font-weight-bold mb-0">{{ $cust->id ?? 'df' }}</p>
                                            </td>
                                            <td>
                                                <div class="d-flex px-3 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $cust->email }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $cust->role ?? 'Chua xac dinh' }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-sm font-weight-bold mb-0">{{ $cust->remember_token ?? 'NULL' }}</p>
                                            </td>
                                            <td class="align-middle text-end">
                                                <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                    <a href="{{ route('admin.edit', ['user_manager' , $cust->id]) }}" class="text-sm font-weight-bold mb-0">Edit</a>
                                                    <form role="form" method="post" action="{{ route('admin.delete',  ['user_manager', $cust->id]) }}" id="delete-form">
                                                        @csrf
                                                        <button type="submit"
                                                           class="nav-link text-white font-weight-bold px-0">
                                                            <i class="fa fa-user me-sm-1"></i>
                                                            <span class="d-sm-inline d-none">Delete</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex">
                        {!! $data->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.footers.auth.footer')
@endsection
