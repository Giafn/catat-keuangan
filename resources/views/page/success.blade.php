<x-clear-layout>
    <div class="text-center">
        <img src="{{ asset('img/success.svg') }}" alt="Success" class="w-1/3 mx-auto mb-10">
        <h1 class="text-2xl font-bold text-blue-500">Transaksi berhasil</h1>
        <p class="text-gray-500 mt-2">Terima kasih telah melakukan transaksi</p>
    </div>
    <a href="{{ $url }}" class="mt-5 text-white hover:underline px-4 py-2 border bg-blue-500 rounded-md block w-3/4 text-center">Kembali ke {{ $pageName }}</a>
    
</x-clear-layout>
