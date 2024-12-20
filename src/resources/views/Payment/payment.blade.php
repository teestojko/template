@extends('Layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/Payment/payment.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
@endsection

@section('content')
    <div class="payment_main">
        <div class="content_main">
            <div class="title">
                決済ページ
            </div>

            <!-- 合計金額を表示 -->
            <div class="total_amount">
                <p class="amount_title">合計金額: ¥{{ number_format(session('total_amount')) }}</p>
            </div>

            <form class="payment_form" action="{{ route('payment-process') }}" method="POST">
                @csrf
                <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="{{ env('STRIPE_KEY') }}"
                    data-amount="{{ session('total_amount') }}"
                    data-name="Stripe決済デモ"
                    data-label="決済をする"
                    data-description="これはデモ決済です"
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                    data-locale="auto"
                    data-currency="JPY">
                </script>
            </form>
        </div>
    </div>
@endsection
