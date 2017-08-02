<?php
/*
Plugin Name: FM_Twitter 2.0
Plugin URI: http://www.nexxuz.com/?p=85
Description: Boton twitter (Sigueme) configurable y excelente diseño
Version: 1.0
Author: Jose Daniel Canchila
Author URI: http://nexxuz.com

*/

/*  Copyright 2009 Jose Daniel Canchila - nexxuz.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

 
*/

// Hook for adding admin menus
add_action('admin_menu', 'FM_Twitter_add_pages');

// action function for above hook
function FM_Twitter_add_pages() {
    add_options_page('FM_Twitter', 'FM_Twitter', 'administrator', 'FM_Twitter', 'FM_Twitter_options_page');
}

// FM_Twitter_options_page() displays the page content for the Test Options submenu
function FM_Twitter_options_page() {

    // variables for the field and option names 
    $opt_name = 'mt_op_header';
    $opt_name_2 = 'mt_op_nick';
    $opt_name_4 = 'mt_op_boton2';
    $opt_name_5 = 'mt_op_boton';
    $opt_name_6 = 'mt_op_plugin_support';
    $opt_name_7 = 'mt_op_javascript';
    $opt_name_8 = 'mt_op_message';
	$opt_name_9 = 'mt_op_message2';
	$opt_name_10 = 'mt_op_widget';

    $hidden_field_name = 'mt_op_submit_hidden';
    $data_field_name = 'mt_op_header';
    $data_field_name_2 = 'mt_op_nick';
    $data_field_name_4 = 'mt_op_boton2';
    $data_field_name_5 = 'mt_op_boton';
    $data_field_name_6 = 'mt_op_plugin_support';
    $data_field_name_7 = 'mt_op_javascript';
    $data_field_name_8 = 'mt_op_message';
	$data_field_name_9 = 'mt_op_message2';
	$data_field_name_10 = 'mt_op_widget';

    // Read in existing option value from database
    $opt_val = get_option( $opt_name );
    $opt_val_2 = get_option( $opt_name_2 );
    $opt_val_4 = get_option( $opt_name_4 );
    $opt_val_5 = get_option( $opt_name_5 );
    $opt_val_6 = get_option( $opt_name_6 );
    $opt_val_7 = get_option( $opt_name_7 );
    $opt_val_8 = get_option( $opt_name_8 );
	$opt_val_9 = get_option( $opt_name_9 );
	$opt_val_10 = get_option( $opt_name_10 );
    
$blog_url=get_bloginfo('url');

if (!$_POST['feedback']=='') {
$my_email1="jodacame@gmail.com";
$plugin_name="FM_Twitter";
$blog_url_feedback=get_bloginfo('url');
$user_email=$_POST['email'];
$subject=$_POST['subject'];
$feedback_feedback=$_POST['feedback'];
$headers1 = "From: jodacame@gmail.com";
$emailsubject1=$plugin_name." - ".$subject;
$emailmessage1="Blog: $blog_url_feedback\n\nUser E-Mail: $user_email\n\nMessage: $feedback_feedback";
mail($my_email1,$emailsubject1,$emailmessage1,$headers1);
?>
<div class="updated"><p><strong><?php _e('Correo Enviado!', 'mt_trans_domain' ); ?></strong></p></div>
<?php
}

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( $_POST[ $hidden_field_name ] == 'Y' ) {
        // CARGA LAS VARIABLES
        $opt_val = $_POST[ $data_field_name ]; //TITULO WIDGET
        $opt_val_2 = $_POST[ $data_field_name_2 ]; //NICK TWITTER
		$opt_val_4 = $_POST[ $data_field_name_4 ]; 
     	$opt_val_5 = $_POST[ $data_field_name_5 ]; 
        $opt_val_6 = $_POST[$data_field_name_6];
        $opt_val_7 = $_POST[$data_field_name_7];
 		$opt_val_9 = $_POST[$data_field_name_9];
		$opt_val_10 = $_POST[$data_field_name_10];
		
        // GUARDA LOS CAMBIOS
        update_option( $opt_name, $opt_val );
        update_option( $opt_name_2, $opt_val_2 );
        update_option( $opt_name_5, $opt_val_5 );
		update_option( $opt_name_4, $opt_val_4 );
        update_option( $opt_name_6, $opt_val_6 );  
        update_option( $opt_name_7, $opt_val_7 ); 
		update_option( $opt_name_9, $opt_val_9 );
		update_option( $opt_name_10, $opt_val_10 );

        // MUESTRA MENSAJE QUE LOS CAMBIOS SE REALIZARON

?>
<div class="updated"><p><strong><?php _e('Los cambios fueron realizados', 'mt_trans_domain' ); ?></strong></p></div>
<?php

    }

    // Muestra las opciones del plugin

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __( 'FM_Twitter Plugin Options', 'mt_trans_domain' ) . "</h2>";

    // Opciones del formulario
    
    $change4 = get_option("mt_op_plugin_support");
    $change5 = get_option("mt_op_javascript");
    $change6 = get_option("mt_op_message");
	$change7 = get_option("mt_op_message2"); // Caja de texto del widget


if ($change4=="Yes" || $change4=="") {
$change4="checked";
$change41="";
} else {
$change4="";
$change41="checked";
}

if ($change5=="Yes" || $change5=="") {
$change5="checked";
$change51="";
} else {
$change5="";
$change51="checked";
}

if ($change6=="Yes" || $change6=="") {
$change6="checked";
$change61="";
} else {
$change6="";
$change61="checked";
}
    ?>
	
	<script type="text/javascript">


function ismaxlength(obj){
var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
if (obj.getAttribute && obj.value.length>mlength)
obj.value=obj.value.substring(0,mlength)
}

</script>
<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
<table>
	<tr>
		<td colspan="2">
			<p><?php _e("Titulo Widget", 'mt_trans_domain' ); ?> 
			<input type="text" name="<?php echo $data_field_name; ?>" value="<?php echo $opt_val; ?>" size="25">
			</p><hr />
		</td>
	</tr>
	<tr>
		<td colspan="2" valign="top">
			<?php _e("Contenido Widget:", 'mt_trans_domain' ); ?> <br>
			<textarea  maxlength="200" onkeyup="return ismaxlength(this)" cols="100" name="<?php echo $data_field_name_9; ?>"><?php echo $change7; ?></textarea>
			<hr />
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<p><?php _e("Nick Twitter", 'mt_trans_domain' ); ?> 
			<input type="text" name="<?php echo $data_field_name_2; ?>" value="<?php echo $opt_val_2; ?>" size="50">
			</p><hr />
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<!-- Tipo de Boton -->
			<p><?php _e("Boton", 'mt_trans_domain' ); ?> 
						<select name="<?php echo $data_field_name_5; ?>">
			<option value="b1" selected>Boton 1</option>
			<option value="b2">Boton 2</option>
			<option value="b3">Boton 3</option>
			<option value="b4">Boton 4</option>
			<option value="b5">Boton 5</option>
			<option value="b6">Boton 6</option>
			</select>
			</p>
			<?php echo '<img src="'.$blog_url.'/wp-content/plugins/fm-twitter-20/img/b1.png" align="absmiddle">Boton 1 '; ?> |<?php echo '<img src="'.$blog_url.'/wp-content/plugins/fm-twitter-20/img/b2.png" align="absmiddle">Boton 2 '; ?> |<?php echo '<img src="'.$blog_url.'/wp-content/plugins/fm-twitter-20/img/b3.png" align="absmiddle">Boton 3 '; ?> |<?php echo '<img src="'.$blog_url.'/wp-content/plugins/fm-twitter-20/img/b4.png" align="absmiddle">Boton 4 '; ?> |<?php echo '<img src="'.$blog_url.'/wp-content/plugins/fm-twitter-20/img/b5.png" align="absmiddle">Boton 5 '; ?> |<?php echo '<img src="'.$blog_url.'/wp-content/plugins/fm-twitter-20/img/b6.png" align="absmiddle">Boton 6 '; ?> |


			<hr />
		</td></tr><tr>
		<td>
			<!-- Boton 2.0-->
			<p><?php _e("Boton Sigueme", 'mt_trans_domain' ); ?> 
			<select name="<?php echo $data_field_name_4; ?>">
			<option value="Yes" selected>Mostrar</option>
			<option value="No">Ocultar</option>
			</select>
			</p><hr />
		</td>
		<td>
				<p><?php _e("Widget", 'mt_trans_domain' ); ?> 
			<select name="<?php echo $data_field_name_10; ?>">
			<option value="Yes" selected>Mostrar</option>
			<option value="No">Ocultar</option>
			</select>
			</p><hr />
		</td>
	</tr>
	<tr>
		<td>
			<p><?php _e("Habilitar Ver/Ocultar", 'mt_trans_domain' ); ?> 
			<input type="radio" name="<?php echo $data_field_name_7; ?>" value="Yes" <?php echo $change5; ?>>Si
			<input type="radio" name="<?php echo $data_field_name_7; ?>" value="No" <?php echo $change51; ?>>No
			</p><hr />
		</td>
		<td>
			<p><?php _e("Mostrar Creditos", 'mt_trans_domain' ); ?> 
			<input type="radio" name="<?php echo $data_field_name_6; ?>" value="Yes" <?php echo $change4; ?>>Si
			<input type="radio" name="<?php echo $data_field_name_6; ?>" value="No" <?php echo $change41; ?> id="Si quieres que otros usuarios usen este plugin. Por favor no desactives esta opcion." onClick="alert(id)">No
			</p><hr />
		</td>
	</tr>
	<tr>
	<td>
	Tu aporte es muy valioso para el desarrollo de nuevos proyectos.
	<br>
	<b>Muchas Gracias por tu colaboración.</b><br><br>
	<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=10644953"><img src="https://www.paypalobjects.com/WEBSCR-600-20091209-1/es_ES/ES/i/btn/x-click-butcc-donate.gif"></a>
	
	</td>
	</tr>
	
	</table>
	<p class="submit">
	<input type="submit" name="Submit" value="<?php _e('Guardar Cambios', 'mt_trans_domain' ) ?>" />
</p><hr />

</form>
<h3>Contacto</h3>
<form name="form2" method="post" action="">
<table>
	<tr>
		<td><p><?php _e("E-Mail (Optional):", 'mt_trans_domain' ); ?>  </td><td><input type="text" name="email" /></p></td>
	</tr>
	<tr>
		<td> <p><?php _e("Asunto:", 'mt_trans_domain' ); ?></td><td><input type="text" name="subject" /></p></td>
	</tr>
	<tr>
		<td><p><?php _e("Comentario:", 'mt_trans_domain' ); ?> </td><td> <textarea name="feedback"></textarea> </p></td>
	</tr>
</table>


<p class="submit">
<input type="submit" name="submit" value="<?php _e('Enviar', 'mt_trans_domain' ) ?>" />
</p><hr />
</form>
</div>
<?php
}

