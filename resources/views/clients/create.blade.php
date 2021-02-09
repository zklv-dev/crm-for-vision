@extends('layouts.app')


@section('content')

    {{-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('clients.store') }}" method="POST">
        @csrf


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>


    </form> --}}

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">

            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    @if (count($errors) > 0)
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger border-0" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
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
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Добавить клиента</h4>
                    <p class="text-muted mb-0"></p>
                </div>
                <!--end card-header-->
                <div class="card-body">
                    <form action="{{ route('clients.store') }}" method="POST">

                        @csrf

                        <div class="form-group">
                            <label for="clientName">Имя</label>
                            <input value="{{ old('name') }}" type="text" name="name" class="form-control" id="clientName" placeholder="ФИО">
                        </div>

                        <div class="form-group">
                            <label for="clientPhoneNumber">Номер телефона</label>
                            <input value="{{ old('phone_number') }}" type="tel" name="phone_number" class="form-control" id="clientPhoneNumber"
                                placeholder="Номер телефона">
                        </div>

                        <div class="form-group">
                            <label for="clientDetails">Детали</label>
                            <textarea class="form-control" name="detail" rows="5" id="clientDetails">{{ old('detail') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="clientAge">Возраст</label>
                            <input value="{{ old('age') }}"  type="number" name="age" class="form-control" id="clientAge" placeholder="Возраст">
                        </div>

                        <div class="form-group">
                            <label for="clientCity">Город</label>
                            <input value="{{ old('city') }}" type="text" name="city" class="form-control" id="clientCity" placeholder="Город">
                        </div>

                        <div class="form-group">
                            <label for="clientWhere">Откуда клиент узнал о нас</label>
                            <select type="text" name="where" class="form-control" id="clientWhere"
                                placeholder="Откуда клиент узнал о нас">
                                <option value="Инстаграм">Инстаграм</option>
                                <option value="Фэйсбук">Фэйсбук</option>
                                <option value="Лалфо">Лалафо</option>
                                <option value="Подсказали друзья, родственники">Подсказали друзья, родственники</option>
                            </select>
                        </div>xW2r8ax%
                        <div class="form-group">
                            <strong>Назначить менеджера:</strong>
                            <br />
                            <select class="form-control" name="user_new_id">
                                <option value="Не выбрано" selected>Не выбрано</option>
                                @foreach ($users as $user)
                                    @if (!$user->hasRole('Admin'))
                                        <option value="{{ $user->name }}">
                                            {{ $user->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
    </div>
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="button-items">
                        <a href="{{ route('home') }}" class="btn btn-secondary btn-block"> <i
                                class="fas fa-angle-double-left"></i> Назад</a>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
