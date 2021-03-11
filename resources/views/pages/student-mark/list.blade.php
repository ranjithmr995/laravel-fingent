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
                            <a class="btn btn-success" href="{{ route('student-mark.create') }}"> <i class="fas fa-plus-circle">Add Student Mark</i>
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
                        <th>Maths</th>
                        <th>Science</th>
                        <th>History</th>
                        <th>Total Marks</th>
                        <th>Created On</th>

                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($marks as $mark)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $mark->student->name }}</td>
                        <td>{{ $mark->maths }}</td>
                        <td>{{ $mark->science }}</td>
                        <td>{{ $mark->history }}</td>
                        <td>{{ $mark->maths +  $mark->science + $mark->history}}</td>
                        <td>{{ $mark->created_at}}</td>
                        <td>

                            <form action="{{ route('student-mark.destroy', $mark->id) }}" method="POST">

                                <a href="{{ route('student-mark.edit', $mark->id) }}">
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
                {!! $marks->links() !!}
            </div>
        </section>

    </main>
</body>
@endsection