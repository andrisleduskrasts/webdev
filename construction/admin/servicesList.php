<?php 
$menu_active = 'services'; // ide del grupo de menu

include('header.php');
include("includes/conexion.php");

include("includes/funciones.php");
include("includes/mensajes.php");

$title = 'List of Services';

/***************** PARAMETROS PARA FORM DE EDICION ***************/

		$fields = array();
		
                
		/*INPUT DE TEXTO*/
        $fields[] = array(
                        'name' => 'Service Name',
                        'field' => 'post_title',
                        'type' => 'text'
                        //'encrypted' => 1
                        );
$data = new Database();
$count  =  $data->select(" * ", " categories ");
while($r = $data->getObjectResults()){
$catSum [$r->cat_url] = $r->cat_name;
if( strlen($catSum[$r->cat_url])>25){
$catSum[$r->cat_url] = substr($catSum[$r->cat_url], 0, 20) . "...";
};
};
        $fields[] = array(
                        'name' => 'Category',
                        'field' => 'post_extra1',
                        'type' => 'checkboxes',
                        'values' => $catSum
                        //'encrypted' => 1
                        );

        $fields[] = array(
                        'name' => 'Type',
                        'field' => 'post_type',
                        'type' => 'hidden',
                        'value' => 'listService',
                        //'encrypted' => 1
                        );

		
/***************** PARAMETROS PARA FORM DE EDICION ***************/


/***************** PARAMETROS PARA LISTA ***************/

		$list = array();
                
		$list[] =  array(
                        'name' => 'Name',
                        'field' => 'post_title',
                        'type' => 'text',
                        'width' => 300
                        );

/*
        $list[] =  array(
                        'name' => 'Comments',
                        'field' => 'post_comment',
                        'type' => 'comments',
                        'width' => 300
                        );
		
		*/
/***************** PARAMETROS PARA LISTA ***************/
	
	
/***************** PARAMETROS GENERALES ***************/	
	
		$extras = array();
		$extras['table'] = 'post';
		$extras['id'] = 'post_id';
		$extras['table_state'] = 'post_state';
		/*$extras['table_fecha'] = 'post_date';*/
		$extras['per_page'] = 20;
		$extras['order'] = 'post_date DESC';
                
        $extras['lista_where'] = ' WHERE post_type = "listService"'; //custom where para listados
		
		$extras['page'] = isset($_GET["p"]) ? (is_numeric($_GET["p"]) ? $_GET["p"] : 0) : 0;
		
		
		/*filtro para lista*/
		//$extras['filtro'] = array();
		//$extras['filtro'][] = array('Area','sectores_idArea','db','pos_area','area_id','area_detalle','');
		//label, campo, tipo, tabla de parametro, valor de parametro, label de parametro, WHERE para filtrar parametros
		
		
/***************** PARAMETROS GENERALES ***************/			
		
$p_edit = $_SERVER['PHP_SELF'];

	
include('includes/actions-edit-list.php');	

if (!isset($_GET["list"])) 	
	guardar($fields,$extras['table'],$extras['id'],$p_edit.'?list=1&msg=5',$p_edit.'?list=1&msg=6',$extras['table_fecha'],$extras['table_state']);
	//campos, tabla, id tabla, header new, header update, fecha tabla, moderado, tabla

include('includes/edit-list.template.php');?>

<?php include('footer.php');?>
