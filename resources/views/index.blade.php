@extends('layout.layout')
@section('title', 'Home')
@section('content')
    <h1>home</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Sex</th>
                <th>Age</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->sex}}</td>
                    <td>{{$student->age}}</td>
                    <td>
                        <a href="{{route('student.edit', $student->id)}}">Edit</a>

                        <form action="{{route('student.destroy', $student->id)}}" name="destroy">
                            @csrf

                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
