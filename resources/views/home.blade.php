@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if($errors->any())
                    <ul class="list-group mb-3">
                        @foreach( $errors->all() as $error)
                        <li class="list-group-item text-danger">
                         {{ $error }}
                         </li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" action="/store-todo">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" name="title" placeholder="Title" type="text" />
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text" name="description" placeholder="Todo description" />
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-success btn-sm">Create Todo</button>
                    </div>
                        
                    </form>
                </div>
            </div>

            <div class="card my-5">
                <ul class="list-group">
                    @foreach($todos as $todo)
                    <li class="list-group-item my-2 mx-2 ">
                        {{ $todo->title }}
                        <a href="/delete/{{ $todo->id }}" class="text-white btn btn-sm float-right btn-danger">X</a>
                    </li>
                    @endforeach
                </ul>
            </div>
             

        </div>
    </div>
</div>
@endsection
