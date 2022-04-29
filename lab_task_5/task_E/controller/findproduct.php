<?php

require_once '../model/model.php';

if (isset($_POST['findproduct'])) {
	
		echo $_POST['name'];

    try {
    	
    	$allSearchedproducts = searchproduct($_POST['name']);
    	require_once '../showSearchedproduct.php';

    } catch (Exception $ex) {
    	echo $ex->getMessage();
    }
}

