<x-app-layout>
    <div class="bg-gray-100 min-h-screen p-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-between">
                <div class="header-container">
                    <h1 class="text-2xl">Welcome</h1>
                    <h2 class="text-4xl font-bold">{{ ucfirst(auth()->user()->name) }}</h2>
                </div>

                <div class="header-container">
                    <img src="https://api.dicebear.com/9.x/notionists-neutral/svg?seed={{ ucfirst(auth()->user()->name) }}" alt="Gia Fn" class="rounded-full h-20 w-20 shadow-md ring-2 ring-blue-500">
                </div>
            </div>
            <div class="py-5">
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-blue-500 text-white rounded-lg shadow-md p-5 col-span-2">
                        <h3 class="text-lg">Tabungan</h3>
                        <p class="text-xl font-bold break-words">Rp. {{ number_format($totalSaldo) }}</p>
                    </div>
                    <div class="bg-blue-500 text-white rounded-lg shadow-md p-5">
                        <h3 class="text-lg">Pengeluaran</h3>
                        <p class="text-xl font-bold break-words">Rp. {{ number_format($totalPengeluaran) }}</p>
                    </div>
                    <div class="bg-blue-500 text-white rounded-lg shadow-md p-5">
                        <h3 class="text-lg">Pemasukan</h3>
                        <p class="text-xl font-bold break-words">Rp. {{ number_format($totalPemasukan) }}</p>
                    </div>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg font-bold">Riwayat Transaksi</h3>
                    @forelse($transaksis as $transaksi)
                        <div class="bg-white rounded-lg overflow-hidden mt-3 px-3 py-2">
                            <div class="flex justify-between">
                                <div class="font-medium">
                                    <p class="text-sm text-gray-500">{{ ucfirst($transaksi->jenis) }}</p>
                                    <p class="text-lg text-{{ $transaksi->jenis == 'pemasukan' ? 'blue' : 'red' }}-600">{{ $transaksi->jenis == 'pemasukan' ? '+' : '-' }} Rp. {{ number_format($transaksi->jumlah) }}</p>
                                </div>
                                <div class="font-medium text-gray-500">
                                    <p class="text-sm">{{ date('d M Y', strtotime($transaksi->tanggal)) }}</p>
                                </div>
                            </div>
                            <div class="flex justify-between">
                                <div class="font-medium text-gray-500">
                                    <p class="text-sm">{{ ucfirst($transaksi->tabungan) }}</p>
                                </div>
                                <div class="font-medium text-gray-500">
                                    <p class="text-sm text-gray-600">{{ ucfirst($transaksi->user) }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Belum ada transaksi</p>
                    @endforelse
                </div>
                <div class="mt-4">
                    {{ $transaksis->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
