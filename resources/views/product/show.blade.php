<x-app-layout>
    <x-slot name="header">
        <h2>商品情報詳細画面</h2>
        <x-message :message="session('message')"/>
    </x-slot>

    {{-- 詳細表示するコード --}}
    <table>
        <tr>
            <th>ID</th>
            <td>{{ $product->id }}</td>
        </tr>
        <tr>
            <th>商品画像</th>
            <td><img src="{{ asset('storage/img_paths/' . $product->img_path) }}" style="height:100px"/></td>
        </tr>
        <tr>
            <th>商品名</th>
            <td>{{ $product->product_name }}</td>
        </tr>
        <tr>
            <th>メーカー</th>
            <td>{{ $product->company->company_name }}</td>
        </tr>
        <tr>
            <th>価格</th>
            <td>{{ $product->price }}</td>
        </tr>
        <tr>
            <th>在庫数</th>
            <td>{{ $product->stock }}</td>
        </tr>
        <tr>
            <th>コメント</th>
            <td>{{ $product->comment }}</td>
        </tr>
        <tr>
            <td><a href="{{ route('product.edit', $product) }}"><x-primary-button>編集</x-primary-button></a></th>
            <td><a href="{{ route('product.index') }}"><x-primary-button>戻る</x-primary-button></a></td>
        </tr>
    </table>
</x-app-layout>