@extends('layout.base')
@section('content')
    <div class="mt-9">
        <a href="/account" class="bg-green-600 py-2 px-3 text-white rounded">Back</a>
        <table class="w-full mt-5">
            <thead class="w-full bg-gray-300">
                <tr>
                    <th class="p-2 text-start">Name</th>
                    <th class="text-start">BirthDate</th>
                    <th class="text-start">Address</th>
                    <th class="text-start">Date-Created</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $stud->first_name }} {{ $stud->last_name }}</td>
                    <td>{{ $stud->birth_date }}</td>
                    <td>{{ $stud->address }}</td>
                    <td>{{ $stud->created_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
