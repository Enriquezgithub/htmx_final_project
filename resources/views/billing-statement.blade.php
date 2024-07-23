@extends('layout.base')
@section('content')
    <div class="p-3">
        <div class="flex">

            <a href="/account" class="bg-green-600 py-2 px-3 text-white rounded">Back</a>
            <button class="bg-blue-600 py-2 px-3 rounded text-white ml-2"
                onclick="document.getElementById('trigger{{ $acc->id }}').classList.remove('hidden')">
                Add
            </button>
        </div>
        <div class="text-2xl font-bold mt-2">
            Charges Details
        </div>
        <div>
            {{ $acc->student->first_name }} {{ $acc->student->last_name }} | {{ $acc->student->birth_date }}
            | {{ $acc->student->address }}
        </div>
        <div class="flex gap-5 p-2 mt-5 w-full">
            <div class="w-[40%]">
                <div class="font-bold">Charges</div>
                @php
                    $total = 0;
                @endphp
                <div class="border-b border-black p-2">
                    @foreach ($char as $charge)
                        <div class="flex relative w-full justify-between">
                            <div class="flex gap-5 w-full justify-between">
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
                            <form class="absolute -right-[5rem]" hx-delete="/api/charge/{{ $charge->id }}"
                                hx-confirm="Are you sure you want to delete this charge?">
                                @csrf
                                @method('DELETE')
                                <button type="submit">remove</button>
                            </form>
                        </div>
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
        </div>
    </div>

    @foreach ($acc->get() as $account)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden"
            id="trigger{{ $account->id }}">
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-xl font-bold text-gray-900">Create Charge for Account
                        {{ $account->student->first_name }} - {{ $account->student->last_name }}</h3>
                    <form hx-post="/api/charge" hx-target="this" hx-swap="innerHTML" hx-trigger="submit" method="POST"
                        hx-on::after-request="this.reset()">
                        @csrf
                        <input type="hidden" name="account_id" value="{{ $account->id }}">
                        <div class="mt-2">
                            <div class="mb-2">
                                <label for="title">Title</label>
                                <input type="text" class="w-full rounded border p-2 border-black" id="title"
                                    name="title" value="{{ old('title') }}">
                            </div>
                            <div class="mb-2">
                                <label for="amount">Amount</label>
                                <input type="number" class="w-full rounded border p-2 border-black" id="amount"
                                    name="amount" value="{{ old('amount') }}">
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-6 flex gap-3">
                            <button type="submit"
                                class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-2 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">Submit</button>
                            <button type="button"
                                class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-2 py-2 bg-gray-600 text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:text-sm"
                                onclick="document.getElementById('trigger{{ $account->id }}').classList.add('hidden');">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
