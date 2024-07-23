<div class="mt-9">
    <table class="w-full">
        <thead class="w-full bg-gray-300">
            <tr>
                <th class="text-start">Account ID</th>
                <th class="text-start">Student Name</th>
                <th class="text-start">Section</th>
                <th class="text-start">Remarks</th>
                <th class="text-start">Date-Created</th>
                <th class="text-start">Charges</th>
                <th class="text-start">Bill Statement</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($acc->get() as $account)
                <tr>
                    <td>Account ID # {{ $account->id }}</td>
                    <td>
                        <a href="/student/{{ $account->student->id }}" class="text-blue-600 border-b-2 border-blue-600">
                            {{ $account->student->first_name }} {{ $account->student->last_name }}
                        </a>
                    </td>
                    <td>{{ $account->section }}</td>
                    <td>{{ $account->remarks }}</td>
                    <td>{{ $account->created_at }}</td>
                    <td>
                        <a href="/charge/{{ $account->id }}">
                            view
                        </a>
                    </td>
                    <td>
                        <a href="/billing-statement/{{ $account->id }}">
                            view
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div id="success" hx-swap-oob="true">
    <div class="bg-green-500 text-white text-center p-4">
        <h3>Student Added</h3>
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
