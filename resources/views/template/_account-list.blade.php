<div class="mt-9">
    <table class="w-full">
        <thead class="w-full bg-gray-300">
            <tr>
                <th class="text-start">Account ID</th>
                <th class="text-start">Student Name</th>
                <th class="text-start">Section</th>
                <th class="text-start">Remarks</th>
                <th class="text-start">Date-Created</th>
                <th class="text-start">Bill</th>
                {{-- <th class="text-start">Action</th> --}}
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
                        <a href="/billing-statement/{{ $account->id }}">
                            Show
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
