<?php

namespace Antiockus;

use Antiockus\Model;
use Doctrine\DBAL\DriverManager;

class Ticket extends Model
{
    protected $title;
    protected $description;
    protected $status;
    protected $owner_id;

    public function __construct($title, $description, $status)
    {
        $this->setTitle($title);
        $this->setStatus($status);
        $this->setDescription($description);
        $this->owner_id = $_SESSION['user_id'];
    }
    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function saveTicket()
    {
        $sql = "INSERT INTO TICKETS ( ticket_title, ticket_description, ticket_status, owner_id)  VALUES (?,?,?,?)";


        $connectionParams = [
            'dbname' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASS'],
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT'],
            'driver' => 'pdo_mysql'
        ];

        $conn = DriverManager::getConnection($connectionParams);

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $this->title);
        $stmt->bindParam(2, $this->description);
        $stmt->bindParam(3, $this->status);
        $stmt->bindParam(4, $this->owner_id);
        $stmt->execute();
    }
}
