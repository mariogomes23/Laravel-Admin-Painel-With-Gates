<x-admin-layout>


    <div class="mt-2 max-w-6xl mx-auto">
        <div class="flex justify-end m-2 p-2">
            <a href="{{ route("role.create") }}" class="px-4 py-2 bg-blue-900 text-white rounded">Create Role</a>

        </div>


        <div class="relative overflow-x-auto bg-gray-200 shadow-md sm:rounded-lg">

         @if (Session::has("message"))
         <h2 class="bg-red-400 w-[100%] px-4 py-1">
            <p class="text-red-700 text-center font-bold text-xl">{{ Session::get("message") }}</p>
        </h2>

         @endif
        <table class="w-full text-sm text-left text-gray-500">
            <thead
            class="text-xs text-gray-700 uppercase bg-gray-50 "
            >

            <tr scope="col" class="px-6 py-3">
                Name

            </tr>
            <tr scope="col" class="px-6 py-3">
                <span class="sr-only"> Edit</span>

            </tr>

            </thead>
            <tbody>
                @forelse ($roles as $role )
                <tr class="bg-white border-b">

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                        {{ $role->name }}
                    </th>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route("role.edit",$role->id) }}" class="font-medium text-blue-600">Edit</a>
                     <form action="{{ route("role.destroy",$role->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="font-medium text-red-600">Delete</button>

                     </form>

                    </td>


                </tr>

                @empty

                <tr class="bg-white border-b">

                     Empty Roles


                </tr>

                @endforelse

            </tbody>
        </table>
        </div>
    </div>
</x-admin-layout>
