<div class="mt-9">
    <table class="w-full">
        <thead class="w-full bg-gray-300">
            <tr>
                <th class="p-2 text-start">Name</th>
                <th class="text-start">BirthDate</th>
                <th class="text-start">Address</th>
                <th class="text-start">Date-Created</th>
                <th class="text-start">Billing</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stud->get() as $student)
                <tr>
                    <td>
                        {{-- <a href="/account"> --}}
                        {{ $student->first_name }} {{ $student->last_name }}
                        {{-- </a> --}}
                    </td>
                    <td>{{ $student->birth_date }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->created_at }}</td>
                    <td>
                        <a href="/billing-statement/{{ $student->id }}">
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
