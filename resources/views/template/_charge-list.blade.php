<div class="mt-9">
    <table class="w-full">
        <thead class="w-full bg-gray-300">
            <tr>
                <th class="text-start">Charge ID</th>
                <th class="text-start">Account ID</th>
                <th class="text-start">Title</th>
                <th class="text-start">Amount</th>
                <th class="text-start">Date-Created</th>
                <th class="text-start">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($char->get() as $charge)
                <tr>
                    <td>Charge ID # {{ $charge->id }}</td>
                    <td>Account
                        <a href="/account/{{ $charge->account->id }}" class="text-blue-600 border-b-2 border-blue-600">
                            {{ $charge->account->id }}
                        </a>
                    </td>
                    <td>Charge ID # {{ $charge->title }}</td>
                    <td>{{ $charge->amount }}</td>
                    <td>{{ $charge->created_at }}</td>
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
