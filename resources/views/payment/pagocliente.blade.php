
  <x-app-layout>

    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
     
        <div class="flex justify-center"> 
            <div id="qr-reader" style="width: 100%">
            
            </div>
        </div>
        <script>
          // This method will trigger user permissions
          Html5Qrcode.getCameras().then(devices => {
          /**
           * devices would be an array of objects of type:
           * { id: "id", label: "label" }
           */
          if (devices && devices.length) {
              var cameraId = devices[0].id;
              // .. use this to start scanning.
          }
          }).catch(err => {
          // handle err
          });
    
    
          function onScanSuccess(decodedText, decodedResult) {
              // Handle the scanned code as you like, for example:
              html5QrcodeScanner.pause(shouldPauseVideo, showPausedBanner);
              console.log(`Code matched = ${decodedText}`, decodedResult);
              //var audio = new Audio('http://www.sonidosmp3gratis.com/sounds/caja-registradora%20dinero.mp3');
              //var audio = new Audio('http://www.sonidosmp3gratis.com/sounds/scanner-beep-checkout.mp3');
          
              //audio.play();
              window.location.replace(decodedText);
              
            }
    
    
            const formatsToSupport = [
              Html5QrcodeSupportedFormats.QR_CODE,
              Html5QrcodeSupportedFormats.UPC_A,
              Html5QrcodeSupportedFormats.UPC_E,
              Html5QrcodeSupportedFormats.UPC_EAN_EXTENSION,
            ];
            const html5QrcodeScanner = new Html5QrcodeScanner(
              "qr-reader",
              {
                fps: 10,
                qrbox: { width: 250, height: 350 },
                formatsToSupport: formatsToSupport,
                rememberLastUsedCamera: true,
                showTorchButtonIfSupported: true,
                    // Only support camera scan type.
                supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
              },
              /* verbose= */ false);
       

           
            document.addEventListener("DOMContentLoaded", function () {
              // Configuración de la cámara trasera
              html5QrcodeScanner.start(
                { facingMode: { exact: "environment" } },
                { facingMode: "user" },
                onScanSuccess,
                onScanError
              );
            });

            html5QrcodeScanner.render(onScanSuccess);
                            
                            
        
      </script>
      
    </x-fast-view>

   

</x-app-layout > 

