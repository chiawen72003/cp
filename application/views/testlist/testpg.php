<?php
if( isset($model_data['switchModelData']) and count($model_data['switchModelData']) > 0){
	foreach( $model_data['switchModelData'] as $htmlDsc){
		echo $htmlDsc;
	}
}
?>