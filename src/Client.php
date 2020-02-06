<?php

namespace Antiockus;

use Antiockus\Model;
use Doctrine\DBAL\DriverManager;

class Client extends Model
{
    protected $client_name;
    protected $client_url;
    protected $client_description;

    public function __construct($client_name, $client_url, $client_description)
    {
        $this->setClientName($client_name);
        $this->setClientUrl($client_url);
        $this->setClientDescription($client_description);
    }

    /**
     * @return mixed
     */
    public function getClientName()
    {
        return $this->client_name;
    }

    /**
     * @param mixed $client_name
     */
    public function setClientName($client_name)
    {
        $this->client_name = $client_name;
    }

    /**
     * @return mixed
     */
    public function getClientUrl()
    {
        return $this->client_url;
    }

    /**
     * @param mixed $client_url
     */
    public function setClientUrl($client_url)
    {
        $this->client_url = $client_url;
    }

    /**
     * @return mixed
     */
    public function getClientDescription()
    {
        return $this->client_description;
    }

    /**
     * @param mixed $client_description
     */
    public function setClientDescription($client_description)
    {
        $this->client_description = $client_description;
    }


    public function saveClient()
    {
        $sql = "INSERT INTO CLIENTS ( client_name, client_url, client_description)  VALUES (?,?,?)";
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
        $stmt->bindParam(1, $_POST['client_name']);
        $stmt->bindParam(2, $_POST['client_url']);
        $stmt->bindParam(3, $_POST['client_description']);
        $stmt->execute();
    }
}
