<div class="px-10 md:px-20 sm:px-30 py-3">
    <!-- Brand New -->
    <h2 class="font-bold text-[20px] my-3">Brand New</h2>
    <livewire:product-listing :category_id="3" :current_product_id="0" />

    @foreach ($categories as $category)
        <h2 class="font-bold text-[20px] my-3">{{ $category->name }}</h2>
        <livewire:product-listing :category_id="$category->id" :current_product_id="0" />
    @endforeach
</div>
