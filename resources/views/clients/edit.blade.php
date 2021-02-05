@extends('layouts.app')


@section('content')
    {{-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit client</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('clients.index') }}"> Back</a>
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


    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $client->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail"
                        placeholder="Detail">{{ $client->detail }}</textarea>
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
                    <h4 class="card-title">Изменить клиента</h4>
                    <p class="text-muted mb-0"></p>
                </div>
                <!--end card-header-->
                <div class="card-body">
                    <form action="{{ route('clients.update', $client->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="clientName">Имя</label>
                            <input disabled value="{{ $client->name }}" type="text" name="name" class="form-control"
                                id="clientName" placeholder="ФИО">
                        </div>

                        <div class="form-group">
                            <label for="clientPhoneNumber">Номер телефона</label>
                            <input disabled value="{{ $client->phone_number }}" type="number" name="phone_number"
                                class="form-control" id="clientPhoneNumber" placeholder="Номер телефона">
                        </div>

                        <div class="form-group">
                            <label for="clientDetails">Детали</label>
                            <textarea disabled class="form-control" name="detail" rows="5"
                                id="clientDetails">{{ $client->detail }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="clientAge">Возраст</label>
                            <input disabled value="{{ $client->age }}" type="number" name="age" class="form-control"
                                id="clientAge" placeholder="Возраст">
                        </div>

                        <div class="form-group">
                            <label for="clientCity">Город</label>

                            <input disabled value="{{ $client->city }}" type="text" name="city" class="form-control"
                                id="clientCity" placeholder="Город">
                        </div>

                        <div class="form-group">
                            <label for="clientWhere">Откуда клиент узнал о нас</label>

                            <input disabled value="{{ $client->where }}" type="text" name="where" class="form-control"
                                id="clientWhere" placeholder="Откуда клиент узнал о нас">
                        </div>

                        <div class="form-group">
                            <strong>Назначенный менеджер:</strong>
                            <br />
                            <select disabled name="user_new_id">
                                <option value="{{ $client->user_new_id }}">{{ $client->user_new_id }}</option>
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label for="clientResults">Результат разговора</label>

                            <input value="{{ $client->results }}" type="text" name="results" class="form-control"
                                id="clientResults" placeholder="Результат разговора">
                        </div>

                        <div class="form-group">
                            <label for="clientNecessary">Нужно ли перезвонить клиенту? Дата для повторного звонка</label>

                            <input value="{{ $client->necessary }}" type="text" name="necessary" class="form-control"
                                id="clientNecessary" placeholder="Нужно ли перезвонить клиенту?">

                            <input name="recall" type="date" class="form-control" placeholder="Дата для повторного звонка">
                        </div>

                        <div class="form-group">
                            <select name="flag">
                                <option value="Условный отказ">Условный отказ</option>
                                <option value="Позвонить">Позвонить</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="clientComment">Итоговый комментарий</label>
                            <textarea class="form-control" name="comment" rows="5"
                                id="clientComment">{{ $client->comment }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Добавить</button> --}}

                    </form>
                    <form method="POST" action="{{ route('comment.add') }}">
                        @csrf
                        <div class="form-group">
                            <label for="clientResults">Результат разговора</label>
                            <input id="clientResults" type="text" name="results" class="form-control" />
                            <input type="hidden" name="client_id" value="{{ $client->id }}" />
                        </div>
                        <div class="form-group">
                            <label for="clientNecessary">Дата для повторного звонка</label>
                            <input id="clientNecessary" name="recall" type="date" class="form-control"
                                placeholder="Дата для повторного звонка">
                        </div>
                        <div class="form-group">
                            <label for="clientFlag">Флаг условного отказа</label>

                            <select id="clientFlag" name="flag">
                                <option value="Позвонить">Позвонить</option>
                                <option value="Условный отказ">Условный отказ</option>
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
        <div class=" col-md-6 mx-auto">
            <div class="card">
                <div class="card-body"> 
                    @include('clients.replies', ['comments' => $client->comments, 'client_id' => $client->id])

                    <hr />
                </div>

                {{-- <div class="card-body">
                    <h5>Leave a comment</h5>
                    <form method="POST" action="{{ route('comment.add') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="comment" class="form-control" />
                            <input type="hidden" name="client_id" value="{{ $client->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;"
                                value="Add Comment" />
                        </div>
                    </form>
                </div> --}}

            </div>
        </div>
    </div>

@endsection
