<?php
require_once 'database.php';

class Contact {
    static function select() {
        global $conn;
        $sql = "SELECT * FROM tbcontact";
        $result = $conn->query($sql);
        $arr = array();

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                foreach ($row as $key => $value) {
                    $arr[$key][] = $value;
                }
            }
        }
        return $arr;
    }
    static function insert($id, $no_HP, $Owner) {
        global $conn;
        $sql = "INSERT INTO tbcontact(id, no_HP, Owner) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $id, $no_HP, $Owner);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }

    static function update($id, $no_HP, $Owner) {
        global $conn;
        $sql = "UPDATE tbcontact SET no_HP = ?, Owner = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $no_HP, $Owner, $id);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }

    static function delete($id) {
        global $conn; 
        $sql = "DELETE FROM tbcontact WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true; 
        } else {
            return false; 
        }
    }
}

?>