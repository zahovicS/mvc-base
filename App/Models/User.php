<?php
class User extends Model
{
    public function __construct()
    {
        $this->table = "usuario";
        parent::__construct();
    }

    public function confirm_login(string $email, string $pass): array
    {
        $email = $this->clear_inputs_html($email);
        $pass = $this->clear_inputs_html($pass);
        $response = ["status" => false, "data" => null];
        $this->db->query("SELECT * FROM usuario WHERE email=:email AND del_status = 'Live' LIMIT 1");
        $this->db->bind(":email", $email);
        $res = $this->db->fetch();
        if (password_verify($pass, $res->clave)) {
            $response = ["status" => true, "data" => $res];
        }
        return $response;
    }
}