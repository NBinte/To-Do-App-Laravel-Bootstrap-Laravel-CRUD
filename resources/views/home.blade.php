@extends('layouts.app')

@section('content')

    <div class="w-100 h-100 d-flex justify-content-center align-items-center">

        <div class="text-center w-50 p-3">
            <h1 class=""> To-Do App </h1>

            <h2 class="h4 font-italic pt-5"> Realize that now, in this moment of time, you are creating.
                You are creating your next moment. That is what's real .</h2>

            <h3 class="h4 font-italic"> - Sarah Paddison </h3>

            <form method="POST" action="{{ route('todo.store') }}">
                @csrf

                <div class="input-group mb-3 w-100">
                    <input type="text" class="form-control form-control-lg" name="title" placeholder="Type here.."
                        aria-describedby="button-addon2">

                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit" id="button-addon2">
                            Add to the list
                        </button>
                    </div>
                </div>
            </form>

            <h2 class="pt-2"> My To-Do List </h2>

            <div class="w-100">

                @foreach ($todos as $todo)

                    <div class="w-100 d-flex align-items-center justify-content-between">
                        <div class="p-4">
                            @if ($todo->completed == 0)

                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                                    width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="9 6 15 12 9 18" />
                                </svg>
                            @else

                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check"
                                    width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l5 5l10 -10" />
                                </svg>

                            @endif
                            {{ $todo->title }}
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>

@endsection
