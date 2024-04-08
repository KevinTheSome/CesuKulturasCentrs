<?php

require_once "./DbConnect.class.php";

class KolektiviModel{
    private $db;
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
        $this->db = new DbConnect($config);
    }

    public function getKolektivi()  //gets all the kolektivi
    {
        $quary = $this->db->dbconn->prepare("SELECT * FROM kolektivi");
        $quary->execute();
        return $quary->fetchAll();
    }

    public function getOneKolektivi(int $id)  //gets one kolektivi
    {
        $quary = $this->db->dbconn->prepare("SELECT * FROM kolektivi WHERE id = :id");
        $quary->execute([':id' => $id]);
        return $quary->fetch();
    }

    public function addKolektivi(string $name, string $description)  //adds the kolektivi
    {
        $quary = $this->db->dbconn->prepare("INSERT INTO kolektivi (name,description) VALUES(:name,:description)");
        $quary->execute([':name' => $name, ':description' => $description]);
        return $quary->fetchAll();
    }

    public function delKolektiv(int $id)  //deletes the kolektivi
    {
        $quary = $this->db->dbconn->prepare("DELETE FROM kolektivi WHERE id = :id");
        $quary->execute([':id' => $id]);
        return $quary->fetchAll();
    }

    public function editKolektiv(int $id,string $name,string $description)  //edit the kolektivi
    {
        $quary = $this->db->dbconn->prepare("UPDATE kolektivi SET name = :name, description = :description WHERE id = :id");
        $quary->execute([':id' => $id , ':name' => $name ,':description' => $description ]);
        return $quary->fetchAll();
    }

}
