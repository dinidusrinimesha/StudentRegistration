<?php
class Student extends Database{

    public function isEmailUsed($email) {
        $conn = $this->connect();
        $sql  = "SELECT * FROM students WHERE email= ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result()->num_rows > 0;

        $stmt->close();
        $conn->close();
        return $result;
    }

    public function addNew($first_name, $last_name, $email, $contact_no, $address_line_1, $address_line_2, $address_line_3) {
        $conn = $this->connect();
        $sql  = "INSERT INTO students (first_name, last_name, email, contact_no, address_line_1, address_line_2, address_line_3)
                 VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn -> prepare($sql);
        $stmt->bind_param("sssssss", 
            $first_name,
            $last_name,
            $email,
            $contact_no,
            $address_line_1,
            $address_line_2,
            $address_line_3
        );
        $stmt->execute();

        $stmt->close();
        $conn->close();
    }

    public function getAll() {
        $conn = $this->connect();
        $sql  = "SELECT * FROM students";
        $result   = $conn->query($sql);
        $students = [];

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $students[] = $row;
            }
        } 

        $conn->close();
        return $students;
    }

    public function view($id) {
        $conn = $this->connect();
        $sql  = "SELECT * FROM students WHERE id= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $student = $result->fetch_assoc();

        $conn->close();
        return $student;
    }

    public function delete($id) {
        $conn = $this->connect();
        $sql  = "DELETE FROM students WHERE id=? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $isDelete = $stmt->execute();

        $stmt->close();
        $conn->close();
        return $isDelete;
    }

    public function update($id, $first_name, $last_name, $email, $contact_no, $address_line_1, $address_line_2, $address_line_3) {
        $conn = $this->connect();
        $sql = "UPDATE students 
                SET first_name=?, last_name=?, email=?, contact_no=?, address_line_1=?, address_line_2=?, address_line_3=?
                WHERE (id = ?)";

        $stmt = $conn -> prepare($sql);
        $stmt->bind_param("sssssssi", 
            $first_name,
            $last_name,
            $email,
            $contact_no,
            $address_line_1,
            $address_line_2,
            $address_line_3,
            $id
        );
        $isUpdated = $stmt->execute();

        $stmt->close();
        $conn->close();
        return $isUpdated;
    }
}