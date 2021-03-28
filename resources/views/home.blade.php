@extends('layouts.app')

@section('content')

    <div class="w-100 h-100 d-flex justify-content-center align-items-center">

        <div class="text-center w-50 p-3">
            <h1 class=""> To-Do App </h1>

            <h2 class="h4 font-italic pt-5"> Realize that now, in this moment of time, you are creating.
                You are creating your next moment. That is what's real .</h2>

            <h3 class="h4 font-italic pb-5"> - Sarah Paddison </h3>

            <form method="POST" action="{{ route('todo.store') }}">
                @csrf

                <div class="input-group mb-3 w-100 pb-4">
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

                @forelse ($todos as $todo)

                    <div class="w-100 d-flex align-items-center justify-content-between">
                        <div class="p-4">
                            @if ($todo->completed == 0)

                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                                    width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="9 6 15 12 9 18" />
                                </svg>
                            @else

                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="44"
                                    height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l5 5l10 -10" />
                                </svg>

                            @endif
                            <p class="h5 d-inline pt-3"> {{ $todo->title }} </p>
                        </div>

                        <div class="mr-4 d-flex align-items-center">

                            @if ($todo->completed == 0)

                                <form action="{{ route('todo.update', $todo->id) }}" method="POST">

                                    @csrf
                                    @method('PUT')

                                    <input type="text" name="completed" value="1" hidden>

                                    <button class="btn btn-success btn-comp-success"> Mark as Completed </button>

                                </form>

                            @else

                                <form action="{{ route('todo.update', $todo->id) }}" method="POST">

                                    @csrf
                                    @method('PUT')

                                    <input type="text" name="completed" value="0" hidden>

                                    <button class="btn btn-success btn-uncomp-success"> Mark as Uncompleted </button>

                                </form>

                            @endif


                            <a class="inline-block" href="{{ route('todo.edit', $todo->id) }}">


                                <button class="border-0 bg-transparent ml-4">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="44"
                                        height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                        <line x1="16" y1="5" x2="19" y2="8" />
                                    </svg>


                                </button>

                            </a>



                            <form action="{{ route('todo.destroy', $todo->id) }}" method="POST">

                                @csrf
                                @method('DELETE')

                                {{-- <input type="text" name="completed" value="0" hidden> --}}

                                <button class="border-0 bg-transparent ml-2">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                        width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="4" y1="7" x2="20" y2="7" />
                                        <line x1="10" y1="11" x2="10" y2="17" />
                                        <line x1="14" y1="11" x2="14" y2="17" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    </svg>

                                </button>

                            </form>



                        </div>

                    </div>
                @empty
                    <p class="h5 pt-4"> No Todos Added Yet! </p>
                @endforelse

            </div>
        </div>
    </div>

@endsection
