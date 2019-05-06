<iframe height='0' id='actions' name='actions' frameborder="0" width='100'></iframe>


	<br class="clear" />
	
    
</div><!--FIN WRAPPER-->




<script>

var imagetarget;

$(document).ready(function () {

	
	$('#wrapper').on('click','.gal', function(e) {
		console.log('click');
		imagetarget = $(this);
		$.colorbox({href:"<?php echo SITEURL;?>admin/includes/gallery.php", iframe: true, width: '100%', height: '100%', close: '<i class="fa fa-times"></i>'});
		e.preventDefault();
	});


	$('#wrapper').on('click','.deleteimage', function(e) {
		console.log('click');
		parent = $(this).closest('.columns');
		$('input',parent).val('');
		$('.preview',parent).remove();
		
		e.preventDefault();
	});



	$('#wrapper').on('click','.editimage', function(e) {
		var image = $( this ).parent().next().next().val();
		console.log(image);
		$.colorbox({href:"<?php echo SITEURL;?>admin/includes/editimage.php?image="+image, iframe: true, width: '100%', height: '100%', close: '<i class="fa fa-times"></i>'});
		e.preventDefault();
	});


	
	var uploader;

	$('#wrapper').on('click',' .file', function(e) {
		if (uploader) uploader.destroy();

		var target = $(this);
		var button = $(this).prev().get(0);
		uploader = new plupload.Uploader({
			runtimes : 'html5,html4',
			browse_button: button,
			max_file_size : '10mb',
			url : 'includes/upload.php',
	        multi_selection: false,
			filters : [
				{title : "Image files", extensions : "jpg,gif,png"}
			],
			resize : {width : 2500, height : 2000, quality : 90},
	                multipart_params : {
	                    "id" : "",
	                    "tipo" : ""
	                }
		});
		uploader.init();


		uploader.bind('UploadProgress', function(up, file) {
			$(target).val(file.percent+'%');
		});

		uploader.bind('FilesAdded', function(up, files) {
			uploader.start();
		});
		uploader.bind('FileUploaded', function(up, file,info) {
			$(target).val(info.response);
			if ($(target).next().hasClass('preview')) $(target).next().remove();
			$('<img src="../photos/200_200_'+info.response+'" class="preview" />').insertAfter(target)
		});

		setTimeout(function() {
			$(button).click();	
		},300);
		

		e.preventDefault();
	});


	$('#wrapper').on('click',' .file_allfiles', function(e) {
		if (uploader) uploader.destroy();

		var target = $(this);
		var button = $(this).prev().get(0);
		uploader = new plupload.Uploader({
			runtimes : 'html5,html4',
			browse_button: button,
			max_file_size : '10mb',
			url : 'includes/upload_file.php',
	        multi_selection: false,
			multipart_params : {
	                    "id" : "",
	                    "tipo" : ""
	                }
		});
		uploader.init();


		uploader.bind('UploadProgress', function(up, file) {
			$(target).val(file.percent+'%');
		});

		uploader.bind('FilesAdded', function(up, files) {
			uploader.start();
		});
		uploader.bind('FileUploaded', function(up, file,info) {
			$(target).val(info.response);
		});

		setTimeout(function() {
			$(button).click();	
		},300);
		

		e.preventDefault();
	});


	


	$(document).bind('cbox_open', function() {
	    $('body').css( 'overflow', 'hidden' );
	}).bind('cbox_closed', function() {
	    $('body').css( 'overflow', '' );
	});



	$('.file').each(function() {


		if ($(this).val() != '') {
			$('<img src="../photos/200_200_'+$(this).val()+'" class="preview" />').insertAfter(this);
		}

	});


});
</script>

    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>


</body>
</html>
