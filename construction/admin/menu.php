<?php 
include("includes/conexion.php");
include('header.php');
include("includes/mensajes.php");

?>

            
<div class="content list row">

	<h2 class="title">Menu manager </h2>

	<div class="row">
		<div class="large-4 columns">
			<h3>Add item</h3>

			<?php 
			if ($_GET['posttype'] != '') {?>
			<form action="" class='panel' id='pageadd'>
				<?php
				$data = new Database();
				$where = 'post_type = "'.$_GET['posttype'].'" AND post_parent = 0';
				$count  =  $data->select(" * ", " post ", $where);
				?>
				<label for="">Page</label>
				<select name="page" id="">
					<option value="">Select</option>
					<?php
					while($r = $data->getObjectResults()){?>
					<option value="<?php echo $r->post_id;?>">
						<?php echo $r->post_title;?>
					</option>

					<?php
					$data2 = new Database();
					$where = 'post_type = "page" AND post_parent = '.$r->post_id;
					$count  =  $data2->select(" * ", " post ", $where);
					?>
					<?php
					while($r2 = $data2->getObjectResults()){?>
					<option value="<?php echo $r2->post_id;?>">
						--- <?php echo $r2->post_title;?>
					</option>
					<?php } ?>

					<?php } ?>
				</select>

				<?php
				if ($_GET['par'] ==1) {
				$data = new Database();
				$where = 'post_type = "menu" AND post_parent = 0';
				$count  =  $data->select(" * ", " post ", $where);
				?>
				<label for="">Parent</label>
				<select name="parent" id="">
					<option value="">Parent element</option>
					<?php
					$data = new Database();
					$where = 'menu_id = '.$_GET['menu'];
					$count  =  $data->select(" * ", " menus ", $where);
					$r = $data->getObjectResults();

					if ($r->menu_items != '') {
						$menu = json_decode($r->menu_items);
					} else {
						$menu = array();
					}
					if (count($menu) > 0)
					foreach ($menu as $k => $r) {
					?>
					<option value="<?php echo $k;?>">
						<?php echo $r->title;?>
					</option>
					<?php } ?>
				</select>
				<?php } ?>

				

				<input type="submit" value='Add' class="button">
			</form>
			<?php } ?>


			<form action="" class='panel' id='custom'>
			
				<label for="">Title</label>
				<input type="text" name='title'>

				<label for="">Custom URL</label>
				<input type="text" name='customurl'>

				<input type="checkbox" class="newwindow" value='1'>
				<label for="">New window</label>

				<hr>

				<?php
				if ($_GET['par'] ==1) {
				$data = new Database();
				$where = 'post_type = "menu" AND post_parent = 0';
				$count  =  $data->select(" * ", " post ", $where);
				?>
				<label for="">Parent</label>
				<select name="parent" id="">
					<option value="">Parent element</option>
					<?php
					$data = new Database();
					$where = 'menu_id = '.$_GET['menu'];
					$count  =  $data->select(" * ", " menus ", $where);
					$r = $data->getObjectResults();

					if ($r->menu_items != '') {
						$menu = json_decode($r->menu_items);
					} else {
						$menu = array();
					}

					foreach ($menu as $k => $r) {
					?>
					<option value="<?php echo $k;?>">
						<?php echo $r->title;?>
					</option>
					<?php } ?>
				</select>
				<?php } ?>

				

				<input type="submit" value='Add' class="button">
			</form>


		</div>


		<div class="large-8 columns">
			<a href="#" class="button tiny right" id="saveorder">Save menu</a>
			<h3>Menu</h3>
			<table class="listtable top">
				<tbody>
				<?php
				$data = new Database();
				$where = 'menu_id = '.$_GET['menu'];
				$count  =  $data->select(" * ", " menus ", $where);
				$r = $data->getObjectResults();

				if ($r->menu_items != '') {
					$menu = json_decode($r->menu_items);
				} else {
					$menu = array();
				}

				//print_r($menu);

				if (count($menu) > 0)
				foreach ($menu as $k => $r) {
				?>
				<tr >
					<td data-key='<?php echo $k;?>' class='menutop'>
						<a href="#" class="del button alert tiny">X</a>
						<h5>
							<input type="text" class="title" value='<?php echo $r->title;?>'>
							<input type="text" class="small" value='<?php echo $r->url;?>'>
							<input type="checkbox" class="newwindow" value='1' <?php if (isset($r->newwindow) AND $r->newwindow == 1) echo 'checked';?>>
							<label for="">New window</label>
						</h5>
						<div class="drag"><i class="fa fa-arrows-v"></i></div>

						<?php
						//print_r($r->childs);
						if (isset($r->childs) ) {?>
						<table class="childs listtable">
							<tbody>
							<?php
							
							foreach ($r->childs as $ck => $c) {
								?>
							<tr  class='child' data-key='<?php echo $ck;?>'>
								<td>
									<a href="#" class="del button alert tiny">X</a>
									<input type="text" class="childtitle" value='<?php echo $c->title;?>'>
									<input type="text" class="small" value='<?php echo $c->url;?>'>
									<input type="checkbox" class="newwindow" value='1' <?php if (isset($c->newwindow)) echo 'checked';?>>
									<label for="">New window</label>
									<div class="drag"><i class="fa fa-arrows-v"></i></div>


								</td>
							</tr>
							<?php } ?>
							</tbody>
						</table>
						<?php } ?>
						

					</td>
				</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	
</div>


 <script>
  $(function() {

  	function convertToSlug(Text)
	{
		console.log(Text);
	    return Text
	        .toLowerCase()
	        .replace(/[^\w ]+/g,'')
	        .replace(/ +/g,'-')
	        ;
	}

  	$('#saveorder').click(function(e) {
  		
  		var menuobj = {};
  		$('.menutop').each(function () {
  			var k = $(this).data('key');
  			var obj = {};
  			obj.title = $('h5 .title',this).val();
  			obj.url = $('h5 .small',this).val();
  			if ( $('.newwindow',this).is(':checked') ) obj.newwindow = 1;
  			
  			obj.childs = {};
  			$('.child',this).each(function () {
  				var kchild = $(this).data('key');
  				var objchild = {};
	  			objchild.title = $('.childtitle',this).val();
	  			objchild.url = $('.small',this).val();
	  			if ( $('.newwindow',this).is(':checked') ) objchild.newwindow = 1;

	  			obj.childs[convertToSlug(objchild.title)] = objchild;
  			});

  			menuobj[k] = obj;
  		});
  		console.log(menuobj);

  		$.post("includes/actions.php", 
			    { 
			      action: "savemenu",
			      menudata: JSON.stringify(menuobj) ,
			      menu: <?php echo $_GET['menu'];?>
			    },
			    function(data){
			        console.log(data); 
			        alert('Menu saved');
			    }
			);


	  	e.preventDefault();
	});

  	$('.listtable .del').click(function(e) {
  		$(this).parent().parent().remove();
	  e.preventDefault();
	});

    $( ".listtable.top tbody" ).sortable();
    $( ".listtable.childs tbody" ).sortable();

    $('#custom').submit(function(e) {

    	newwindow = 0;
    	if ( $('#custom .newwindow').is(':checked') ) newwindow = 1;

    		$.post("includes/actions.php", 
			    { 
			      action: "addmenu-custom",
			      title: $('#custom input[name="title"]').val(),
			      customurl: $('#custom input[name="customurl"]').val(),
			      parent: $('#custom [name="parent"]').val(),
			      newwindow: newwindow,
			      menu: <?php echo $_GET['menu'];?>
			    },
			    function(data){
			        console.log(data); 
			        window.location.reload();
			    }
			);
			e.preventDefault();

    });


    $('#pageadd').submit(function(e) {
    		$.post("includes/actions.php", 
			    { 
			      action: "addmenu-page",
			      page: $('#pageadd [name="page"]').val(),
			      parent: $('#pageadd [name="parent"]').val(),
			      menu: <?php echo $_GET['menu'];?>
			    },
			    function(data){
			        console.log(data); 
			        window.location.reload();
			    }
			);
			e.preventDefault();
			
    });
    

  });
  </script>

   <?php include('footer.php');?>

	