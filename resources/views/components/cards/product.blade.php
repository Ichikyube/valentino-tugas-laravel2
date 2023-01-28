<tr @if ($loop->first) class="bg-nfo" @endif>{{--the loop variable--}}

    <td>{{ $product->name }}</td>
    <td>${{ number_format($product->price, 2) }}</td>
    <td>{{ Str::limit($product->description, 50) }}</td>
    <td>{{ $product->category->name ?? '' }}</td>
</tr>
