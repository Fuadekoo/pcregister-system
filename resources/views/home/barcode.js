$(document).ready(function() {
    function onScanSuccess(data) {
        $.ajax({
            type: "POST",
            cache: false,
            url: "{{ route('barcodescan') }}", // Replace with your Laravel route URL
            data: {
                "_token": "{{ csrf_token() }}",
                "barcode": data
            },
            success: function(response) {
                if (response) {
                    // Display user details
                    var userDetails = response;

                    var tableContent = '<table>' +
                        '<thead>' +
                        '<tr>' +
                        '<th>User ID</th>' +
                        '<th>Username</th>' +
                        '<th>Description</th>' +
                        '<th>PC Name</th>' +
                        '<th>Serial Number</th>' +
                        '<th>Photo</th>' +
                        '</tr>' +
                        '</thead>' +
                        '<tbody>' +
                        '<tr>' +
                        '<td>' + userDetails.userid + '</td>' +
                        '<td>' + userDetails.name + '</td>' +
                        '<td>' + userDetails.description + '</td>' +
                        '<td>' + userDetails.pc_name + '</td>' +
                        '<td>' + userDetails.serial + '</td>' +
                        '<td>' +
                        '<td>' +
                        (userDetails.photo ? '<img src="{{ asset('/') }}' + userDetails.photo + '" alt="Photo" style="width: 150px; height: 120px;">' : 'No photo available') +
                        '</td>' +
                        '</td>' +
                        '</tr>' +
                        '</tbody>' +
                        '</table>';

                    $('#userDetails').html(tableContent);
                } else {
                    alert('There is no user with this barcode');
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }

    var html5QrcodeScanner = new Html5QrcodeScanner("reader", {
        fps: 10,
        qrbox: 250
    });
    html5QrcodeScanner.render(onScanSuccess);
});
