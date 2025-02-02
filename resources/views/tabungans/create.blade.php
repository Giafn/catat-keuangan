<x-app-layout>
    <div class="bg-gray-100 min-h-screen p-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-between">
                <a href="/tabungans">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-6 h-6 text-gray-500">
                        <path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                    </svg>
                </a>
                <h1 class="text-xl font-bold text-center mb-4">Tambah Tabungan</h1>
            </div>

            <form action="{{ route('tabungans.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Tabungan</label>
                    <input type="text" id="nama" name="nama" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>
                
                <div class="mb-4">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
                </div>
                
                <div class="flex justify-center mt-4">
                    <button type="submit" class="bg-blue-500 text-white py-1 px-2 rounded-md">Simpan Tabungan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
