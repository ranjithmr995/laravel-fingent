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
                            <h2>Add Student Mark</h2>
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
                <form method="POST" action="{{ route('student-mark.store') }}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Student Name </label>
                        <select class="form-control" id="exampleFormControlSelect1" name="student_id">
                            <option value="">Select Student</option>
                            @foreach ($students as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Term </label>
                        <select class="form-control" id="exampleFormControlSelect1" name="term_id">
                            <option value="">Select Term</option>
                            @foreach ($terms as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Maths</label>
                        <input type="number" name="maths" class="form-control" id="exampleInputEmail1">
                       
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Science</label>
                        <input type="number" name="science" class="form-control" id="exampleInputEmail1">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">History</label>
                        <input type="number" name="history" class="form-control" id="exampleInputEmail1">
                        
                    </div>
                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </section>

    </main>
</body>
@endsection