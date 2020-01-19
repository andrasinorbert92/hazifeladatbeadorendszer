<?php
/*
házifeltöltés
tanár jegyet ad
házilista
theme lista
class_lista
*/

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
/*
    a user adatai triviálisak
    a parents az pedig tömböt vár rendezetten a szülők nevével, emailjével
*/
function registration($reg_date, $email, $firstname, $lastname, $passwd, $parents_names, $parents_emails, $classname){
    $db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';port='.DB_PORT, DB_USERNAME, DB_PASSWORD);
    $db->beginTransaction();

    $select_classID="SELECT class_id FROM classes WHERE classname like '{$classname}'";
    $q_select = $db->query($select_classID) or die("failed!");
    $q_select->setFetchMode(PDO::FETCH_BOTH);
    $row_class=$q_select->fetch();
    if($q_select->execute())
        if(DEBUGMODE) echo "registration-class: OK";
    else
        if(DEBUGMODE) echo "registration-class: WARNING :(";

    $select_roleID="SELECT role_id FROM roles WHERE role like user";
    $q_role = $db->query($select_roleID) or die("failed!");
    $q_role->setFetchMode(PDO::FETCH_BOTH);
    $row_role=$q_role->fetch();
    if($q_role->execute())
        if(DEBUGMODE) echo "registration-role: OK";
    else
        if(DEBUGMODE) echo "registration-role: WARNING :(";
    
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

    $sql_get_user_id="SELECT user_id FROM users WHERE email like '{$email}'";
    $q_userID = $db->query($sql_get_user_id) or die("failed!");
    $q_userID->setFetchMode(PDO::FETCH_BOTH);
    $row_userid=$q_userID->fetch();
    if($q_userID->execute())
        if(DEBUGMODE) echo "registration-userid: OK";
    else
        if(DEBUGMODE) echo "registration-userid: WARNING :(";
    
    $count_parents=count($parents_emails);
    for($i=0; $i<$count_parents; $i++){
        $sql_parents="INSERT INTO parents (
            email, name, user_id)
        VALUES(
            :email, :name, :user_id)";
        $q_parents=$db->prepare($sql_parents);
        $q_parents->bindparam(':email', $parents_emails[$i]);
        $q_parents->bindparam(':name', $parents_names[$i]);
        $q_parents->bindparam(':user_id', $row_userid['user_id']);
        if($q_parents->execute())
            if(DEBUGMODE) echo "registration-parents: OK";
        else
            if(DEBUGMODE) echo "registration-parents: WARNING :(";
    }
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