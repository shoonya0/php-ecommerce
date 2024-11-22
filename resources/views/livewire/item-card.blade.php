<div class="bg-gray-100 shadow-sm rounded-lg hover:border border-gray-300 p-1">
    <a wire:navigate href="/product/{{$product->id}}/detail">
        <div>
            <img src="{{$product->image ? url('http://localhost/E-commerce/storage/app/private/photos/' . basename($product->image)) : asset('images/placeholder-image.jpg')}}" alt="product-image" class="rounded-t-lg object-cover w-full h-full" height="400px" width="400px">
        </div>
        <div class="justify-between">
            <h2 class="line-clamp-2 px-3 text-lg font-bold ">{{$product->name}}</h2>
            <h2 class="line-clamp-2 px-3 text-lg font-semibold">{{$product->description}}</h2>
            <div class="flex justify-between px-3 py-2">
                <div class="bg-green-200 p-1 rounded-md">
                    <h2 class="text-1xl">{{$product->category->name}}</h2>
                </div>
                <h2 class="text-1xl font-bold">${{$product->price}}</h2>
            </div>
            @if (auth()->check())
                <a wire:click.prevent="addToCart({{ $product->id }})" href="#">
                    <div class="flex gap-2 justify-center w-full rounded bg-blue-600 px-12 py-2 text-sm font-medium text-white text-center shadow hover:bg-blue-700 focus:outline-none focus:ring active:bg-blue-500 sm:w-auto">
                        <div wire:loading class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white-600 rounded-full" role="status" aria-label="loading">
                            <span class="sr-only">Loading...</span>
                        </div>  
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg> 
                        <span>Add to cart</span>
                    </div>
                </a>
            @else
                <a wire:navigate href='/register'>
                    <div class="flex gap-2 justify-center w-full rounded bg-blue-600 px-12 py-2 text-sm font-medium text-white text-center shadow hover:bg-blue-700 focus:outline-none focus:ring active:bg-blue-500 sm:w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg> 
                        <span>Add to cart</span>
                    </div>
                </a>
            @endif
        </div>
    </a>
</div>
