<x-app-layout>
    <div class="bg-gray-100 min-h-screen p-5">
        <div class="flex justify-between">
            <a href="/tabungans/{{ $tabungan->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-6 h-6 text-gray-500">
                    <path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                </svg>
            </a>
            <h1 class="text-xl font-bold text-center mb-4">Setting tabungan</h1>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('tabungans.update', $tabungan->id) }}" method="POST">
                @csrf
                @method('PATCH')
    
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Tabungan</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama', $tabungan->nama) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>
                
                <div class="mb-4">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('deskripsi', $tabungan->deskripsi) }}</textarea>
                </div>
                <div class=" mt-4">
                    <button type="submit" class="bg-blue-500 text-white py-1 px-2 rounded-md w-full" @click="open = false">Simpan Perubahan</button>
                </div>
            </form>

            <div class="mt-2"  x-data="{ open: false }">
                <button @click="open = !open" 
                    class="block bg-red-500 text-white py-1 px-2 rounded-md w-full" 
                    type="button">
                    Hapus Tabungan
                </button>
                <div x-show="open == true" 
                    @click.away="open = false" 
                    x-transition 
                    class="fixed top-0 left-0 right-0 bottom-0 z-50 flex justify-center items-center w-full h-full bg-gray-800 bg-opacity-50">
                    <div class="relative p-4 w-full max-w-2xl bg-white rounded-lg shadow-sm">
                        <!-- Modal content -->
                        <div class="relative">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 border-b rounded-t border-gray-200">
                                <h3 class="text-xl font-semibold text-gray-900">
                                    Konfirmasi
                                </h3>
                                <button @click="open = false" 
                                    type="button" 
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
        
                            <!-- Modal body -->
                            <div class="p-4 space-y-4">
                                <p class="text-sm text-gray-500">
                                    Apakah anda yakin ingin menghapus tabungan ini?
                                </p>
                            </div>
        
                            <!-- Modal footer -->
                            <div class="flex items-center p-4 border-t border-gray-200 rounded-b">
                                <form action="{{ route('tabungans.destroy', $tabungan->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="py-2.5 px-5 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600">Delete</button>
                                </form>
                                <button @click="open = false" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700">Decline</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
