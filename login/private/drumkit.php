<?php
require '../../config/db.php';
require '../../config/profile.php'; 
require '../../partials/headerPrivate.php';
include '../formUserPrivate.php';
?>
<div class="profil_page">
    <h1 class="hello_user">Bonjour <?= $_SESSION['user']['name'] ?></h1>
    <h2 class="title_user">Play your music</h2>
    <!-- Drumkit -->
    <div class="drumkit">    
        <!-- Buttons -->
        <div class="button key-65" data-sound="Bell1"> <!-- attribut pour les développeurs, lien entre html et js -->
            <div class="title">Bell1</div>
            <audio class="sound Bell1" src="../../assets/sounds/drumkit-sounds/Bell1.wav"></audio>
        </div>
        <div class="button key-66" data-sound="rock"> <!-- attribut pour les développeurs, lien entre html et js -->
            <div class="title">Rock</div>
            <audio class="sound rock" src="../../assets/sounds/drum-sounds/rock.wav"></audio>
        </div>
        <div class="button key-93" data-sound="jungle">
            <div class="title">jungle</div>
            <audio class="sound jungle" src="../../assets/sounds/drum-sounds/jungle.wav"></audio>
        </div> 
        <div class="button key-94" data-sound="sweep">
            <div class="title">sweep</div>
            <audio class="sound sweep" src="../../assets/sounds/drum-sounds/sweep.wav"></audio>
        </div>
        <div class="button key-95" data-sound="metal">
            <div class="title">metal</div>
            <audio class="sound metal" src="../../assets/sounds/drum-sounds/metal.wav"></audio>
        </div>
        <div class="button key-96" data-sound="bd_1">
            <div class="title">bd_1</div>
            <audio class="sound bd_1" src="../../assets/sounds/drums/bd_1.wav"></audio>
        </div>
        <div class="button key-97" data-sound="bd_2">
            <div class="title">bd_2</div>
            <audio class="sound bd_2" src="../../assets/sounds/drums/bd_2.wav"></audio>
        </div> 
        <div class="button key-98" data-sound="bd_3">
            <div class="title">bd_3</div>
            <audio class="sound bd_3" src="../../assets/sounds/drums/bd_3.wav"></audio>
        </div>
        <div class="button key-99" data-sound="bd_4">
            <div class="title">bd_4</div>
            <audio class="sound bd_4" src="../../assets/sounds/drums/bd_4.wav"></audio>
        </div>
        <div class="button key-80" data-sound="bd_5">
            <div class="title">bd_5</div>
            <audio class="sound bd_5" src="../../assets/sounds/drums/bd_5.wav"></audio>
        </div>
        <div class="button key-81" data-sound="clap_1">
            <div class="title">clap_1</div>
            <audio class="sound clap_1" src="../../assets/sounds/drums/clap_1.wav"></audio>
        </div> 
        <div class="button key-82" data-sound="clap_2">
            <div class="title">clap_2</div>
            <audio class="sound clap_2" src="../../assets/sounds/drums/clap_2.wav"></audio>
        </div>
        <div class="button key-83" data-sound="clap_3">
            <div class="title">clap_3</div>
            <audio class="sound clap_3" src="../../assets/sounds/drums/clap_3.wav"></audio>
        </div>
        <div class="button key-84" data-sound="kick">
            <div class="title">kick</div>
            <audio class="sound kick" src="../../assets/sounds/drumkit-sounds/kick.mp3"></audio>
        </div> 
        <div class="button key-85" data-sound="hi-hat">
            <div class="title">hi-hat</div>
            <audio class="sound hi-hat" src="../../assets/sounds/drumkit-sounds/hi-hat.mp3"></audio>
        </div>
        <div class="button key-86" data-sound="open-hat">
            <div class="title">open-hat</div>
            <audio class="sound open-hat" src="../../assets/sounds/drumkit-sounds/open-hat.mp3"></audio>
        </div> 
        <div class="button key-87" data-sound="snare">
            <div class="title">snare</div>
            <audio class="sound snare" src="../../assets/sounds/drumkit-sounds/snare.mp3"></audio>
        </div>
    </div>
    <div class="start_article">
        <h2 class="start_title">You wanna play ?<h2>
        <p class="start_rules">Rules are so simple !</br></br></br>Just listen to the music. Then you just have to replay the same music on the following drumkit.</br></br>But you must be careful ! Time are counted. You have only one minute to success, otherwise the game will give you an other song until you success. Good luck
        <button class="p_start">Start</button>
        <a href=""><button class="p_quit">Home</button></a>
    </div>
    <div class="stop_article"></div>
</div>
<div class="recordings_article">
    <button class="start_record" onclick="startRecording(this);">Start</button>
    <button class="finish_record" onclick="stopRecording(this);" disabled>stop</button>
    <h2>Recordings</h2>
    <ul id="recordingslist"></ul>
</div>    

  <script>
  function __log(e, data) {
    log.innerHTML += "\n" + e + " " + (data || '');
  }
  var audio_context;
  var recorder;
  function startUserMedia(stream) {
    var input = audio_context.createMediaStreamSource(stream);
    // Uncomment if you want the audio to feedback directly
    //input.connect(audio_context.destination);
    //__log('Input connected to audio context destination.');
    
    recorder = new Recorder(input);
  }
  function startRecording(button) {
    recorder && recorder.record();
    button.disabled = true;
    button.nextElementSibling.disabled = false;
  }
  function stopRecording(button) {
    recorder && recorder.stop();
    button.disabled = true;
    button.previousElementSibling.disabled = false;
    
    // create WAV download link using audio data blob
    createDownloadLink();
    
    recorder.clear();
  }
  function createDownloadLink() {
    recorder && recorder.exportWAV(function(blob) {
      var url = URL.createObjectURL(blob);
      var li = document.createElement('li');
      var au = document.createElement('audio');
      var hf = document.createElement('a');
      
      au.controls = true;
      au.src = url;
      hf.href = url;
      hf.download = new Date().toISOString() + '.wav';
      hf.innerHTML = hf.download;
      li.appendChild(au);
      li.appendChild(hf);
      recordingslist.appendChild(li);
    });
  }
  window.onload = function init() {
    try {
      // webkit shim
      window.AudioContext = window.AudioContext || window.webkitAudioContext;
      navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia;
      window.URL = window.URL || window.webkitURL;
      
      audio_context = new AudioContext;
      __log('Audio context set up.');
      __log('navigator.getUserMedia ' + (navigator.getUserMedia ? 'available.' : 'not present!'));
    } catch (e) {
      alert('No web audio support in this browser!');
    }
    
    navigator.getUserMedia({audio: true}, startUserMedia, function(e) {
      __log('No live audio input: ' + e);
    });
  };
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/recorderjs/0.1.0/recorder.js"></script>
<?php
require '../../partials/footerPrivate.php';