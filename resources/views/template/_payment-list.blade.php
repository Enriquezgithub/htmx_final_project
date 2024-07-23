@extends('layout.base')
@section('content')
    <div class="mt-9">
        <table class="w-full">
            <thead class="w-full bg-gray-300">
                <tr>
                    <th class="text-start">Payment ID</th>
                    <th class="text-start">Account Name</th>
                    <th class="text-start">DateTIme</th>
                    <th class="text-start">Amount</th>
                    <th class="text-start">Date-Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pay->get() as $payment)
                    <tr>
                        <td>Payment ID # {{ $payment->id }}</td>
                        <td>
                            <a href="/account/{{ $payment->account->id }}" class="text-blue-600 border-b-2 border-blue-600">
                                {{ $payment->account->student->first_name }}
                            </a>
                        </td>
                        <td>{{ $payment->date_time }}</td>
                        <td>{{ $payment->amount }}</td>
                        <td>{{ $payment->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
