
<table class="table table-striped" id="mytable">
    <tr>
        <th>ID</th>
        <th>Items</th> 
        <th>Employee</th>
        <th>Action</th>
    </tr>
    <?php $number = 1; ?>
    @foreach($orders as $order)

    <tr>
        <td>{{ $number++ }}</td>
        <td>
            @foreach($order->items as $item)
            {{ $item->name }},
            @endforeach
        </td>
        <td>{{ $order->user->name }}</td>
        <td>
            <form action="{{ route('order.complete', $order->id) }}" method="POST">
                @csrf
                <button class="btn btn-outline-success">Complete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
