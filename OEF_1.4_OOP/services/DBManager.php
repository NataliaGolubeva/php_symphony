<?php


class DBManager
{
    private $configuration;
    private $pdo;

    public function __construct(array $configuration){
        $this->configuration = $configuration;
    }
    /**
     * @return PDO
     */
    public function createConnection(){
      try  {
            if ($this->pdo === null) {
                $this->pdo = new PDO(
                    $this->configuration['db_dsn'],
                    $this->configuration['db_user'],
                    $this->configuration['db_pass']
                );
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }
            return $this->pdo;
        }
        catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function GetData( $sql )
    {
        $this -> CreateConnection();

        //define and execute query
        $result = $this->pdo->query( $sql );

        //show result (if there is any)
        if ( $result->rowCount() > 0 )
        {
            $rows = $result->fetchAll(PDO::FETCH_BOTH);
            return $rows;
        }
        else
        {
            return [];
        }

    }

   public function ExecuteSQL( $sql )
    {
        $this->CreateConnection();

        //define and execute query
        $result = $this->pdo->query( $sql );

        return $result;
    }

}