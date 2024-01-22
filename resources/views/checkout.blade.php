@extends('layoutcos')

@section('title', 'Checkout')

@section('content')
<div class="container mt-4">
    <h2>Checkout</h2>
    <p>Please confirm your order and proceed with the payment.</p>

    <!-- Display cart items -->
    @include('cart')

    <!-- Payment form -->
    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <!-- Add additional fields as necessary -->

        <button type="submit" class="btn btn-primary">Proceed to Payment</button>
    </form>
</div>
@endsection
