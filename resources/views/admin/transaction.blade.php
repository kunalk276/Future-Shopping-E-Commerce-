<x-admin-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/admin/order.css') }}">
    </x-slot>
    <x-slot name="js">
    </x-slot>

    <div class="_container">
        @if (!$transactions->isEmpty())
        <h1>Transactions</h1><br>
        <div style="overflow-x: auto">
            <table style="width: 100%;min-width:650px" class="card">
                <thead>
                    <tr>
                        <th>Transaction ({{count($transactions)}})</th>
                        <th>Price</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Order</th>
                    </tr>
                </thead>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>
                            <div class="flex_align">
                                <div class="sm_card" style="border-radius:50%; padding:1rem">
                                    <strong>{{ $transaction->order->short_name }}</strong>
                                </div>
                                <div>
                                    <strong>TRA-{{ $transaction->id }}</strong><br>
                                    <span>{{ $transaction->order->full_name }}</span>
                                </div>
                            </div>
                        </td>
                        <td>${{ $transaction->order->grand_total }}</td>
                        <td>{{ $mode[$transaction->mode] }}</td>
                        <td><span style="background: {{$status[$transaction->status][1]}}" class="sm_card status">{{ $status[$transaction->status][0] }}</span></td>
                        <td><a href="{{ route('admin.orders.show', ['order' => $transaction->order->id]) }}">Order-{{ $transaction->order->id }}</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
        @else
            <p>No transactions yet <a href="{{ route('admin.dashboard') }}">Go to Dashboard</a></p>
        @endif
    </div>
</x-admin-layout>
