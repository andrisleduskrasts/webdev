<?php
$menu_active = 'home';

include('header.php');
include("includes/conexion.php");

include("includes/funciones.php");
include("includes/mensajes.php");


$title = 'Home slider';

/***************** EDIT PARAMETERS ***************/

        $fields = array();



        $fields[] = array(
                        'name' => 'Title',
                        'field' => 'post_title',
                        'type' => 'text'
                        //'encrypted' => 1
                        );

        $fields[] = array(
                        'name' => 'Information',
                        'field' => 'post_content',
                        'type' => 'textareamce',
                        'height' => 300
                        //'encrypted' => 1
                        );


        $fields[] = array(
                        'name' => 'Image',
                        'field' => 'post_photo',
                        'type' => 'photo'
                        );

        $fields[] = array(
                        'name' => 'URL (Not editable, used for seo)',
                        'field' => 'post_url',
                        'type' => 'url',
                        'name_field' => 'post_title'
                        //'encrypted' => 1
                        );

        $fields[] = array(
                        'name' => 'Type',
                        'field' => 'post_type',
                        'type' => 'hidden',
                        'value' => 'slider'
                        //'encrypted' => 1
                        );

/***************** EDIT PARAMETERS ***************/


/***************** LIST PARAMETERS ***************/

        $list = array();
        $list = array();
        $list[] =  array(
                        'name' => 'Photo',
                        'field' => 'post_photo',
                        'type' => 'photo',
                        'width' => 200,
                        'folder' => '../photos',
                        );

        $list[] =  array(
                        'name' => 'Name',
                        'field' => 'post_title',
                        'type' => 'text',
                        'width' => 300
                        );




/***************** LIST PARAMETERS ***************/


/***************** GENERAL PARAMETERS ***************/

        $extras = array();
        $extras['table'] = 'post';
        $extras['id'] = 'post_id';
        $extras['table_state'] = 'post_state';
        $extras['table_fecha'] = 'post_date';
        $extras['per_page'] = 20;
        $extras['order'] = 'post_order DESC';
                $extras['table_order'] = 'post_order';
             //   $extras['page_parent'] = 'post_parent';

                $extras['lista_where'] = ' WHERE post_type = "slider" '; //
        $extras['post_type'] = '0' ;

        $extras['page'] = isset($_GET["p"]) ? (is_numeric($_GET["p"]) ? $_GET["p"] : 0) : 0;




        /*list filter*/
        //$extras['filtro'] = array();
        //$extras['filtro'][] = array('Area','sectores_idArea','db','pos_area','area_id','area_detalle','');



/***************** GENERAL PARAMETERS ***************/

$p_edit = $_SERVER['PHP_SELF'];


include('includes/actions-edit-list.php');

if (!isset($_GET["list"]))
    guardar($fields,$extras['table'],$extras['id'],$p_edit.'?list=1&msg=5',$p_edit.'?list=1&msg=6',$extras['table_fecha'],$extras['table_state']);


include('includes/edit-list.template.php');?>

<?php include('footer.php');?>
