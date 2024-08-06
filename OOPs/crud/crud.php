<?php

namespace crud;
class Response
{
    public $type;
    public $message;
    public $data;

    public function set_response($type, $message, $data = null): void
    {
        $this->type = $type;
        $this->message = $message;
        $this->data = $data;
   }
    public function get_response(): array
    {
        return [
            "type" => $this->type,
            "message" => $this->message,
            "data" => $this->data
        ];
    }
}
class crud extends Response
{
    private string $host = 'localhost';
    private string $user = 'root';
    private string $pass = '';
    private string $db = 'crud';
    private object $connection;
    private bool $is_connected = false;
    public function __construct(){
        if (!$this->is_connected) {
            $this->connection = new \mysqli($this->host, $this->user, $this->pass, $this->db);
            $this->is_connected = true;
            if ($this->connection->connect_error) {
                die("Connection Failed: " . $this->connection->connect_error);
            }
        }
    }
    public function create(string $table_name, array $data): void
    {
        if ($this->table_exists($table_name)) {
            $columns = implode(', ', array_keys($data));
            $placeholders = implode(', ', array_fill(0, count($data), '?'));

            $query = "INSERT INTO $table_name ($columns) VALUES ($placeholders)";
            $stmt = $this->connection->prepare($query);

            if ($stmt->execute(array_values($data))) {
                $this->set_response("success", "Record Added Successfully");
            } else {
                $this->set_response("error", "Failed to Add Record");
            }
        } else {
             $this->set_response("error", "Table does not exist");
        }
    }
    public function read(string $table_name, string $column_name, string $where =null, string $join = null, string $order = null, string $limit = null, string $offset = null): void
    {
        if ($this->table_exists($table_name)) {
            $query = "SELECT * FROM $table_name";
            if ($column_name) {
                $query .= " WHERE $where";
            }
            if ($join!= null) {
                $query .= " JOIN $join";
            }
            if ($order!= null) {
                $query .= " ORDER BY $order";
            }
            if ($limit!=null) {
                $query .= " LIMIT $limit";
            }
            if ($offset != null) {
                $query .= " OFFSET $offset";
            }
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $this->set_response("success", "Records found", $result->fetch_all(MYSQLI_ASSOC));
            } else {
                $this->set_response("error", "No Records found");
            }
        } else {
            $this->set_response("error", "Table does not exist");
        }
        
    }

    public function update(string $table_name, array $data, string $where): void
    {
        if ($this->table_exists($table_name)) {
            $set = implode(', ', array_map(function ($key) {
                return "$key = ?";
            }, array_keys($data)));
            $query = "UPDATE $table_name SET $set WHERE $where";
            $stmt = $this->connection->prepare($query);
            $stmt->execute(array_values($data));
            if ($stmt->affected_rows > 0) {
                $this->set_response("success", "Record Updated Successfully");
            } else {
                $this->set_response("error", "Failed to Update Record");
            }
        } else {
            $this->set_response("error", "Table does not exist");
        }
    }

    private function table_exists($table_name): bool
    {
        $table_name = $this->connection->real_escape_string($table_name);
        $query = "SHOW TABLES LIKE '$table_name'";
        $result = $this->connection->query($query);

        return $result && $result->num_rows > 0;
    }
}




//$res= new Response("success", "hello");

$crud = new crud();
//$crud->create("users", ["name" => "John", "email" => "abc@xyz", "password" => "123"]);
$crud->read("users", "*", "email = 'abc@xyz'");
//$crud->update("users", ["name" => "John", "email" => "abc@xyz", "password" => "1235"], "id = 3");
echo "<pre>";
print_r($crud->get_response());