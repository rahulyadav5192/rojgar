	var vid = document.getElementById("bgvid");
	var pauseButton = document.querySelector("#polina button");

	function vidFade() {
	    if (vid) vid.classList.add("stopfade");
	}

	if (vid) {
	    vid.addEventListener('ended', function() {
	        // only functional if "loop" is removed 
	        vid.pause();
	        // to capture IE10
	        vidFade();
	    });
	}
	
	if (pauseButton) {
	    pauseButton.addEventListener("click", function() {
	        vid.classList.toggle("stopfade");
	        if (vid.paused) {
	            vid.play();
	            pauseButton.innerHTML = "<i class='lni-pause'></i>";
	        } else {
	            vid.pause();
	            pauseButton.innerHTML = "<i class='lni-play'></i>";
	        }
	    });
	}