<x-clear-layout>
    <div class="text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <img src="{{ asset('img/success.svg') }}" alt="Success" class="w-1/3 mx-auto mb-10 md:w-1/4">
            <h1 class="text-2xl font-bold text-blue-500">Transaksi berhasil</h1>
            <p class="text-gray-500 mt-2">Terima kasih telah melakukan transaksi</p>
            <a href="{{ Session::get('urlRedirect') }}" class="mt-5 text-white hover:underline px-4 py-2 border bg-blue-500 rounded-md block w-3/4 text-center mx-auto">Kembali ke {{ Session::get('pageName') }}</a>
        </div>
    </div>
    <script>
        // cek kalo gada session urlRedirect
        let sessionUrlRedirect = '{{ Session::get('urlRedirect') }}';
        let sessionPageName = '{{ Session::get('pageName') }}';

        console.log(sessionUrlRedirect);
        if (!sessionUrlRedirect || !sessionPageName) {
                window.history.back();
            }
    </script>
</x-clear-layout>
