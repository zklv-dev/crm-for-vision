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
                            <input type="text" name="name" class="form-control" id="clientName" placeholder="ФИО">
                        </div>

                        <div class="form-group">
                            <label for="clientPhoneNumber">Номер телефона</label>
                            <input type="tel" name="phone_number" class="form-control" id="clientPhoneNumber"
                                placeholder="Номер телефона">
                        </div>

                        <div class="form-group">
                            <label for="clientDetails">Детали</label>
                            <textarea class="form-control" name="detail" rows="5" id="clientDetails"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="clientAge">Возраст</label>
                            <input type="number" name="age" class="form-control" id="clientAge" placeholder="Возраст">
                        </div>

                        <div class="form-group">
                            <label for="clientCity">Город</label>
                            <input type="text" name="city" class="form-control" id="clientCity" placeholder="Город">
                        </div>

                        <div class="form-group">
                            <label for="clientWhere">Откуда клиент узнал о нас</label>
                            <input type="text" name="where" class="form-control" id="clientWhere"
                                placeholder="Откуда клиент узнал о нас">
                        </div>
                        <div class="form-group">
                            <strong>Новый менеджер:</strong>
                            <br />
                            <select name="user_new_id">
                                <option value="Не выбрано" selected>Не выбрано</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->name }}">
                                    {{ $user->name }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="comment" value="Не заполнено">
                        <input type="hidden" name="results" value="Не заполнено">
                        <input type="hidden" name="necessary" value="Не заполнено">
                        <select name="flag" style="display: none">
                            <option value="Не заполнено" selected></option>
                        </select>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
    </div>
@endsection
