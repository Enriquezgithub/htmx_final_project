<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('htmx/htmx.min.js') }}"></script>
    <script src="{{ asset('tailwind/tailwind.min.js') }}"></script>
    <title>Base</title>
</head>

<body>
    <div class="flex gap-4 w-full h-screen">
        <div class="p-2 bg-blue-500 w-[15%] h-full">
            <div class="flex flex-col text-white gap-4 text-xl mt-5 ms-4">
                <a href="/" class="{{ request()->is('/') ? 'border-b-2 border-blue-800' : '' }}">Dashboard</a>
                <a href="/student"
                    class="{{ request()->is('student') ? 'border-b-2 border-blue-800' : '' }}">Student</a>
                <a href="/account"
                    class="{{ request()->is('account') ? 'border-b-2 border-blue-800' : '' }}">Account</a>
                {{-- <a href="/charge" class="{{ request()->is('charge') ? 'border-b-2 border-blue-800' : '' }}">Charge</a> --}}
                <a href="/payment"
                    class="{{ request()->is('payment') ? 'border-b-2 border-blue-800' : '' }}">Payment</a>
            </div>
        </div>
        <div class="p-2 w-full">
            @yield('content')
        </div>
    </div>
</body>

</html>
