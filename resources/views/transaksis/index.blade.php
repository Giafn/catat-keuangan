<x-app-layout>
    <div class="bg-gray-100 min-h-screen p-5">
        <h1 class="text-2xl font-bold text-center mb-4">Daftar Transaksi</h1>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 text-left">Tabungan</th>
                        <th class="py-2 px-4 text-left">Jenis</th>
                        <th class="py-2 px-4 text-left">Jumlah</th>
                        <th class="py-2 px-4 text-left">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $transaksi)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $transaksi->tabungan->nama }}</td>
                            <td class="py-2 px-4">{{ ucfirst($transaksi->jenis) }}</td>
                            <td class="py-2 px-4">Rp {{ number_format($transaksi->jumlah, 0, ',', '.') }}</td>
                            <td class="py-2 px-4">{{ $transaksi->tanggal }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
