$('#call-to-action,.click-upload').click(function() {
    $('#call-to-action').addClass('upload--loading');
    $('.upload-hidden').click();
    
  });
  $('.upload-hidden').change(function() {
    $('#call-to-action').removeClass('upload--loading');
    
  });
  
  
  
  $(function() {
  
    var ul = $('#upload ul');
  
    $('#drop a').click(function() {
      // Simulate a click on the file input button
      // to show the file browser dialog
      $(this).parent().find('input').click();
    });
  
   
  
    // Prevent the default action when a file is dropped on the window
    $(document).on('drop dragover', function(e) {
      e.preventDefault();
    });
  
    
  
  });