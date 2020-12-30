<?php
    class ORM{
        private $dbase=0;
        function connect($dbname,$port,$USER,$PASSWORD){
            global $dbase;
            $database="mysql:dbname=".$dbname.";dbhost=127.0.0.1;dbport=".$port;
            $db=new PDO($database,$USER,$PASSWORD);
            $dbase=$db;
            return $dbase;
        }

        function select($table_name,$columns='*',$condition='1',$value='1')
        {
            global $dbase;
            $query='select '.$columns. ' from '.$table_name.' where '.$condition.'='.$value;
            $stmt=$dbase->prepare($query);
            $res=$stmt->execute();
            return $stmt;
        }
        function executeQuery($Query)
        {
            global $dbase;
            $stmt=$dbase->prepare($Query);
            $res=$stmt->execute();
            return $stmt;
        }
        function insert($table_name,$values,$db)
        {
            $inst='insert into ';
            $inst.=$table_name;
            $inst.='(';
            $keys=array_keys($values);
            $values=array_values($values);
            for($i=0;$i<count($keys);$i++)
            {
                $inst.=$keys[$i];
                if($i<(count($keys)-1))
                {
                    $inst.=',';
                }
            }
            $inst.=') values (';
            for($i=0;$i<count($values);$i++)
            {
                $inst.='"';
                $inst.=$values[$i];
                $inst.='"';
                if($i<(count($values)-1))
                {
                    $inst.=',';
                }
            }
            $inst.=')';
            // var_dump($inst);
            $stmt=$db->prepare($inst);
            return $stmt->execute();
        }
}
?>