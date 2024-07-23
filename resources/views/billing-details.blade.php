@extends('layout.base')
@section('content')
    <div class="p-3">
        <a href="/account" class="bg-green-600 py-2 px-3 text-white rounded">Back</a>
        <div class="text-2xl font-bold mt-2">
            Billing Statement
        </div>
        <div>
            {{ $acc->student->first_name }} {{ $acc->student->last_name }} | {{ $acc->student->birth_date }}
            | {{ $acc->student->address }}
        </div>
        <div class="flex gap-5 p-2 mt-5 w-full">
            <div class="w-[30%]">
                <div class="font-bold">Charges</div>
                @php
                    $total = 0;
                @endphp
                <div class="border-b border-black p-2">
                    @foreach ($char as $charge)
                        <div class="flex gap-5 justify-between">
                            <div>
                                {{ $charge->title }}
                            </div>
                            <div>
                                {{ $charge->amount }}
                            </div>
                        </div>
                        @php
                            $total += $charge->amount;
                        @endphp
                    @endforeach
                </div>
                <div class="mt-2 flex justify-between">
                    <div>
                        Total Charges:
                    </div>
                    <div>
                        {{ $total }}
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="font-bold">Payment</div>
                <table class="border-b border-black w-[50%]">
                    @php
                        $totalPay = 0;
                        $balance = 0;
                    @endphp
                    <thead>
                        <tr>
                            <th class="p-1.5 text-start">Date</th>
                            <th class=" w-[20%] text-start">Amount</th>
                            <th class=" text-start">Remaining Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pay as $payment)
                            <tr>
                                <td class="">{{ $payment->date_time }}</td>
                                <td class="">{{ $payment->amount }}</td>
                            </tr>
                            @php
                                $totalPay += $payment->amount;
                            @endphp
                        @endforeach
                    </tbody>
                    @php
                        $balance = $totalPay - $total;
                    @endphp
                </table>
                <div class="ml-[22rem]">
                    {{ $balance }}
                </div>

            </div>
        </div>
    </div>
@endsection
