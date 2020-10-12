
@foreach($orders as $item)
<tr>
    <td>
        <div style="width: 220px;height: 190px;">
            <img width="100%" height="100%" src="{{ $item->product->path_img }}" alt="">
        </div>
    </td>
    <td>{{ $item->product->pro_name }}</td>
    <td>{{ $item->or_qty }}</td>
    <td>{{ $item->or_sale }}%</td>
    <td>{{ number_format($item->or_price,0,',','.') }}</td>
</tr>
    @endforeach
