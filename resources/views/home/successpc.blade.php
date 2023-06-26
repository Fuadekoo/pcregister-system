 <h1>PC Registration</h1>

<p>Barcode: </p>



<a href="{{ route('download.file') }}">Download Barcode PDF</a> 


<!-- //down -->
<!-- route -> pcregister->  -->
<a href="{{ route('downloadQRCode') }}" download="fuad">
    <img src="data:image/png;base64,{{ $qrCodeData }}">
</a>
