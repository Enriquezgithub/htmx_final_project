@extends('layout.base')
@section('content')
    {{-- @include('student.modal.create') --}}
    <div class="fixed inset-0 flex items-center -mt-10 justify-center bg-gray-800 bg-opacity-50 @if ($errors->any()) @else hidden @endif"
        id="trigger">
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-xl font-bold text-gray-900">Create Account</h3>
                <form hx-post="/api/charge" hx-target="#display-charge" hx-swap="innerHTML" hx-trigger="submit" method="POST"
                    hx-on::after-request="this.reset()">
                    @csrf
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">
                        <div class="mb-2">
                            <label for="account_id">Student Id</label>
                            <select name="account_id" id="account_id" class="w-full rounded p-2 border border-black">
                                <option selected disabled>Choose</option>
                                @foreach ($acc as $acc)
                                    <option value="{{ $acc->id }}" class="text-black">
                                        Account - {{ $acc->id }} -
                                        {{ $acc->student->first_name }}{{ $acc->student->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


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
                        </p>
                    </div>
                    <div class="mt-5 sm:mt-6 flex gap-3">
                        <button type="submit"
                            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-2 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">Submit</button>
                        <button type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-2 py-2 bg-gray-600 text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:text-sm"
                            onclick="closeModal()">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="flex justify-between">
        <div class="text-xl font-bold">
            Charge Record
        </div>

        <div>
            <button class="bg-blue-600 py-2 px-3 rounded text-white"
                onclick="document.getElementById('trigger').classList.remove('hidden')">Create</button>
        </div>
    </div>

    <div id="display-charge" hx-trigger="load" hx-get="/api/charge" hx-swap="innerHTML">

    </div>

    <script>
        function closeModal() {
            document.getElementById('trigger').classList.add('hidden');

            document.getElementById('firstError').innerHTML = '';
            document.getElementById('lastError').innerHTML = '';
            document.getElementById('birthError').innerHTML = '';
            document.getElementById('addressError').innerHTML = '';
            document.getElementById('success').innerHTML = '';
        }
    </script>
@endsection