<x-app-layout>
    <x-slot name="header">
        <h2>商品情報編集画面</h2>
        <x-message :message="session('message')"/>
    </x-slot>

    {{-- 詳細表示するコード --}}
    <form action="{{ route('product.update', $product) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div>
            <label for="product_name">商品名</label>
            <input type="text" name="product_name" id="product_name" value="{{ old('product_name', $product->product_name) }}">
        </div>

        <div>

            <label for="company_id">メーカー名</label>
            <select name="company_id" id="company_id">
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}"{{ $product->company_id == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                @endforeach
            </select>


        </div>

        <div>
            <label for="price">価格</label>
            <input type="text" name="price" id="price" value="{{ old('price', $product->price) }}">
        </div>

        <div>
            <label for="stock">在庫数</label>
            <input type="text" name="stock" id="stock" value="{{ old('stock', $product->stock) }}">
        </div>

        <div>
            <label for="comment">コメント</label>
            <textarea name="comment" id="comment" cols="10" rows="1">{{ old('comment', $product->comment) }}</textarea>
        </div>

        <div>
            <label for="img_path">商品画像</label>
            <input type="file" name="img_path" id="img_path">
            @if($product->img_path)
            <img src="{{ asset('storage/img_paths/' . $product->img_path) }}" style="height:100px"/>
            @endif
        </div>

        <div>
            <x-primary-button>更新</x-primary-button>
            <a href="{{ route('product.show', $product) }}"><x-secondary-button class="ml-3">戻る</x-secondary-button></a>
        </div>
</x-app-layout>