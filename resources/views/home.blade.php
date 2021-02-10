{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('layouts.app')

@section('content')
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
                    <h4 class="card-title">Клиенты</h4>
                </div>
                <!--end card-header-->
                <div class="card-body">
                    <div class="button-items">
                        <a href="{{ route('clients.create') }}" type="button"
                            class="btn btn-primary waves-effect waves-light">Добавить клиента</a>
                    </div>
                </div>
                <!--end card-body-->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Ответсвенный менеджер</th>
                                    <th style="width: 90px">Дата</th>
                                    <th>ФИО</th>
                                    <th>Номер телефона клиента</th>
                                    <th>Детали</th>
                                    <th>Возраст клиента</th>
                                    <th>Город/район</th>
                                    <th>Откуда клиент узнал о нас</th>
                                    <th>Назначенный менеджер</th>
                                    <th>Результат разговора</th>
                                    <th>Дата для повторного звонка</th>
                                    <th>Флаг условного отказа</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $key => $client)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $client->user->name }}</td>
                                        <td>{{ $client->getClientDate() }}</td>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->phone_number }}</td>
                                        <td>{{ $client->detail }}</td>
                                        <td>{{ $client->age }}</td>
                                        <td>{{ $client->city }}</td>
                                        <td>{{ $client->where }}</td>
                                        <td>{{ $client->user_new_id }}</td>
                                        {{-- {{ $client->comments }} --}}
                                        {{-- @include('clients.comment', ['comments' => $client->comments, 'client_id' =>
                                        $client->id]) --}}

                                        <td>
                                            {{ $client->comments->last()->results ?? 'Не заполнено' }}
                                        </td>
                                        <td>
                                            {{-- {{ $last_com->comments->flag }} --}}
                                            {{ $client->comments->last()->recall ?? 'Не заполнено' }}
                                        </td>
                                        <td>
                                            {{-- {{ $last_com->comments->recall }} --}}
                                            {{ $client->comments->last()->flag ?? 'Не заполнено' }}
                                        </td>

                                        <td class="text-right">
                                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                                                @can('client-edit')
                                                    <a href="{{ route('clients.edit', $client->id) }}"><i
                                                            class="las la-pen text-info font-18"></i></a>
                                                @endcan
                                                @csrf
                                                @method('DELETE')
                                                @can('client-delete')
                                                    <button type="submit" class="btn p-0"><i
                                                            class="las la-trash-alt text-danger font-18"></i></button>
                                                @endcan
                                            </form>
                                        </td>
                                    </tr>
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
