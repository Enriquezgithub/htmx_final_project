@extends('layout.base')
@section('content')
    <div class="mt-9">
        <a href="/payment" class="bg-green-600 py-2 px-3 text-white rounded">Back</a>
        <table class="w-full mt-5">
            <thead class="w-full bg-gray-300">
                <tr>
                    <th class="p-2 text-start">Account ID</th>
                    <th class="text-start">Student Name</th>
                    <th class="text-start">Section</th>
                    <th class="text-start"> Remarks</th>
                    <th class="text-start">Date-Created</th>
                    <th class="text-start">Charges</th>
                    <th class="text-start">Bill Statement</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Account ID # {{ $acc->id }}</td>
                    <td>
                        <a href="/student/{{ $acc->student->id }}" class="text-blue-600 border-b-2 border-blue-600">
                            {{ $acc->student->first_name }} {{ $acc->student->last_name }}
                        </a>
                    </td>
                    <td>{{ $acc->section }}</td>
                    <td>{{ $acc->remarks }}</td>
                    <td>{{ $acc->created_at }}</td>
                    <td>
                        <a href="/charge/{{ $acc->id }}">
                            view
                        </a>
                    </td>
                    <td>
                        <a href="/billing-statement/{{ $acc->id }}">
                            view
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
