<x-admin-layout>

    <div class="mt-12 max-w-6xl mx-auto">
        <div class="flex m-2 p-2">
            <a href="{{ route("role.index") }}" class="px-4 py-2 text-white rounded bg-blue-900">
            Back
            </a>

        </div>
        <div class="max-w-md mx-auto bg-gray-100 p-6 mt-12 rounded">
            <form action="{{ route("role.store") }}" method="POST">
            @csrf
            @method("POST")
            <div>
                <label for="" class="text-xl">Name</label>
                <input type="text" name="name" class="block w-full py-3 px-3 mt-2
                text-gray-800 appearance-none
                border-2 border-gray-100
                focus:outline-none focus:text-gray-500 focus:border-blue-400 rounded
                 ">


            </div>

            @error("name")
            <p class="text-red-600 text-center">{{ $message }}</p>

            @enderror


            <button type="submit" class="w-full py-3 mt-10
            hover:bg-blue-400 text-white rounded
            bg-blue-800">
                Create
            </button>
            </form>

        </div>


    </div>

</x-admin-layout>
