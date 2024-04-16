<?php
require_once 'contact.php';

$contact_id_to_delete = 7;

$res = Contact::delete($contact_id_to_delete);

if ($res) {
    echo "Berhasil Dihapus";
} else {
    echo "Berhasil Dihapus";
}

?>
