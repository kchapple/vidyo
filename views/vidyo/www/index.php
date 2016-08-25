<!DOCTYPE html>
<html lang="en">
<title>VidyoWeb</title>
<meta charset="utf-8">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/start/jquery-ui.css">
<link rel="stylesheet" href="<?php echo $this->baseUrl(); ?>/views/vidyo/www/css/main.css">
<link rel="chrome-webstore-item" href="https://chrome.google.com/webstore/detail/mmedphfiemffkinodeemalghecnicmnh">
<script src="<?php echo $this->baseUrl(); ?>/views/vidyo/www/lib/jquery-1.12.2.min.js"></script>
<script src="<?php echo $this->baseUrl(); ?>/views/vidyo/www/lib/jquery-ui.min.js"></script>
<script src="<?php echo $this->baseUrl(); ?>/views/vidyo/www/scripts/utils/soap-proxy.js"></script>
<script src="<?php echo $this->baseUrl(); ?>/views/vidyo/www/scripts/main.js"></script>
<body onload="bodyLoaded()">
<body onbeforeunload="return beforeUnload()">
<div class="container" id="whole">
<div class="videoWrapperFull" id="VidyoSplash" align="center" >
   <img src="<?php echo $this->baseUrl(); ?>/views/vidyo/www/images/logo-big.jpg"
      style="padding-top: 75px;">
    <div id="js-progressbar-container">
       <div id="progressbar"></div>
    </div>
</div>
<div class="videoWrapperNone" id="ExtensionInstall" align="left" style="display: none;">
    <div class="step">
        <div class="row">You need <span class="main-text">Vidyoweb</span> extension to continue.</div>
        <div class="row">
            <!-- ngIf: isUsingChrome -->
            <button type="button" onclick="installExtension()">Install</button>
            <!-- end ngIf: isUsingChrome -->
        </div>
        <div class="row">Click above to install the extension.</div>
    </div>
</div>
<div id="usage" align="left" style="display: none;">
   <p>
      Please be sure your site is secured (https) and use the
      following url argument options to connect to conference:    
   </p>
   <p>
      <b>For Guest Access:</b><br>
      https://<span id ="maingURL"></span>/?portalUri=&lt;fullGuestLink&gt;<br>
      &nbsp;Optional parameters:<br>
      &nbsp;&nbsp;&amp;guestName=FirstName+LastName (+ symbol will be replaced by space in the code)<br>
      &nbsp;&nbsp;&amp;roomPin=&lt;pincode&gt;<br>
      &nbsp;&nbsp;&amp;encoded=1 (if roomlink is HTML encoded, this will properly decode it)<br>
   </p>
   <p>
      <b>For User Access (join own room):</b><br>
      https://<span id ="mainuURL"></span>/?portalAddress=&lt;http(s)://full portal Address&gt;&amp;username=&lt;username&gt;&amp;password=&lt;password&gt;<br>
   </p>

    <div id="parameters" style="display: none;">
        <span id="baseUrl"><?php echo $this->baseUrl(); ?>/views/vidyo/www</span>
        <span id="soapProxy"><?php echo $this->vidyo->soapProxy; ?></span>
        <span id="portalAddress"><?php echo $this->vidyo->portalAddress; ?></span>
        <span id="username"><?php echo $this->vidyo->username; ?></span>
        <span id="password"><?php echo $this->vidyo->password; ?></span>
        <span id="portalUri"><?php echo $this->vidyo->portalUri; ?></span>
        <span id="guestName"><?php echo $this->vidyo->guestName; ?></span>
        <span id="roomPin"><?php echo $this->vidyo->roomPin; ?></span>
        <span id="encoded"><?php echo $this->vidyo->encoded; ?></span>
        <span id="useSignIn"><?php echo $this->vidyo->useSignIn; ?></span>
    </div>

</div>
<div class="videoWrapperNone" id="VidyoInstall" align="left" style="display: none;">
        <h5>Please follow the following instructions to install the VidyoWeb Plugin.</h5>
            <ol>
                <li>Read <a href='files/EULA.html'>End User License Agreement</a>. By downloading plugin you acknowledge that you read the EULA and that you agree to it.</li>
                <li>Download VidyoWeb plugin for
                   <a class='btn btn-small'
                       href='<?php echo $this->baseUrl(); ?>/views/vidyo/www/installers/VidyoWeb-win32-1.3.6.0005.msi'>Windows</a>
                   or
                   <a class='btn btn-small'
                       href='<?php echo $this->baseUrl(); ?>/views/vidyo/www/installers/VidyoWeb-macosx-x64-1.3.6.0005.pkg'>Mac</a>
                </li>
                <li>Install it by running the installer.</li>
                <li>Your VidyoWeb experience will start automatically when plugin is installed.</li>
            </ol>
        <p>
            <small>&copy; 2013-2016 <a href='http://www.vidyo.com'>Vidyo</a>. All rights reserved.</small>
        </p>
</div>

<div class="videoWrapperNone" id="VidyoChromeInstall" align="left" style="display: none;">
    <h5>Please follow the following instructions to install the VidyoWeb Plugin for Chrome.</h5>
    <ol>
        <li>Read <a href='files/EULA.html'>End User License Agreement</a>. By downloading plugin you acknowledge that you read the EULA and that you agree to it.</li>
        <li>Download VidyoWeb plugin for
           <a class='btn btn-small' href='<?php echo $this->baseUrl(); ?>/views/vidyo/www/installers/VidyoClientForWeb-win32-1.3.6.0005.msi'>Windows</a>
           or
           <a class='btn btn-small' href='<?php echo $this->baseUrl(); ?>/views/vidyo/www/installers/VidyoClientForWeb-macosx-x86-1.3.6.0005.pkg'>Mac</a>.</li>
        <li>Install it by running the installer.</li>
        <li>Your VidyoWeb experience will start automatically when plugin is installed.</li>
    </ol>
    <p>
        <small>&copy; 2013-2016 <a href='http://www.vidyo.com'>Vidyo</a>. All rights reserved.</small>
    </p>
</div>

<div class="videoWrapperSmall" id="VidyoArea" align="center">
   <div class="videoWrapperSmall" id="pluginHolder" align="center"></div>
</div>

</div>
<div class="buttons" id="Buttons" align="center" style="display: none;">
    <select id="img_share_b"
        onmouseenter="updateShareList()"
        onchange="shareChanged(this.value); this.selectedindex = -1"
         title="Share">
    </select>
    <button id="img_camera_b"    onclick="toggleCameraIcon()">
       <img id="img_camera" height="15px" src="<?php echo $this->baseUrl(); ?>/views/vidyo/www/images/camera.png">
    </button>
    <button id="img_mic_b"        onclick="toggleMicIcon()">
       <img id="img_mic" height="15px" src="<?php echo $this->baseUrl(); ?>/views/vidyo/www/images/mic.png">
    </button>
    <button id="img_speaker_b"    onclick="toggleSpeakerIcon()">
       <img id="img_speaker" height="15px" src="<?php echo $this->baseUrl(); ?>/views/vidyo/www/images/speaker.png">
    </button>
    <button id="img_disconnect_b" onclick="sendLeaveEvent()">
       <img id="img_disconnect" height="15px" src="<?php echo $this->baseUrl(); ?>/views/vidyo/www/images/disconnect.png">
    </button>
</div>
</body>

</html>
