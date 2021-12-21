<!doctype HTML>
<html>

<head>
  <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <style>    
    #Objek {
      position: fixed;
      top: 1rem;
      left: 1rem;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 1.5em;
      font-weight: 200;
      text-align: center;
      color: whitesmoke;
      background-color: blue;
      display: block;
      width: 10em;
    }
    #UI {
      position: fixed;
      bottom: 1rem;
      left: 1rem;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 2em;
      font-weight: 400;
      text-align: center;
      color: orange;
      background-color: blue;
      display: block;
      width: 10em;
    }
    
    .found {
        color: red;
        background-color: green;
    }
    
    .lost {
        color: green;
        background-color: red;
    }
  </style>
</head>

<script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
<script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js"></script>
<script src="https://raw.githack.com/donmccurdy/aframe-extras/master/dist/aframe-extras.loaders.min.js"></script>

<script src="{{ asset('../js/events.js') }}"></script>
<script src="{{ asset('../js/gestures.js') }}"></script>

<body style='margin : 0px; overflow: hidden;'>
  <a-scene device-orientation-permission-ui="enabled: false" vr-mode-ui="enabled: false" markerhandler embedded arjs='sourceType: webcam; debugUIEnabled: false;' arjs embedded renderer="logarithmicDepthBuffer: true;" gesture-detector id="scene">

    <a-assets>
      <a-asset-item id="{{ $sparepart->id }}" src="{{ url('/upload/objek/'.$sparepart->fileObjek) }}"></a-asset-item>
    </a-assets>

    <a-marker type='pattern' url='{{ asset('../pattern-ARSparepart.patt') }}' markerhandler smooth="true" smoothCount="5" smoothTolerance="0.01" smoothThreshold="2" raycaster="objects: .clickable" emitevents="true" cursor="fuse: false; rayOrigin: mouse;" id="markerA">
      <a-text value="Objek: {{ $sparepart->namaSP }}" color="yellow" rotation="-90 0 0" position="0 1.5 -1.2" align="center"></a-text>
      <a-entity>
        <a-entity  scale=".1 .1 .1" class="clickable" gesture-handler id="{{ $sparepart->id }}-model" obj-model="obj: #{{ $sparepart->id }};" rotation="0 0 0"></a-entity>
      </a-entity>
    </a-marker>

    <a-entity camera></a-entity>
  </a-scene>
  
  <div id="UI">Pindai Marker</div>
</body>

<script>
    let ui = document.querySelector("#UI");

    function markerInfo(marker, evt, infoui) {
      let message = "Marker";

        if (evt) {
            infoui.classList.remove("lost");
            infoui.classList.add("found");
            message = message + " Terdeteksi";
        } else {
            infoui.classList.remove("found");
            infoui.classList.add("lost");
            message = message + " Tak Terdeteksi";
        }

        infoui.innerHTML = message;
    }


    let m = document.querySelector("a-marker");

    m.addEventListener("markerFound", (e) => {
        markerInfo(m, true, ui);
    });

    m.addEventListener("markerLost", (e) => {
        markerInfo(m, false, ui);
    });
</script>
</html>