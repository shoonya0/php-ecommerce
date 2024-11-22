<div class='px-10 md:px-20 sm:px-30 py-3'>
    <h2 class='font-medium text-[20px] my-3'>All Products</h2>
    
    @php
        $all = 'all';
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($products as $product)
            <div class="bg-gray-100 shadow-sm rounded-lg hover:border border-gray-300 p-4">
                <a wire:navigate href="/product/{{$product->id}}/detail">
                    <div class="flex flex-col items-center">
                        <img src="{{$product->image ? url('http://localhost/E-commerce/storage/app/private/photos/' . basename($product->image)) : asset('images/placeholder-image.jpg')}}" alt="product-image" class="rounded-t-lg object-cover w-full h-70" height="400px" width="400px">
                        <h2 class="line-clamp-2 text-lg font-bold mt-2">{{$product->name}}</h2>
                        <h2 class="line-clamp-2 text-lg font-semibold">{{$product->description}}</h2>
                        <div class="flex justify-between w-full mt-2">
                            <div class="bg-green-200 p-1 rounded-md">
                                <h2 class="text-lg">{{$product->category->name}}</h2>
                            </div>
                            <h2 class="text-lg font-bold">${{$product->price}}</h2>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>