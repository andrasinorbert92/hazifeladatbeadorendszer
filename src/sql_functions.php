<?php

/*
function upload_homework(){
	$db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';port='.DB_PORT, DB_USERNAME, DB_PASSWORD);
    $db->beginTransaction();
	
}*/
function get_table_filtered_ordered($columns,$table, $where, $orderby){
	$db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';port='.DB_PORT, DB_USERNAME, DB_PASSWORD);
    $db->beginTransaction();
	
	$select="SELECT '{$columns}' FROM '{$table}' WHERE '{$where}' ORDER BY '{$orderby}'";
    $q_select = $db->query($select) or die("failed!");
    $q_select->setFetchMode(PDO::FETCH_BOTH);
    return $q_select->fetch();
}
function get_table_filtered($columns,$table, $where){
	$db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';port='.DB_PORT, DB_USERNAME, DB_PASSWORD);
    $db->beginTransaction();
	
	$select="SELECT '{$columns}' FROM '{$table}' WHERE '{$where}'";
    $q_select = $db->query($select) or die("failed!");
    $q_select->setFetchMode(PDO::FETCH_BOTH);
    return $q_select->fetch();
}
function get_table($columns,$table){
	$db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';port='.DB_PORT, DB_USERNAME, DB_PASSWORD);
    $db->beginTransaction();
	
	$select="SELECT '{$columns}' FROM '{$table}'";
    $q_select = $db->query($select) or die("failed!");
    $q_select->setFetchMode(PDO::FETCH_BOTH);
    return $q_select->fetch();
}
/*
$columns: "id,theme..." alakú, a megjelenítendő oszlopok nevét várja
*/
function theme_list($columns){
	$db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';port='.DB_PORT, DB_USERNAME, DB_PASSWORD);
    $db->beginTransaction();
	
	$select="SELECT '{$columns}' FROM homework_theme";
    $q_select = $db->query($select) or die("failed!");
    $q_select->setFetchMode(PDO::FETCH_BOTH);
    return $q_select->fetch();
}
function class_list_id_name(){
	$db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';port='.DB_PORT, DB_USERNAME, DB_PASSWORD);
    $db->beginTransaction();
	
	$select_classID="SELECT * FROM classes";
    $q_select = $db->query($select_classID) or die("failed!");
    $q_select->setFetchMode(PDO::FETCH_BOTH);
    return $q_select->fetch();
}

/*
    1: OK
    2: rossz felhasználónév
    3: nincs ilyen user
*/
function valid_username($email, $passwd){
    $db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';port='.DB_PORT, DB_USERNAME, DB_PASSWORD);
    $db->beginTransaction();

    $sql="SELECT email, passwd FROM users WHERE email like '{$email}'";
    $q   = $db->query($sql) or die("failed!");
    $q->setFetchMode(PDO::FETCH_BOTH);
    $row=$q->fetch();

    if(count($row)==1){
        if( $row['passwd'] == md5($passwd) ){
            return 1;
        }
        else{
            return 3;
        }
    }else{
        return 2;
    }
}

function get_userID_By_email($email){
	$db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';port='.DB_PORT, DB_USERNAME, DB_PASSWORD);
    $db->beginTransaction();
	
	$sql_get_user_id="SELECT user_id FROM users WHERE email like '{$email}'";
    $q_userID = $db->query($sql_get_user_id) or die("failed!");
    $q_userID->setFetchMode(PDO::FETCH_BOTH);
    return $q_userID->fetch();
}
/*
	a user role-hoz tartozó id-t adja vissza
*/
function role_user(){
	
	
	$select_roleID="SELECT role_id FROM roles WHERE role like user";
    $q_role = $db->query($select_roleID) or die("failed!");
    $q_role->setFetchMode(PDO::FETCH_BOTH);
    return $q_role->fetch();
}
	
/*
	class_name alapján visszaadja a class_id-t
*/
function classes_filter($classname){
	$db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';port='.DB_PORT, DB_USERNAME, DB_PASSWORD);
    $db->beginTransaction();
	
	$select_classID="SELECT class_id FROM classes WHERE classname like '{$classname}'";
    $q_select = $db->query($select_classID) or die("failed!");
    $q_select->setFetchMode(PDO::FETCH_BOTH);
    return $q_select->fetch();
}
/*
    a user adatai triviálisak
    a parents az pedig tömböt vár rendezetten a szülők nevével, emailjével

    csekkolni hogy hogy az email létezik e
*/
function registration($reg_date, $email, $firstname, $lastname, $passwd, $parents_names, $parents_emails, $classname){
    $db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';port='.DB_PORT, DB_USERNAME, DB_PASSWORD);
    $db->beginTransaction();
	
	//létezik-e az email:
	$email_check_sql="SELECT COUNT(*) FROM users WHERE email like '{$email}'";
	if($q_check=$db->query($email_check_sql)){
		if($q_check->fetchColumn()==0){

			$row_class=classes_filter($classname);
			$row_role=role_user();
			
			$sql_users= "INSERT INTO users (
				reg_date, email, firstname, lastname, passwd, role_id, class_id)
			VALUES(
				:reg_date, :email, :firstname, :lastname, :passwd, :role_id, :class_id)";
			$q=$db->prepare($sql_users);
			$q->bindparam(':reg_date', $reg_date);
			$q->bindparam(':email', $email);
			$q->bindparam(':firstname', $firstname);
			$q->bindparam(':lastname', $lastname);
			$q->bindparam(':passwd', md5($passwd))
			$q->bindparam(':role_id', $row_role['role_id']);
			$q->bindparam(':class_id', $row_class['class_id']);

			if($q->execute())
				if(DEBUGMODE) echo "registration-userInsert: OK";
			else
				if(DEBUGMODE) echo "registration-userInsert: WARNING :(";

			$row_userid=get_userID_By_email($email);
    
    $count_parents=count($parents_emails);
    for($i=0; $i<$count_parents; $i++){
        insert_parent($parents_emails[$i], $parents_names[$i], $row_userid['user_id']);
    }
}

function insert_parent($email, $name, $user_id){
	$db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';port='.DB_PORT, DB_USERNAME, DB_PASSWORD);
    $db->beginTransaction();
	
	$sql_parents="INSERT INTO parents (
            email, name, user_id)
        VALUES(
            :email, :name, :user_id)";
	$q_parents=$db->prepare($sql_parents);
	$q_parents->bindparam(':email', $email);
	$q_parents->bindparam(':name', $name);
	$q_parents->bindparam(':user_id', $user_id);
	if($q_parents->execute())
		if(DEBUGMODE) echo "registration-parents: OK";
	else
		if(DEBUGMODE) echo "registration-parents: WARNING :(";
}

function dd($var){ //dumpdie
    dump($var);
    die("END");
    echo "ez nem jelenik meg";
}

function dump($var){
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

function page($page='home'){
    return DOMAIN."?p=".$page;
}