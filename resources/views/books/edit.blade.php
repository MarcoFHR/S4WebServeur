<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-zinc-900 dark:text-zinc-100">
                    <form method="POST" action="{{ route('books.update', $book) }}">
                      @method('PUT')
                      @csrf

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                :value="old('title', $book->title)" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class='mt-4'>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description', $book->description)" required
                                autocomplete="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Image -->
                        <div class='mt-4'>
                            <x-input-label for="image" :value="__('Image')" />
                            <x-text-input id="image" class="block mt-1 w-full" type="text" name="image" :value="old('image', $book->image)"
                                autocomplete="image" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <!-- Year -->
                        <div class='mt-4'>
                            <x-input-label for="year" :value="__('Year')" />
                            <x-text-input id="year" class="block mt-1 w-full" type="text" name="year" :value="old('year', $book->year)" required
                                autocomplete="year" />
                            <x-input-error :messages="$errors->get('year')" class="mt-2" />
                        </div>

                        <!-- Price -->
                        <div class='mt-4'>
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price', $book->price)" required
                                autocomplete="price" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Is Published -->
                        <div class='mt-4'>
                            <x-input-label for="is_published" :value="__('Is Published')" />
                            <x-text-input id="is_published" class="block mt-1 w-full" type="text" name="is_published" :value="old('is_published', $book->is_published)"
                                autocomplete="is_published" />
                            <x-input-error :messages="$errors->get('is_published')" class="mt-2" />
                        </div>

                        <!-- Author Id -->
                        <div class='mt-4'>
                            <x-input-label for="author_id" :value="__('Author Id')" />
                            <x-text-input id="author_id" class="block mt-1 w-full" type="text" name="author_id" :value="old('author_id', $book->author_id)"
                                autocomplete="author_id" />
                            <x-input-error :messages="$errors->get('author_id')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
