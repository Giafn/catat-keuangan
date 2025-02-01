<x-app-layout>
    <div class="bg-gray-100 min-h-screen p-5">
        <div class="flex justify-between">
            <h1 class="text-xl font-bold text-center mb-4">Daftar Tabungan</h1>
            <a href="{{ route('tabungans.create') }}" class="text-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6">
                    <path fill="#3b82f6" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/>
                </svg>
            </a>
        </div>
        

        <div class="grid grid-cols-1 gap-4 mt-4">
            @foreach ($tabungans as $tabungan)
                <a href="/tabungans/{{ $tabungan->id }}" class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-4 flex justify-between items-center">
                        <div class="wrap">
                            <h2 class="font-bold">{{ $tabungan->nama }}</h2>
                            <p class="text-gray-500">Rp. {{ number_format($tabungan->saldo) }}</p>

                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-6 h-6 text-gray-500">
                            <path d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/>
                        </svg>
                    </div>
                </a>
            @endforeach
        </div>
        @if ($tabungans->isEmpty())
            <p class="text-center mt-4">Belum ada tabungan</p>
        @endif
        <div class="mt-4">
            {{ $tabungans->links() }}
        </div>
    </div>
</x-app-layout>
