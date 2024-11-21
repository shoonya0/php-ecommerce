<div class="font-sans antialiased dark:bg-black dark:text-white/50 rounded-2xl">
    <div class="flex flex-col">
        <!-- Header -->
        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
            <div>
                <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">Products</h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">Add products, edit and more.</p>
            </div>
            <div class="flex items-center gap-x-2">
                {{-- Search Input --}}
                <div class="max-w-md">
                    <label for="hs-as-table-product-review-search" class="sr-only">Search Product</label>
                    <div class="relative">
                        <input wire:model.live.debounce.300ms="search" type="text" id="hs-as-table-product-review-search" name="hs-as-table-product-review-search" class="py-2 px-3 ps-11 block w-full bg-gray-50 border border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Search Product">
                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                            <svg class="flex-shrink-0 size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.3-4.3" />
                            </svg>
                        </div>
                    </div>
                </div>
                {{-- End Input --}}
                {{-- Add Product Button --}}
                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="/add/product">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14" />
                        <path d="M12 5v14" />
                    </svg>
                    Add Product
                </a>
                {{-- End Add Product Button --}}
            </div>
        </div>
        <!-- End Header -->
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-neutral-400" wire:click="setSortFunctionality('name')">
                                    <button class="flex items-center gap-x-1 ml-1">
                                        Name
                                        @if($sortByColumn != 'name')
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                            </svg>
                                        @elseif($sortDirection == 'ASC')
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-neutral-400" wire:click="setSortFunctionality('description')">
                                    <button class="flex items-center gap-x-1 ml-1">
                                        Description
                                        @if($sortByColumn != 'description')
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                            </svg>
                                        @elseif($sortDirection == 'ASC')
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-neutral-400" wire:click="setSortFunctionality('price')">
                                    <button class="flex items-center gap-x-1 ml-1">
                                        Price
                                        @if($sortByColumn != 'price')
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                            </svg>
                                        @elseif($sortDirection == 'ASC')
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-neutral-400" wire:click="setSortFunctionality('category_id')">
                                    <button class="flex items-center gap-x-1 ml-1">
                                        Category
                                        @if($sortByColumn != 'category_id')
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                            </svg>
                                        @elseif($sortDirection == 'ASC')
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-neutral-400" wire:click="setSortFunctionality('created_at')">
                                    <button class="flex items-center gap-x-1 ml-1">
                                        Created
                                        @if($sortByColumn != 'created_at')
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                            </svg>
                                        @elseif($sortDirection == 'ASC')
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 dark:text-neutral-400"></th>
                                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 dark:text-neutral-400"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                          @if($products->count() > 0)
                            @foreach ($products as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        <a wire:navigate href="">
                                            <div class="flex items-center gap-x-3">
                                                <img class="inline-block size-[50px] rounded-full" src="{{ url('http://localhost/E-commerce/storage/app/private/photos/' . basename($item->image)) }}" alt="Avatar">
                                                <div class="grow block text-sm font-semibold">{{str($item->name)->words(3)}}</div>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-pre-line text-sm text-gray-800 dark:text-neutral-200 line-clamp-3">{{str($item->description)->words(50)}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $item->price }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $item->category->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $item->created_at->format('D M Y,H:i') }}</td>
                                    <td class="whitespace-nowrap px-6 py-1.5">
                                        <a wire:navigate class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium" href="edit/{{ $item->id }}/product">
                                            Edit
                                        </a>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-1.5">
                                        <a wire:click="delete({{ $item->id}})" wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE" class="inline-flex items-center gap-x-1 text-sm text-red-500 decoration-2 hover:underline focus:outline-none focus:underline font-medium" href="">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                          @else
                            <tr>
                              <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">No data found</td>
                            </tr>
                          @endif
                        </tbody>
                    </table>
                    <div class="mx-10 max-w-full">
                        {{ $products->links() }}
                    </div>
                    <div class="py-4 px-3">
                        <div class="flex ">
                            <div class="flex space-x-4 items-center mb-3">
                                <label class="w-32 text-sm font-medium text-gray-400">Per Page</label>
                                <select wire:model.live='perPage' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option value="5">5</option>
                                    <option value="7">7</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
