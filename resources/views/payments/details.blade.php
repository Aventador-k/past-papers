@extends('layout.app')

@section('title' , 'Payment Details')

@section('content')
<div class="lg:p-0 md:p-6">
    <div class="max-w-md mx-auto bg-gray-100 shadow-md rounded-md overflow-hidden mt-16 px-4 md:px-0">
        <div class="bg-blue-600 text-white p-4 flex justify-between">
            <div class="font-bold text-lg">Payments Details</div>
            <div class="text-lg"><i class="fab fa-cc-visa"></i></div>
        </div>
        <form action="/payments/pay/{{ $paperId }}" method="post">
            @csrf
        <div class="p-4 md:p-6">
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="email">
                    Email
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="email" name="email" type="email" placeholder="Email">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="phone">
                    Phone Number
                </label>
                <input
                    name="phone"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="phone" type="text" placeholder="Phone Number">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="amount">
                    Amount
                </label>
                <input
                    value="{{ $paper->price }}"
                    disabled
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="amount" type="text" placeholder="Amount">
            </div>

            <button
                type="submit"
                class="bg-blue-900 text-white py-2 px-4 rounded font-bold hover:bg-blue-700 focus:outline-none focus:shadow-outline w-full md:w-auto">
                Pay Now
            </button>
        </form>
        </div>
    </div>
</div>



@push('styles')
@vite('resources/css/tailwind.css')
@endpush

@endsection
