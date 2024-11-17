<!-- Start of Selection -->
<div>
    <div class="mb-10">
        <livewire:bread-crumb :url="$currentUrl" />
    </div>
    <div class="bg-gray-800 text-white rounded-3xl mb-5 max-w-6xl mx-auto">
        <!-- Card Section -->
        <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Card -->
            <div class="bg-gray-900 rounded-2xl shadow p-4 sm:p-7">
                <form wire:submit="save">
                    <!-- Section -->
                    <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-700">
                        <div class="sm:col-span-12">
                            <h2 class="text-lg font-semibold">
                                Add New Product
                            </h2>
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-3">
                            <label for="af-submit-application-full-name" class="inline-block text-sm font-medium mt-2.5">
                                Product name
                            </label>
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-9">
                            <div>
                                <input type="text" wire:model="product_name" id="af-submit-application-full-name" class="py-2 px-3 pe-11 block w-full border-gray-600 bg-gray-800 text-white shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                @error('product_name') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-3">
                            <label for="af-submit-application-email" class="inline-block text-sm font-medium mt-2.5">
                                Price
                            </label>
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-9">
                            <input id="af-submit-application-email" wire:model="product_price" type="text" inputmode="decimal" pattern="[0-9]*[.,]?[0-9]*" class="py-2 px-3 pe-11 block w-full border-gray-600 bg-gray-800 text-white shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                            @error('product_price') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-3">
                            <label for="af-submit-application-email" class="inline-block text-sm font-medium mt-2.5">
                                Category
                            </label>
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-9">
                            <select wire:model="category_id" class="py-3 px-4 pe-9 block w-full border-gray-600 bg-gray-800 text-white rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                <option selected="">Select Product Category</option>
                                @foreach ($all_categories as $category)
                                    <option value="{{ $category->id }}" wire:key="{{ $category->id }}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Section -->

                    <!-- Section -->
                    <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-700">
                        <div class="sm:col-span-12">
                            <h2 class="text-lg font-semibold">
                                More Details
                            </h2>
                        </div>
                        <!-- End Col -->
                        <div class="sm:col-span-3">
                            
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-9">
                            @if ($photo) 
                                {{-- temporary url -> this is a livewire feature to get the url of the photo --}}
                                <img src="{{ $photo->temporaryUrl() }}" alt="Product image" height="300px" width="300px" class="rounded-lg">
                            @else
                                <img src="{{ asset('images/placeholder-image.jpg')}}" alt="default image" height="300px" width="300px" class="rounded-lg">
                            @endif
                        </div>
                        <!-- End Col -->
                        <div class="sm:col-span-3">
                            <label for="af-submit-application-resume-cv" class="inline-block text-sm font-medium mt-2.5">
                                Product Image
                            </label>
                        </div>
                        <!-- End Col -->
                        
                        <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true" x-on:livewire-upload-finish="uploading = true" x-on:livewire-upload-error="uploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress" class="sm:col-span-9">
                            <label for="file" class="sr-only">Choose Image</label>
                            <input type="file" wire:model="photo" id="file" class="block w-full border bg-gray-800 text-white shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-700 file:border-0 file:bg-gray-600 file:me-4 file:py-2 file:px-4 hover:file:bg-gray-500">
                            @error('photo') <span class="text-red-500">{{ $message }}</span> @enderror
                            <!-- File Uploading Progress Form -->
                            <div x-show="uploading">
                                <!-- Progress Bar -->
                                <div class="flex items-center gap-x-3 whitespace-nowrap">
                                    <div class="flex w-full h-2 bg-gray-600 rounded-full overflow-hidden" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">
                                        <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500" :style="`width: ${progress}%`"></div>
                                    </div>
                                    <div class="w-6 text-end">
                                        <span class="text-sm" x-text="`${progress}%`"></span>
                                    </div>
                                </div>
                                <!-- End Progress Bar -->
                            </div>
                            <!-- End File Uploading Progress Form -->
                        </div>

                        <div class="sm:col-span-3">
                            <div class="inline-block">
                                <label for="af-submit-application-bio" class="inline-block text-sm font-medium mt-2.5">
                                    Product description
                                </label>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-9">
                            <textarea id="af-submit-application-bio" wire:model="product_description" class="py-2 px-3 block w-full border-gray-600 bg-gray-800 text-white rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" rows="6" placeholder="Add a product description here!"></textarea>
                            @error('product_description') <span class="text-red-500">{{ $message }}</span> @enderror
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