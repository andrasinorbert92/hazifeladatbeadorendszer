<?php
/*
    Aszociatív tömbbel tér vissza
    ha a visszatérési érték false, akkor nincs eredmény halmaz
*/
function select($table, $columns="*", $where=NULL, $orderby=NULL){
    $options = [
        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
      ];
    $pdo = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';port='.DB_PORT, DB_USERNAME, DB_PASSWORD, $options);
    //$pdo->beginTransaction();
    
    $type=0;
    if(is_null($orderby)){
        if(is_null($where)){
            $query="SELECT ? FROM ?";
            $type=1;
        }else{
            $query="SELECT ? FROM ? WHERE ?";
            $type=2;
        }
    }else{
        $query="SELECT ? FROM ? WHERE ? ORDER BY ?";
        $type=3;
    }
    $stmt=$pdo->prepare($query);
    switch($type){
        case 1:
            $stmt->execute([$columns, $table]);
            break;
        case 2:
            $stmt->execute([$columns, $table, $where]);
            break;
        case 3:
            $stmt->execute([$columns, $table, $where, $orderby]);
            break;
    }
    return $stmt->fetch(PDO::FETCH_LAZY); //ha false, akkor nincs sor
}
/*
$columns: "id,theme..." alakú, a megjelenítendő oszlopok nevét várja
*/
function theme_list($columns){
    return select("homework_theme", $columns);
}
function class_list_id_name(){
    return select("classes");
}
/*
    0: OK, diák
    1: OK, tanár
    2: nincs ilyen felhasznév
    3: diák, rossz jelszó
    4: tanár, rossz jelszó
*/
function valid_username($email, $passwd=NULL){
    $users=select("users", "email, passwd", " email like '{$email}'");
    if(!$users){
        //megnézzük tanár-e
        $teachers=select("teachers", "email, passwd", " email like '{$email}'");
        if(!$teachers)
            return 2;
        else{
            //ekkor tanár
            if(is_null($passwd)){
                return 1; //ekkor nem kell jelszóellenőrzés
            }else{
                if( $teachers->passwd == md5($passwd) ){
                    return 1;
                }else{
                    return 4;
                }
            }
        }
    }else{
        //ekkor diák
        if(is_null($passwd)){
            return 0; //ekkor nem kell jelszóellenőrzés
        }else{
            if( $users->passwd == md5($passwd) ){
                return 0;
            }else{
                return 3;
            }
        }
    }
}

function get_userID_By_email($email){
    return select("users", "user_id", "email like '{$email}'")
}
/*
	a user role-hoz tartozó id-t adja vissza
*/
function role_user(){
    return select("roles", "role_id", "role like user");
}
/*
	class_name alapján visszaadja a class_id-t
*/
function classes_filter($classname){
    return select("classes", "class_id", "classname like '{$classname}'");
}
/*
    a user adatai triviálisak
    a parents az pedig tömböt vár rendezetten a szülők nevével, emailjével

    0: hibátlan
    1: már létezik az email cím
    2: insert user után nem kaptuk vissza a user_id-t
*/
function registration($reg_date, $email, $firstname, $lastname, $passwd, $parents_names, $parents_emails, $classname){
    $options = [
        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
    ];
    $pdo = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';port='.DB_PORT, DB_USERNAME, DB_PASSWORD, $options);
    try{
        $pdo->beginTransaction();
        
        //létezik-e az email:
        $username_val=valid_username($email);
        if($username_val==0 || $username_val==1){
            //már létezik
            return 1;
        }else{
            $row_class=classes_filter($classname);
            $row_role=role_user();
            
            $sql_users= "INSERT INTO users (
                reg_date, email, firstname, lastname, passwd, role_id, class_id)
            VALUES(
                :reg_date, :email, :firstname, :lastname, :passwd, :role_id, :class_id)";
            $q=$pdo->prepare($sql_users);
            $q->bindparam(':reg_date', $reg_date);
            $q->bindparam(':email', $email);
            $q->bindparam(':firstname', $firstname);
            $q->bindparam(':lastname', $lastname);
            $q->bindparam(':passwd', md5($passwd))
            $q->bindparam(':role_id', $row_role['role_id']);
            $q->bindparam(':class_id', $row_class['class_id']);

            if($q->execute()){
                if(DEBUGMODE) echo "registration-userInsert: OK";
                
                $pdo->commit();

                $row_userid=get_userID_By_email($email);
                if(!$row_userid){
                    return 2;
                }else{
                    $count_parents=count($parents_emails);
                    for($i=0; $i<$count_parents; $i++){
                        insert_parent($parents_emails[$i], $parents_names[$i], $row_userid['user_id']);
                    }
                    return 0;
                }
            }else
                if(DEBUGMODE) echo "registration-userInsert: WARNING :(";
        }
    }catch(Exception $e){
        echo $e->getMessage();
        $pdo->rollBack();
    }
}

function insert_parent($email, $name, $user_id){
	$options = [
        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
    ];
    $pdo = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';port='.DB_PORT, DB_USERNAME, DB_PASSWORD, $options);
    try{
        $pdo->beginTransaction();
	
        $sql_parents="INSERT INTO parents (
                email, name, user_id)
            VALUES(
                :email, :name, :user_id)";
        $q_parents=$pdo->prepare($sql_parents);
        $q_parents->bindparam(':email', $email);
        $q_parents->bindparam(':name', $name);
        $q_parents->bindparam(':user_id', $user_id);
        if($q_parents->execute()){
            if(DEBUGMODE) echo "registration-parents: OK";
            $pdo->commit();
        }
        else
            if(DEBUGMODE) echo "registration-parents: WARNING :(";
    }catch(Exception $e){
        echo $e->getMessage();
        $pdo->rollBack();
    }
}