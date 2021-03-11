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
                            <h2>Edit Student Mark</h2>
                        </div>
                        <div class="pull-right" style="float: right;">
                            <a class="btn btn-primary" href="{{ route('student-mark.index') }}" title="Go back"> <i class="fas fa-backward "></i> Back</a>
                        </div>
                    </div>
                </div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="POST" action="{{ route('student-mark.update', $studentMark->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Student Name </label>
                        <select class="form-control" id="exampleFormControlSelect1" name="student_id">
                            @foreach ($students as $key => $value)
                            <option value="{{ $value->id }}" {{ $studentMark->student_id == $value->id ? 'selected' : ''}}>{{ $value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Term </label>
                        <select class="form-control" id="exampleFormControlSelect1" name="term_id">
                            @foreach ($terms as $key => $value)
                            <option value="{{ $value->id }}" {{ $studentMark->term_id == $value->id ? 'selected' : ''}}>{{ $value->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Maths</label>
                        <input type="number" name="maths" class="form-control" id="exampleInputEmail1"  value="{{$studentMark->maths}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Science</label>
                        <input type="number" name="science" class="form-control" id="exampleInputEmail1" value="{{$studentMark->science}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">History</label>
                        <input type="number" name="history" class="form-control" id="exampleInputEmail1" value="{{$studentMark->history}}">
                       
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </section>

    </main>
</body>
@endsection