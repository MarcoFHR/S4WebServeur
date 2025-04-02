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
                        <td>Title</td>
                        <td>Description</td>
                        <td>Year</td>
                        <td>Price</td>
                        <td>Author</td>
                      </tr>
                      @foreach($books as $book)
                      <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->description }}</td>
                        <td>{{ $book->year }}</td>
                        <td>{{ $book->price }}€</td>
                        <td>{{ $book->author->name }}</td>
                      </tr>
                      @endforeach
                    </table>
                    <div class"mt-4">
                      {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
