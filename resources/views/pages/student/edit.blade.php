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
                            <h2>Edit Student</h2>
                        </div>
                        <div class="pull-right" style="float: right;">
                            <a class="btn btn-primary" href="{{ route('student.index') }}" title="Go back"> <i class="fas fa-backward "></i> Back</a>
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
                <form method="POST" action="{{ route('student.update', $student->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name" value="{{$student->name}}">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" name="age" class="form-control" id="age" placeholder="Age" value="{{$student->age}}">
                    </div>
                    <div class="form-group">
                        <label for="age">Gender</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" {{ $student->gender == 'male' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" {{ $student->gender == 'female' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Reporting Teacher </label>
                        <select class="form-control" id="exampleFormControlSelect1" name="teacher_id">
                            @foreach ($teachers as $key => $value)
                            <option value="{{ $value->id }}" {{ $student->teacher_id == $value->id ? 'selected' : ''}}>{{ $value->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </section>

    </main>
</body>
@endsection