<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <section class="bg-white dark:bg-gray-900">
                    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new product</h2>
                        <form action="#" wire:submit='save'>
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="w-full">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                        Name</label>
                                    <input type="text" name="name" wire:model.blur='form.name' id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type product name" required="">
                                    @error('form.name')
                                        <x-input-error>{{ $messages }}</x-input-error>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="unit"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit</label>
                                    <input type="text" name="unit" wire:model.blur='form.unit' id="unit"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Product Unit" required="">
                                    @error('form.unit')
                                        <x-input-error>{{ $messages }}</x-input-error>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit"
                                class="inline-flex w-full items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                Add product
                            </button>
                        </form>
                    </div>
                </section>
            </div>
