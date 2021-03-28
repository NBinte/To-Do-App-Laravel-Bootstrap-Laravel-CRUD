@extends('layouts.app')

@section('content')

    <div class="w-100 h-100 d-flex justify-content-center align-items-center">

        <div class="text-center w-50 p-3">
            <h1 class="h3 pb-5"> Edit Your ToDo named "{{ $todo->title }}" </h1>



            <form method="POST" action="{{ route('todo.update', $todo->id) }}">
                @csrf
                @method('PUT')

                <div class="input-group mb-3 w-100">
                    <input type="text" class="form-control form-control-lg" name="title" value="{{ $todo->title }}"
                        aria-describedby="button-addon2">

                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit" id="button-addon2">
                            Save
                        </button>
                    </div>

                </div>
            </form>


        </div>
    </div>

@endsection
