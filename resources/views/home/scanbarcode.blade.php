<!DOCTYPE html>
<html>
<head>
    <title>Barcode Reader Example</title>
</head>
<body>
    <div id="reader">
        <input type="text" id="barcodeInput" placeholder="Scan barcode here" autofocus>
    </div>

    <div id="userDetails"></div>

    <script>
        // Barcode scanning logic
        document.getElementById('barcodeInput').addEventListener('keydown', function(event) {
            // Wait for the 'Enter' key (key code 13)
            if (event.keyCode === 13) {
                event.preventDefault();
                
                // Get the scanned barcode value
                var barcode = this.value;
                
                // Clear the input field
                this.value = "";
                
                // Make an AJAX request to search for the barcode in the database
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/search', true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            var response = JSON.parse(xhr.responseText);
                            
                            // Check if barcode is found in the database
                            if (response.found) {
                                // Display user details in the "userDetails" div
                                document.getElementById('userDetails').innerHTML = "<h2>User Details:</h2>" +
                                    "<p>Name: " + response.user.name + "</p>";
                            } else {
                                // Display a popup message if barcode is not found
                                alert("Barcode not found in the database.");
                            }
                        } else {
                            // Display an error message if there was an issue with the request
                            alert("Error: " + xhr.status);
                        }
                    }
                };
                
                // Send the barcode value as JSON data in the request body
                xhr.send(JSON.stringify({ barcode: barcode }));
            }
        });
    </script>
</body>
</html>
