<?php
function get_custom_field_value( $szKey, $bPrint = true)
{
    global $post;
    $szValue = get_post_meta( $post->ID, $szKey, true );
    if ( $bPrint == false ) return $szValue; else echo $szValue;
}

function get_custom_field_value_by_id( $key, $id )
{
    $val = get_post_meta( $id, $key, true );
    return $val;
}

function getDia( $timestamp = 0 )
{
    $timestamp = $timestamp == 0 ? time() : $timestamp;
    $dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sábado');
    return $dias[date("w", $timestamp)];
}

function excerpt($limit) 
{
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    } 
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}

function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    } 
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content); 
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

function getFecha($stamp = null)
{ 
    if ($stamp === null) $stamp = time();
    $ano = date('Y',$stamp);
    $mes = date('n',$stamp);
    $dia = date('d',$stamp);
    $diasemana = date('w',$stamp);
 
    $diassemanaN = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");     
    $mesesN = array(1=>"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    return $diassemanaN[$diasemana].', '.$dia.' de '. $mesesN[$mes] .' de '.$ano;
}
 
function getMes( $timestamp = 0 )
{
    $timestamp = $timestamp == 0 ? time() : $timestamp;
    $meses = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
    return $meses[date("n", $timestamp)];
}