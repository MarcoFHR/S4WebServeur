<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table  class="w-full">

                      <tr>
                        <td>Name</td>
                        <td>First Name</td>
                        <td>Biography</td>
                        <td>Books</td>
                      </tr>
                      @foreach($authors as $author)
                      <tr>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->firstname }}</td>
                        <td>{{ $author->biography }}</td>
                        @foreach($author->books as $book)
                          <p>{{ $book->title }}</p>
                        @endforeach
                      </tr>
                      @endforeach
                    </table>
                    <div class"mt-4">
                      {{ $authors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
