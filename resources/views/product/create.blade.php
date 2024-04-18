<x-app-layout>
    <x-slot name="header">
        <h2>商品新規登録画面</h2>
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>
        <x-message :message="session('message')"/>
    </x-slot>
    
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="product_name">商品名</label>
            <input type="text" name="product_name" id="product_name" value="{{ old('product_name') }}">
        </div>

        <div>

            <label for="company_id">メーカー名</label>
            <select name="company_id" id="company_id">
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                @endforeach
            </select>


        </div>

        <div>
            <label for="price">価格</label>
            <input type="text" name="price" id="price" value="{{ old('price') }}">
        </div>

        <div>
            <label for="stock">在庫数</label>
            <input type="text" name="stock" id="stock" value="{{ old('stock') }}">
        </div>

        <div>
            <label for="comment">コメント</label>
            <textarea name="comment" id="comment" cols="10" rows="1">{{ old('comment') }}</textarea>
        </div>

        <div>
            <label for="img_path">商品画像</label>
            <input type="file" name="img_path" id="img_path">
        </div>

        <div>
            <x-primary-button>新規登録</x-primary-button>
            <a href="{{ route('product.index') }}"><x-secondary-button class="ml-3">戻る</x-secondary-button></a>
        </div>
    </form>
</x-app-layout>