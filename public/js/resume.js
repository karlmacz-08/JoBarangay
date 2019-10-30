$(function() {
  $('#degree').hide();
  $('#eduklvl').on('change', function(e){
    var type = $('#eduklvl').val();

    if (type != '0') {
      $('#eduklvl option[value="0"]').hide();
    }

    if (type == '3') {
      $('#degree').slideDown();
      $('#degree #deg').attr('required', true);
    }
    else{
      $('#degree').slideUp();
      $('#degree #deg').removeAttr('required');
    }
  });

  function hasGetUserMedia() {
    return !!(navigator.mediaDevices &&
     navigator.mediaDevices.getUserMedia);
  }

  if (hasGetUserMedia()) {
  	// Good to go!
  } else {
  	alert('getUserMedia() is not supported by your browser');
  	$('#upload').click();
  }

  const fileInput = document.querySelector('#upload-file input[type=file]');
  fileInput.onchange = () => {
  	if (fileInput.files.length > 0) {
  		const fileName = document.querySelector('#upload-file .file-name');
  		fileName.textContent = fileInput.files[0].name;
  	}
  }
});