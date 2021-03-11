@extends('layouts.app')

@section('content')

<body>
    @include('partials.header')
    <main>

        <section class="white-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Students List</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('student.create') }}" title="Create a student"> <i class="fas fa-plus-circle">Add Student</i>
                            </a>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <table class="table table-bordered table-responsive-lg">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Reporting Teacher</th>

                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->teacher->name }}</td>
                        <td>

                            <form action="{{ route('student.destroy', $student->id) }}" method="POST">

                                <a href="{{ route('student.edit', $student->id) }}">
                                    <i class="fas fa-edit  fa-lg"></i>edit

                                </a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" title="delete" style="border: none; background-color:red">
                                    <i class="fas fa-trash fa-lg text-danger"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                  
                    @endforeach
                </table>
                {!! $students->links() !!}
            </div>
        </section>

    </main>
</body>
@endsection