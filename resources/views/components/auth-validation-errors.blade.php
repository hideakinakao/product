@props(['errors'])

@if($errors -> any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">
            {{ __() }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

            @if(empty($errors->first('img_path')))
                <li>画像ファイルがあれば、もう一度選択してください。</li>
            @endif
        </ul>
    </div>
@endif