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

                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Year</th>
                          <th>Price</th>
                          <th>Author</th>
                          <th scope="col" class="px-6 py-3">
                              <a class="btn-new ml-3 mb-2" href="{{ route('books.create')}}"
                                title="{{ __('New') }}">{{ __('New') }}</a>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($books as $book)
                        <tr>
                          <td>{{ $book->title }}</td>
                          <td>{{ $book->description }}</td>
                          <td>{{ $book->year }}</td>
                          <td>{{ $book->price }}€</td>
                          <td>{{ $book->author->name }}</td>
                          <td class="px-6 py-4 flex">
                                              <a class="btn-std ml-3" href="{{ route('books.edit', $book) }}"
                                                  title="{{ __('Edit') }}">Edit</a>
                                              <a class="btn-danger ml-3" href=""
                                              onclick="let response= confirm('Are you sure?'); event.preventDefault(); if(response) {document.querySelector('#delete-{{ $book->id}}').submit() }"
                                              title="{{ __('Delete') }}">{{ __('Delete') }}</a>
                                              <form id="delete-{{ $book->id }}" hidden
                                                      action="{{ route('books.destroy', $book) }}" method="POST">
                                                      @csrf
                                                      @method('DELETE')
                                                  </form>

                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class"mt-4">
                      {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
