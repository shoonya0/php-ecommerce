<div>
    <div class="mb-10">
        <livewire:bread-crumb :url="$currentUrl" />
    </div>
    <div class="bg-gray-800 text-white rounded-3xl mb-5 max-w-6xl mx-auto">
        <!-- Card Section -->
        <div class="max-w-6xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Card -->
            <div class="bg-gray-900 rounded-2xl shadow p-4 sm:p-7">
                {{-- in wire:submit we can use the method in the component --}}
                <form wire:submit="update">
                    <!-- Section -->
                    <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-700">
                        <div class="sm:col-span-12">
                            <h2 class="text-lg font-semibold">
                                Change Category Name
                            </h2>
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-3">
                            <label for="af-submit-application-full-name" class="inline-block text-sm font-medium mt-2.5">
                                New Category name
                            </label>
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-9">
                            <div>
                                <input type="text" wire:model="category_name" id="af-submit-application-full-name" class="py-2 px-3 pe-11 block w-full border-gray-600 bg-gray-800 text-white shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                @error('category_name') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Section -->

                    <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        <div wire:loading class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white-600 rounded-full" role="status" aria-label="loading">
                        <span class="sr-only">Loading...</span>
                        </div>  
                    Submit and Save
                    </button>
                </form>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Card Section -->
    </div>
</div>
