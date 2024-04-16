<?php
require_once 'contact.php';

$updated_id = 5; 
$updated_no_HP = '0812379906438';
$updated_Owner = 'John';

$res = Contact::update($updated_id, $updated_no_HP, $updated_Owner);
if ($res) {
    echo "Berhasil Diupdate";
} else {
    echo "Gagal Diupdate";
}

?>
