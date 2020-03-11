<?php

    /**
     * Query Db class  Contains:
     * UPDATE
     * DELETE
     * INSERT 
     * FETCH 
     */

    class main_db{

        protected $hostname;
        protected $hostusername;
        protected $hostpassword;
        protected $dbname;
        protected $db;
    /**
     * __contruct function 
     * @param hostname
     * @param hostusername
     * @param hostpassword
     * @param dbname
     * 
     * response boolean 
     */
        public function __construct($hostname, $hostusername, $hostpassword, $dbname )
        {
            $this->hostname = $hostname;
            $this->hostusername = $hostusername;
            $this->hostpassword =$hostpassword;
            $this->dbname = $dbname;
            $db = $this->db;
            $db = $this->getConnestion($hostname, $hostusername, $hostpassword, $dbname);
        }

        /**
         * establishe tabase connection 
         * @param __construct function parameters
         */
         public function getConnestion($hostname, $hostusername, $hostpassword, $dbname){

            $conk = "mysql:host=$hostname;dbname=$dbname;charset=utf8";

            try{

            $db = new PDO($conk, $hostusername, $hostpassword);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
            
            return $db;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
         }

        /**
         * @param $sql query
         * 
         */
        // public function saving($sql, $data){
            
        //     try {
        //         if($this->db == null){
                    
        //             $this->db = $this->getConnestion($this->hostname , $this->hostusername, $this->hostpassword, $this->dbname);
        //             $SQL = $this->db->prepare($sql);
                    
        //             $stmt = $SQL->execute($data);
        //             return $stmt;

        //         }
        //     } catch (PDOException $e) {
        //          echo "Error".$e->getMessage();
        //     }
        // }
        public function saving($table, $column, $values , $data)
        {
            if($this->db == null)
            {
                $this->db = $this->getConnestion($this->hostname, $this->hostusername,$this->hostpassword, $this->dbname);
            }
            try {
                $stmt = $this->db->prepare("INSERT INTO $table ($column) VALUES($values)");
                $stmt->execute($data);
                return $stmt->rowCount();
            } catch (PDOException $e) {
                
                echo "Error:".$e->getMessage();
            }
        }
        /**
         *  fetch by sql
         */
        
         public function Fetch($sql, $data){
             try{
                 if($this->db == null){
                     $this->db = $this->getConnestion($this->hostname, $this->hostusername, $this->hostpassword, $this->dbname
                 );

                  $SQL = $this->db->prepare($sql);
                  $SQL->execute($data);
                  $rows = $SQL->fetchAll(\PDO::FETCH_ASSOC);
                    return $rows;
                 }
             }catch(PDOException $e){
                 echo $e->getMessage();
             }
         }

         /** 
          * Update function
          *@param $sql
          *reponse boolean
          */

         public function Update($sql, $data){

            try{
                if($this->db == null){
                    $this->db = $this->getConnestion($this->hostname, $this->hostusername, $this->hostpassword, $this->dbname);
                }

                $SQL = $this->db->prepare($sql);
                return $SQL->execute($data);
            }catch(PDOException $e){
                echo "Error:".$e->getMessage();
            }
         }

         public function Delete($sql){
            try{
                if($this->db == null){
                    $this->db = $this->getConnestion($this->hostname, $this->hostusername, $this->hostpassword, $this->dbname);
                }

                $SQL = $this->db->prepare($sql);
                return $SQL->execute();
            }catch(PDOException $e){
                echo "Error:".$e->getMessage();
            }
        }

        
        //  public function __destruct()
        //  {
        //      $this->db = null;
        //  }
// new data
    }
?>