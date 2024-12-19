<x-filament::page>
    <div class="p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">Pinjam Kendaraan</h1>

        @if (session()->has('success'))
            <div class="p-4 mb-4 text-green-700 bg-green-100 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('filament.user.pages.pinjam-page.store') }}">
            @csrf

            <div class="mb-4">
                <label for="kendaraan_id" class="block font-medium text-white">Pilih Kendaraan</label>
                <select name="kendaraan_id" id="kendaraan_id" class="w-full p-2 mt-1 border border-gray-300 rounded">
                    @foreach ($this->getVehicles() as $vehicle)
                        <option value="{{ $vehicle->id }}">{{ $vehicle->nama }} - {{ $vehicle->status }}</option>
                    @endforeach
                </select>
                @error('kendaraan_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="qr_scan" class="block font-medium text-gray-700">Scan QR Code Kendaraan</label>
                <div id="reader" style="width: 100%; height: 300px; display: none;"></div>
                <div id="result" class="mt-2 text-gray-700"></div>
            </div>

            <div class="mb-4">
                <button type="button" id="scanButton" class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">
                    Buka Kamera dan Scan QR
                </button>
            </div>

            <div>
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                    Pinjam
                </button>
            </div>
        </form>
    </div>

    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
    <script>
        let html5QrCode;

        function onScanSuccess(decodedText, decodedResult) {
            document.getElementById('result').innerText = `Hasil Scan: ${decodedText}`;
            console.log(`Hasil scan: ${decodedText}`, decodedResult);

            // Update the kendaraan_id field with the scanned value (optional)
            document.getElementById('kendaraan_id').value = decodedText;

            // Stop the QR code scanning after a successful scan
            if (html5QrCode) {
                html5QrCode.stop().then(() => {
                    document.getElementById('reader').style.display = 'none';
                }).catch((err) => {
                    console.error('Error stopping the scanner: ', err);
                });
            }
        }

        function onScanError(errorMessage) {
            console.warn(`Kesalahan scan: ${errorMessage}`);
        }

        document.getElementById('scanButton').addEventListener('click', () => {
            document.getElementById('reader').style.display = 'block';

            html5QrCode = new Html5Qrcode("reader");
            html5QrCode.start(
                { facingMode: "environment" },
                {
                    fps: 10,
                    qrbox: { width: 250, height: 250 }
                },
                onScanSuccess,
                onScanError
            );
        });
    </script>
</x-filament::page>
