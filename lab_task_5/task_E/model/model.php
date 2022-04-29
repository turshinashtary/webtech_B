<?php 

require_once 'db_connect.php';


function showAllproducts(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `product_info` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showproduct($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `product_info` where ID = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function searchproduct($name){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `product_info` WHERE name LIKE '%$name%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function addproduct($data){
	$conn = db_conn();
    $selectQuery = "INSERT into product_info (Name, Type, Quantity, image)
VALUES (:name, :type, :quantity, :image)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':name' => $data['name'],
        	':type' => $data['type'],
        	':quantity' => $data['quantity'],
        	':image' => $data['image']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updateproduct($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE product_info set Name = ?, Type = ?, Quantity = ? where ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['name'], $data['type'], $data['quantity'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteproduct($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `product_info` WHERE `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}