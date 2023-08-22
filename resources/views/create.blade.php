@extends('layout.layout')
@section('title', 'Create')
@section('content')

    <form action="{{route('student.store')}}" method="post">
        @csrf
        <div>
            <label>Name: </label>
            <input type="text" name="name">
        </div>
        <div>
            <label>Email: </label>
            <input type="email" name="email">
        </div>
        <div>
            <label>Sex: </label>
            <select name="sex">
                <option value="masculine">Masculine</option>
                <option value="feminine">Feminine</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div>
            <label>Age: </label>
            <input type="number" name="age">
        </div>

        <button type="submit">Create</button>
    </form>

@endsection
