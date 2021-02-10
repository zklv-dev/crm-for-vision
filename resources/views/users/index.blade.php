@extends('layouts.app')


@section('content')
    {{-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                    @if (Auth::id() !== $user->id)
                        {!!  Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                        {!!  Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!!  Form::close() !!}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>


    {!!  $data->render() !!}


    <p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p> --}}
    @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">

            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Пользователи</h4>
                </div>
                <!--end card-header-->
                <div class="card-body">
                    <div class="button-items">
                        @can('user-create')
                            <a href="{{ route('users.create') }}" type="button"
                                class="btn btn-primary waves-effect waves-light">Добавить пользователя</a>
                        @endcan
                    </div>
                </div>
                <!--end card-body-->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Имя</th>
                                    <th>Email</th>
                                    <th>Роли</th>
                                    <th width="280px">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $user)
                                    @if (!$user->hasRole('Admin'))
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $v)
                                                        <label class="badge badge-success">{{ $v }}</label>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @can('user-edit')
                                                    <a class="btn btn-primary"
                                                        href="{{ route('users.edit', $user->id) }}">Изменить</a>
                                                @endcan
                                                @can('user-delete')
                                                    @if (Auth::id() !== $user->id)
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy',
                                                        $user->id], 'style' => 'display:inline']) !!}
                                                        {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                    @endif
                                                @endcan
                                            </td>
                                        </tr>

                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <!--end /table-->
                    </div>
                    <!--end /tableresponsive-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection
