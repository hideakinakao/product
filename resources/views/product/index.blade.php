<x-app-layout>
    <x-slot name="header">
        <h2>商品一覧画面</h2>
        <x-message :message="session('message')"/>
    </x-slot>

    {{-- 検索機能コード --}}
    <div>
        <form action="{{ route('product.index') }}" method="GET">
            @csrf
            <input type="text" name="keyword" id="keyword" value="{{ old('keyword') }}">
            <select name="company_id" id="company_id">
                <option value="">全て</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                @endforeach
            </select>
            <x-primary-button>検索</x-primary-button>
        </form>
    </div>
            {{-- 一覧表示するコード --}}
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>商品画像</th>
                    <th>商品名</th>
                    <th>価格</th>
                    <th>在庫数</th>
                    <th>メーカー名</th>
                    <th><a href="{{ route('product.create') }}"><x-primary-button>新規作成</x-primary-button></a></th>
                </tr>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td><img src="{{ asset('storage/img_paths/' . $product->img_path) }}" style="height:100px"/></td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->company->company_name }}</td>
                    <td class="button">
                        <a href="{{ route('product.show', $product) }}"><x-primary-button>詳細</x-primary-button></a>
                        <form method="POST" action="{{ route('product.destroy', $product) }}">
                            @csrf
                            @method('delete')
                            <x-danger-button>削除</x-danger-button>
                        </form>
                    </td>
                </tr>

                @endforeach
            </table>
  
        {{ $products->appends(request()->input())->links(); }}
</x-app-layout>