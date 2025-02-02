<x-app-layout>
    <div class="bg-gray-100 min-h-screen p-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-between">
                <a href="/tabungans/{{ $transaksi->tabungan_id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-6 h-6 text-gray-500">
                        <path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                    </svg>
                </a>
                <h1 class="text-xl font-bold text-center mb-4">Detail Transaksi</h1>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="mb-4">
                    <p class="block text-sm font-medium text-gray-700">Tabungan Dipilih</p>
                    <div class="flex items-center mt-1">
                        <p class="text-gray-500">{{ $transaksi->nama_tabungan }} - Rp. {{ number_format($transaksi->saldo_tabungan) }}</p>
                    </div>
                </div>

                <div class="mb-4">
                    <p class="block text-sm font-medium text-gray-700">Jenis Transaksi</p>
                    <div class="flex items-center mt-1">
                        <p class="text-gray-500">{{ ucfirst($transaksi->jenis) }}</p>
                    </div>
                </div>

                <div class="mb-4">
                    <p class="block text-sm font-medium text-gray-700">Jumlah</p>
                    <div class="flex items-center mt-1">
                        <p class="text-gray-500">Rp. {{ number_format($transaksi->jumlah) }}</p>
                    </div>
                </div>

                <div class="mb-4">
                    <p class="block text-sm font-medium text-gray-700">Tanggal</p>
                    <div class="flex items-center mt-1">
                        <p class="text-gray-500">{{ date('d M Y', strtotime($transaksi->tanggal)) }}</p>
                    </div>
                </div>

                <div class="mb-4">
                    <p class="block text-sm font-medium text-gray-700">Keterangan</p>
                    <div class="flex items-center mt-1">
                        <p class="text-gray-500">{{ $transaksi->keterangan ?: '-' }}</p>
                    </div>
                </div>

                <!-- Delete Form -->
                <div class="mt-6 flex justify-between">
                    <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this transaction?');">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600" onclick="preventDefault(); confirm('Are you sure you want to delete this transaction?') ? this.parentElement.submit() : false">
                            Hapus Transaksi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
