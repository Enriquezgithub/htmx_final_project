<div>
    <button class="bg-blue-600 py-2 px-3 rounded text-white" hx-get="/api/students/{{ $stud->id }}/edit"
        hx-swap="innerHTML" hx-target="#display-student"
        onclick="document.getElementById('hidden').classList.add('hidden')">Edit</button>
    <div>
        {{-- <>Edit</> --}}
        <div>
            Full Name - {{ $stud->first_name }} {{ $stud->last_name }}
        </div>
        <div>
            Date Of Birth - {{ $stud->birth_date }}
        </div>
        <div>
            Permanent Location - {{ $stud->address }}
        </div>
        @foreach ($acc as $acc)
            My Account # - <span class="font-bold">({{ $acc->id }} {{ $acc->student->first_name }})</span>
        @endforeach
    </div>
</div>
