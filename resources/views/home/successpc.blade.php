 <h1>PC Registration</h1>

<p>Barcode: </p>



<a href="{{ route('download.file') }}">Download Barcode PDF</a> 


<!-- //down -->
<!-- route -> pcregister->  -->
<a href="{{ route('downloadQRCode') }}" download="fuad">
</a>

<img src="{{ asset($qrcode_file_path) }}" alt="QR Code">
<a href="{{ asset($qrcode_file_path) }}" download>Download QR Code</a>

