<!DOCTYPE html>
<html>
<head>
    <title>Animasi Gambar RFID Scan</title>
    <style>
        #successAnimation {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#barcode').on('input', function() {
                var barcodeValue = $(this).val();
                // Lakukan verifikasi barcode
                if (barcodeValue === 'RFID123') {
                    showSuccessAnimation();
                }
            });

            function showSuccessAnimation() {
                $('#successAnimation').fadeIn(500, function() {
                    setTimeout(function() {
                        $('#successAnimation').fadeOut(500);
                    }, 1000);
                });
            }
        });
    </script>
</head>
<body>
    <h2>Scan RFID:</h2>
    <input type="text" id="barcode" autofocus>
    <div id="successAnimation">
        <img src="data:image/png;base64,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" alt="Success" width="200">
    </div>
</body>
</html>