// Inicia el widget
function show_FM_TwitterX($args) {

extract($args);

$option_header=get_option("mt_op_header");
$option_nick=get_option("mt_op_nick");
$option_boton=get_option("mt_op_boton");
$option_boton2=get_option("mt_op_boton2");
$option_message=get_option("mt_op_message");
$option_javascript=get_option("mt_op_javascript");
$plugin_support=get_option("mt_op_plugin_support");
$option_widget=get_option("mt_op_widget");
$message2=get_option("mt_op_message2");





if ($option_header=="") {
$option_header="Follow ME";
}

if ($option_nick=="") {
$option_nick="jodacame";
}

if ($option_boton=="") {
$option_boton="b1";
}

if ($option_target=="") {
$option_target="0";
}

if ($option_boton2=="") {
$option_boton2="Yes";
}

if ($plugin_support=="") {
$plugin_support="Yes";
}

if ($option_javascript=="") {
$option_javascript="No";
}
if ($option_widget=="") {
$option_widget="Yes";
}


$blog_url=get_bloginfo('url');

if ($option_javascript=="Yes") {
echo '<script type="text/javascript" src="'.$blog_url.'/wp-content/plugins/fm-twitter-20/javascript.js"></script>';
}
if ($option_boton2=="Yes"){
?>


<div id="twitter" style="position:fixed;width:128px;height=128px;left:-5px;top:45%;padding.0px;spacing:0px;opacity: 0.9;visibility:visible;z-index:99999;border:0px solid #000000">
<?php echo '<a href="http://twitter.com/'.$option_nick.'" target="_Blank"><img src="'.$blog_url.'/wp-content/plugins/fm-twitter-20/img/followme.png"></a> '; ?> <br />
</div>


<!-- ANIMACION DEL BOTON -->



<?
}


// Inicia el widget 2
// SI QUEREMOS MOSTRAR EL WIDGET

if ($option_widget=="Yes") {
	if ($option_javascript=="Yes") { 
		

		echo $before_title.'<a href="javascript:animatedcollapse.toggle('."'contenido'".')" ><img  src="'.$blog_url.'/wp-content/plugins/fm-twitter-20/img/show.png" caption="X" align="absmiddle"></a>&nbsp;'.$option_header.$after_title.$before_widget;

	
		}else{
echo $before_title.$option_header.$after_title.$before_widget;
}

if ($option_javascript=="Yes") {
?>
<script type="text/javascript">
animatedcollapse.ontoggle=function($, divobj, state){ //Animacion
}
animatedcollapse.init()
animatedcollapse.addDiv('contenido', 'fade=1')
</script>
<div id="contenido" align="center">
<?php
}
echo '<a href="http://twitter.com/'.$option_nick.'" target="_Blank"><img src="'.$blog_url.'/wp-content/plugins/fm-twitter-20/img/'.$option_boton.'.png"></a> '; ?> <br />
<?php
echo $message2 . "<br /><br />";
?>



<?php if ($option_javascript=="Yes") { echo "</div>"; } ?>



<?php
if ($plugin_support=="Yes" || $plugin_support=="") {
echo "<p style='font-size:x-small'><a href='http://nexxuz.com'>FM_Twitter 2.0</a>.</p>";
}

echo $after_widget;
// Finaliza widget
} //FIN MOSTRAR WIDGET
?>

<?php
}

function init_FMTwitterX_widget() {
register_sidebar_widget("FM_Twitter", "show_FM_TwitterX");
}

add_action("plugins_loaded", "init_FMTwitterX_widget");

?>
