@extends('layout.layout')
@section('title', 'Edit')
@section('content')

    <form action="{{route('student.update', $student->id)}}" method="post">
        @method('put')
        @csrf
        <div>
            <label>Name: </label>
            <input type="text" name="name" value="{{$student->name}}">
        </div>
        <div>
            <label>Email: </label>
            <input type="email" name="email" value="{{$student->email}}">
        </div>
        <div>
            <label>Sex: </label>
            <select name="sex">
                <option value="Masculine" {{$student->sex == 'masculine'? 'selected' : ''}}>Masculine</option>
                <option value="Feminine" {{$student->sex == 'feminine'? 'selected' : ''}}>Feminine</option>
                <option value="Other" {{$student->sex == 'other'? 'selected' : ''}}>Other</option>
            </select>
        </div>
        <div>
            <label>Age: </label>
            <input type="number" name="age" value="{{$student->age}}">
        </div>

        <button type="submit">Edit</button>
    </form>

@endsection
