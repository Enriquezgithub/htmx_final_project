<div class="container mx-auto p-4">
    <h3 class="text-xl font-bold text-gray-900 mb-4">Edit Student</h3>
    <form hx-put="/api/students/{{ $stud->id }}" method="POST" hx-trigger="submit" hx-target="#display-student"
        hx-swap="innerHTML">
        @csrf
        @method('PUT')
        <div class="mt-2 flex gap-3">
            <div class="mb-2">
                <label for="first_name" class="block text-sm font-medium text-gray-700">Student First Name</label>
                <input type="text" id="first_name" name="first_name" value="{{ $stud->first_name }}"
                    class="w-full border border-black p-2 rounded">
            </div>
            <div class="mb-2">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Student Last Name</label>
                <input type="text" id="last_name" name="last_name" value="{{ $stud->last_name }}"
                    class="w-full border border-black p-2 rounded">
            </div>
        </div>
        <div class="mb-2">
            <label for="birth_date" class="block text-sm font-medium text-gray-700">Birth Date</label>
            <input type="date" class="w-full rounded border p-2 border-black" id="birth_date" name="birth_date"
                value="{{ $stud->birth_date }}">
        </div>
        <div class="mb-2">
            <label for="address" class="block text-sm font-medium text-gray-700">Student Address</label>
            <input type="text" id="address" name="address" class="w-full border border-black p-2 rounded"
                value="{{ $stud->address }}">
        </div>
        <div class="mt-5 sm:mt-6 flex gap-3">
            <button type="submit"
                class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                Submit
            </button>
            <a href="{{ url()->previous() }}"
                class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-600 text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:text-sm">
                Cancel
            </a>
        </div>
    </form>
</div>
