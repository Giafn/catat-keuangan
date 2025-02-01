<x-app-layout>
    <div class="bg-gray-100 min-h-screen p-5">
        <div class="flex justify-between">
            <a href="/tabungans">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-6 h-6 text-gray-500">
                    <path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                </svg>
            </a>
            <h1 class="text-xl font-bold text-center mb-4">{{ $tabungan->nama }}</h1>
            <a href="/tabungans/{{ $tabungan->id }}/setting">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 text-gray-500">
                    <path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"/>
                </svg>
            </a>
        </div>
        

        <div class="py-2">
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-blue-500 text-white rounded-lg shadow-md p-5 col-span-2">
                    <h3 class="text-lg">Tabungan</h3>
                    <p class="text-xl font-bold">Rp. {{ number_format($tabungan->saldo) }}</p>
                </div>
                <div class="bg-blue-500 text-white rounded-lg shadow-md p-5">
                    <h3 class="text-lg">Pengeluaran</h3>
                    <p class="text-xl font-bold">Rp. {{ number_format($tabungan->pengeluaran) }}</p>
                </div>
                <div class="bg-blue-500 text-white rounded-lg shadow-md p-5">
                    <h3 class="text-lg">Pemasukan</h3>
                    <p class="text-xl font-bold">Rp. {{ number_format($tabungan->pemasukan) }}</p>
                </div>
            </div>
            <div class="mt-5">
                <div class="flex justify-between">
                    <h3 class="text-lg font-bold">Transaksi</h3>
                    <a href="/transaksis/create/{{ $tabungan->id }}" class="text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6">
                            <path fill="#3b82f6" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/>
                        </svg>
                    </a>
                </div>
                @forelse($transaksis as $transaksi)
                <a href="/transaksis/{{ $transaksi->id }}" class="block">
                    <div class="bg-white rounded-lg overflow-hidden mt-3 px-3 py-2">
                        <div class="flex justify-between">
                            <div class="font-medium">
                                <p class="text-sm text-gray-500">{{ ucfirst($transaksi->jenis) }}</p>
                                <p class="text-lg text-{{ $transaksi->jenis == 'pemasukan' ? 'blue' : 'red' }}-600">{{ $transaksi->jenis == 'pemasukan' ? '+' : '-' }} Rp. {{ number_format($transaksi->jumlah) }}</p>
                            </div>
                            <div class="font-medium text-gray-500">
                                <p class="text-sm">{{ $transaksi->tanggal }}</p>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div class="font-medium text-gray-500">
                                <p class="text-sm">{{ ucfirst($transaksi->user) }}</p>
                            </div>
                        </div>
                    </div>
                </a>
                @empty
                    <p class="text-center">Belum ada transaksi</p>
                @endforelse
            </div>
            <div class="mt-4">
                {{ $transaksis->links() }}
            </div>
        </div>
    </div>    
</x-app-layout>
