@extends('layoutcos')

@section('title', 'Cart')

@section('content')
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Ticket</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0 ?>
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                <?php $total += $details['price'] * $details['quantity'] ?>
                <tr>
                    <td data-th="Ticket">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ asset('images/poster_bilet.jpg') }}" width="100" height="100" class="img-responsive" /></div>
                            <div class="col-sm-9">
                                <h4 class="no-margin">{{ $details['Tip_Bilet'] ?? 'Unknown Ticket' }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">$ {{ $details['price'] ?? 'Price Not Set' }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" data-id="{{ $id }}" />
                    </td>
                    <td data-th="Subtotal" class="text-center">$ {{ $details['price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td><a href="{{ route('shop.index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
            <td>
                <div class="checkout-container">
                    <div class="row">
                        <div class="col text-right">
                            <form action="{{ route('checkout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </tfoot>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $(".update-cart").click(function(e) {
            e.preventDefault();

            var id = $(this).data("id");
            var quantity = $(this).closest("tr").find(".quantity").val();

            $.ajax({
                url: "{{ route('update-cart') }}",
                method: "patch",
                data: {id: id, quantity: quantity, _token: "{{ csrf_token() }}"},
                success: function(response) {
                    location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var id = $(this).data("id");

            $.ajax({
                url: "{{ route('remove-from-cart') }}",
                method: "delete",
                data: {id: id, _token: "{{ csrf_token() }}"},
                success: function(response) {
                    location.reload();
                }
            });
        });
    });
</script>
@endsection
