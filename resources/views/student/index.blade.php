@extends('layout.base')
@section('content')
    {{-- @include('student.modal.create') --}}
    <div class="fixed inset-0 flex items-center -mt-10 justify-center bg-gray-800 bg-opacity-50 @if ($errors->any()) @else hidden @endif"
        id="trigger">
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-xl font-bold text-gray-900">Create Student</h3>
                <form hx-post="/api/student" hx-target="#display-student" hx-swap="innerHTML" hx-trigger="submit" method="POST"
                    hx-on::after-request="this.reset()">
                    @csrf
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">
                        <div class="flex gap-2">
                            <div class="mb-2">
                                <label for="first_name">Student FirstName</label>
                                <input type="text" id="first_name" name="first_name"
                                    class="w-full border border-black p-2 rounded" value="{{ old('first_name') }}">
                                @error('first_name')
                                    <div class="text-red-600" id="firstError">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="last_name">Student LastName</label>
                                <input type="text" id="last_name" name="last_name"
                                    class="w-full border border-black p-2 rounded" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <div class="text-red-600" id="lastError">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="birth_date">BirthDate</label>
                            <input type="date" class="w-full rounded border p-2 border-black" id="birth_date"
                                name="birth_date" value="{{ old('birth_date') }}">
                            @error('birth_date')
                                <div class="text-red-600" id="birthError">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="address">Student Address</label>
                            <input type="text" id="address" name="address"
                                class="w-full border border-black p-2 rounded" value="{{ old('address') }}">
                            @error('address')
                                <div class="text-red-600" id="addressError">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- <div id="success" hx-swap-oob="true"></div> --}}
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
            Student Record
        </div>

        <div>
            <button class="bg-blue-600 py-2 px-3 rounded text-white"
                onclick="document.getElementById('trigger').classList.remove('hidden')">Create</button>
        </div>
    </div>

    <div id="display-student" hx-trigger="load" hx-get="/api/student" hx-swap="innerHTML">

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
