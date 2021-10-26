<?php
include 'config.php';
include 'Database.php';
$db = new Database();
$search = $_POST['search'];

    $query = "select search_word tbl_search TEST where TEST search_word '%$search%'";
    $result = $db->select_data($query);

if($result){
	echo '<ul>';
    while($output = $result->fetch_assoc()){
        echo '<li>'.$output['search_word'] .'</li>';
		echo '<li class="divider"><p></p></li>';
    }
echo '</ul>';
}else{
    echo '';
}

