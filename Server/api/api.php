<?php
    require_once('src/AutoLoad.php');
    
    $bootstrap = new Bootstrap();
    $manager = $bootstrap->getEntityManager();
    $method = $_SERVER['REQUEST_METHOD'];
    $json = file_get_contents('php://input');
    $request = explode('/', $_SERVER[REQUEST_URI]);
    
    $class = ucfirst ($request[2]);
    if($request[count($request) - 1] == 'debug'){
        $debug = 1;
        $arguments = array_filter(array_splice($request, 3, count($request) - 4));
    }else{
        $debug = 0;
        $arguments = array_filter(array_splice($request, 3, count($request) - 3));
    }
    if($debug){
        echo "arguments: "; 
        print_r($arguments);
        echo "<br>";
    }
    
    $dbManager = new DBManager($manager, $class, $arguments, $json, $debug);
    if($method === "GET"){
        $dbmsg .= "Method: select<br>";
        echo $dbManager->selectObj();
    }else if($method === "POST"){
        $dbmsg .= "Method: insert<br>";
        echo $dbManager->insertObj();
    }else if($method === "PUT"){
        $dbmsg .= "Method: update<br>";
        echo $dbManager->updateObj();
    }else if($method === "DELETE"){
        $dbmsg .= "Method: delete<br>";
        echo $dbManager->deleteObj();
    }
    if($debug){
        echo "<br>$dbmsg<br>";
        echo $dbManager->getDebugMessage();
    }
?>