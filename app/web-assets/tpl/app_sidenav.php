<div class="w3-sidebar w3-bar-block w3-animate-left bg-light" style="display:none;z-index:500000" id="mySidebar">
  <button class="w3-bar-item w3-button w3-black bg-light text-right text-dark" onclick="w3_close()">Close</button>
  <p class="display-4 ml-3">Hello, User!</p>
  <p class="lead ml-3">email@mail.io</p>
  <p class="w3-bar-item h5">Flight airline and number</p>
  <p class="w3-bar-item">Destination</p>
  <p class="w3-bar-item">Departure date and time:</p>


</div>
<div>
    <div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>
<button class="w3-button w3-xxlarge" onclick="w3_open()">&#9776;</button>
<div class="w3-container">
    <script>
    function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
      document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
      document.getElementById("myOverlay").style.display = "none";
    }
    </script>
    </div>
