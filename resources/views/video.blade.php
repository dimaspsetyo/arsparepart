<!doctype HTML>
<html>

<head>
  <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
</head>
<script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
<!-- we import arjs version without NFT but with marker + location based support -->
<script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js"></script>
<script src="https://raw.githack.com/donmccurdy/aframe-extras/master/dist/aframe-extras.loaders.min.js"></script>
<script src="js/events.js"></script>
  <body style='margin : 0px; overflow: hidden;'>
  <a-scene device-orientation-permission-ui="enabled: false" vr-mode-ui="enabled: false" markerhandler embedded arjs='sourceType: webcam; debugUIEnabled: false;'>

    <a-assets>
      <a-asset-item id="1" src="{{ url('/upload/objek/MOTOR.obj')}}"></a-asset-item>
      <video id="vid" src="asset/buckBunny.webm" preload="auto" response-type="arraybuffer" autoplay loop crossorigin webkit-playsinline playsinline></video>
    </a-assets>

    <a-marker preset="hiro" markerhandler smooth="true" smoothCount="5" smoothTolerance="0.01" smoothThreshold="2">
      <a-video src="#vid" scale="1 1 1" position="0 0.4 0" rotation="-90 0 0"></a-video>
    </a-marker>

    <a-marker preset='kanji'>
      <a-entity scale=".1 .1 .1">
        <a-entity obj-model="obj: #1" rotation="-90 0 90"></a-entity>
      </a-entity>
      {{-- <a-box position='0 0.5 0' material='color: green;'></a-box> --}}
    </a-marker>
    
    <a-marker type='pattern' url='{{ asset('../pattern-ARSparepart.patt') }}' markerhandler smooth="true" smoothCount="5" smoothTolerance="0.01" smoothThreshold="2">
      <a-video src="#vid" scale="1 1 1" position="0 0.4 0" rotation="-90 0 0"></a-video>
      {{-- <a-box position='0 0.5 0' material='color: red;'></a-box> --}}
      
    </a-marker>

    <a-entity camera></a-entity>
  </a-scene>
  </body>

</html>