@extends('layouts.main')

@section('content')
<div class="reservation-container">
    <div class="form-box">
        <h2>Make a Reservation</h2>
        <p>Plan your perfect stay at Bali Dream House Villa</p>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('reservation.store') }}" method="POST">
            @csrf

            <!-- VILLA -->
            <label>Select Villa</label>
            <select name="villa_id" class="form-control" required>
                <option value="">Choose a Villa</option>
                @foreach($villas as $villa)
                    <option value="{{ $villa->id }}">{{ $villa->nama_villa }}</option>
                @endforeach
            </select>

            <!-- DATES -->
            <div class="date-box">
                <div>
                    <label>Check-in Date</label>
                    <input type="date" name="check_in" class="form-control" required>
                </div>
                <div>
                    <label>Check-out Date</label>
                    <input type="date" name="check_out" class="form-control" required>
                </div>
            </div>

            <!-- GUEST -->
            <label>Full Name</label>
            <input type="text" name="fullname" class="form-control" required>

            <label>Email Address</label>
            <input type="email" name="email" class="form-control" required>

            <label>Phone Number</label>
            <input type="text" name="phone" class="form-control" required>

            <label>Special Request</label>
            <textarea name="special_request" class="form-control"></textarea>

            <!-- PAYMENT -->
            <label>Payment Method</label>
            <div class="payment-options">
                <label><input type="radio" name="payment_method" value="Transfer Bank"> Transfer Bank</label>
                <label><input type="radio" name="payment_method" value="E-Wallet"> E-Wallet</label>
                <label><input type="radio" name="payment_method" value="Credit/Debit Card"> Credit/Debit Card</label>
            </div>

            <label>
                <input type="checkbox" name="agree" required> I agree to the villa’s terms and cancellation policy.
            </label>

            <button type="submit" class="btn-reserve">CONFIRM RESERVATION</button>
        </form>
    </div>
</div>

@endsection
