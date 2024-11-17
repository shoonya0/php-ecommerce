<div>
    <div class="flex gap-5 p-20">
        <img src="{{ asset('images/5.jpg') }}" alt="product-image" class="rounded-t-lg object-cover w-[900px] h-[280px]">
        <div>
            <h2 class="p-1 font-medium text-2xl line-clamp-2">Product Title</h2>
            <h2 class="p-1 text-gray-500 line-clamp-4">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
            </h2>
            <div class="flex gap-10">
                <div class="p-1 bg-green-200 rounded-md">
                    <h2 class="text-1xl">Outfit</h2>
                </div>
                <h2 class="p-1 font-medium">$4.23</h2>
            </div>
        
            <div class="my-3">
                <a class="flex gap-2 justify-center w-full rounded border-blue-600 bg-red-600 px-12 py-2 text-sm font-medium text-white text-center transition-colors duration-500 ease-in-out hover:bg-blue-600 hover:text-white focus:outline-none focus:ring active:text-opacity-75 sm:w-auto"
                    href="{{auth()->check() ? '/add/to/cart' : '/register'}}" 
                    class=""
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                    
                    <span>Add to cart</span>
                </a>
            </div>
        </div>
    </div>

    {{-- related products --}}
    <div class="my-5 px-20 pt-5">
        <h2 class="text-2xl font-medium">Related Products</h2>
        <livewire:product-listing />
    </div>
</div>