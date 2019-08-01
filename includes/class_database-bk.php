<?php
/**
*
* @ IonCube v8.3 Loader By DoraemonPT
* @ PHP 5.2
* @ Decoder version : 1.0.0.2
* @ Author     : DoraemonPT
* @ Release on : 09.05.2014
* @ Website    : http://EasyToYou.eu
*
**/

class Database
{

    public $connection = NULL;
    public $debug = false;
    public $query_list = NULL;
    public $query_count = 0;
    public $log_sql_table = null;
    public $suppress_errors = false;

    public function __construct( )
    {
    }

    public function Connect( $host, $user, $pass, $name, $charset = null, $collation = null )
    {
        if ( !( $this->connection = mysqli_connect( $host, $user, $pass ) ) )
        {
            return false;
        }
        if ( !is_null( $charset ) && $charset != "" )
        {
            $collation_query = "SET NAMES '".$charset."'";
            if ( !is_null( $collation ) && $collation != "" )
            {
                $collation_query .= " COLLATE '".$collation."'";
            }
            $this->query( $collation_query );
        }
        if ( !mysqli_select_db( $this->connection, $name ) )
        {
            return false;
        }
        return true;
    }

    public function LogSQL( $table )
    {
        $this->log_sql_table = $table;
    }

    public function Clean( $str )
    {
        return mysqli_real_escape_string( $this->connection, $str );
    }

    public function Query( $sql, $variables = array( ), $debug = true )
    {
        if ( !is_array( $variables ) )
        {
            $variables = array(
                $variables
            );
        }
        $variables = array_values( $variables );
        if ( count( $variables ) )
        {
            $sql_parts = explode( "?", $sql );
            foreach ( $variables as $key => $var )
            {
                switch ( gettype( $var ) )
                {
                case "string" :
                    $var = "'".$this->Clean( $var )."'";
                    break;
                case "double" :
                    $var = str_replace( ",", ".", $var );
                    break;
                case "boolean" :
                    $var = $var ? 1 : 0;
                    break;
                default :
                    if ( $var === null )
                    {
                        $var = "NULL";
                    }
                }
                $sql_parts[$key] .= $var;
            }
            $sql = implode( "", $sql_parts );
        }
        if ( !is_null( $this->log_sql_table ) && $debug )
        {
            $time_start = microtime( true );
        }
        $result = mysqli_query( $this->connection, $sql );
        if ( !$result && !$this->suppress_errors && error_reporting( ) != 0 )
        {
            trigger_error( $this->getErrorMessage( $sql ), E_USER_ERROR );
        }
        if ( !is_null( $this->log_sql_table ) && $debug )
        {
            $this->query_list[] = array(
                "query" => $sql,
                "time" => number_format( round( microtime( 1 ) - $time_start, 6 ), 6 )
            );
            if ( !is_null( $this->log_sql_table ) && !strstr( $sql, $this->log_sql_table ) )
            {
                $this->Query( "INSERT INTO ".$this->log_sql_table." SET created=NOW(), sql_query=?, url=?, timer=?", array(
                    $sql,
                    URL,
                    number_format( round( microtime( 1 ) - $time_start, 6 ), 6 )
                ), false );
            }
            else
            {
                $this->query_count++;
            }
        }
        else
        {
            $this->query_count++;
        }
        if ( $this->debug && $debug )
        {
            echo $sql."<br /><br />";
        }
        return $result;
    }

    public function Execute( $sql, $variables = array( ) )
    {
        return $this->Query( $sql, $variables );
    }

    public function GetOne( $sql, $variables = array( ) )
    {
        $result = $this->Query( $sql, $variables );
        $row = mysqli_fetch_array( $result, MYSQL_NUM );
        return $row[0];
    }

    public function GetAssoc( $sql, $variables = array( ) )
    {
        $result = $this->Query( $sql, $variables );
        $result_array = array( );
        $type = 2 < ( $num_fields = mysqli_num_fields( $result ) ) ? MYSQL_ASSOC : MYSQL_NUM;
        while ( $row = mysqli_fetch_array( $result, $type ) )
        {
            if ( $num_fields == 2 )
            {
                $result_array[$row[0]] = $row[1];
            }
            else if ( $num_fields == 1 )
            {
                $result_array[] = $row[1];
            }
            else
            {
                $result_array[array_shift( $row )] = $row;
            }
        }
        return $result_array;
    }

    public function GetRow( $sql, $variables = array( ) )
    {
        $result = $this->Query( $sql, $variables );
        return mysqli_fetch_array( $result, MYSQL_ASSOC );
    }

    public function GetAll( $sql, $variables = array( ) )
    {
        $result = $this->Query( $sql, $variables );
        $result_array = array( );
        while ( $row = mysqli_fetch_assoc( $result ) )
        {
            $result_array[] = $row;
        }
        return $result_array;
    }

    public function GetCol( $sql, $variables = array( ), $column = 0 )
    {
        $result = $this->Query( $sql, $variables );
        $result_array = array( );
        while ( $row = mysqli_fetch_array( $result, MYSQL_NUM ) )
        {
            $result_array[] = $row[$column];
        }
        return $result_array;
    }

    public function Insert_ID( )
    {
        return $this->GetOne( "SELECT LAST_INSERT_ID()" );
    }

    public function FoundRows( )
    {
        return $this->GetOne( "SELECT FOUND_ROWS()" );
    }

    public function Affected_Rows( )
    {
        return mysqli_affected_rows( $this->connection );
    }

    public function AddColumn( $table, $column, $type, $size, $unsigned, $null, $after, $default = null )
    {
        $query = "ALTER TABLE ".$table." ADD `{$column}` {$type}";
        if ( !is_null( $size ) )
        {
            $query .= "({$size})";
        }
        if ( $unsigned )
        {
            $query .= " UNSIGNED";
        }
        if ( !$null )
        {
            $query .= " NOT";
        }
        $query .= " NULL ";
        if ( !is_null( $default ) )
        {
            $query .= "DEFAULT ";
            if ( $default == "NULL" )
            {
                $query .= "NULL ";
            }
            else if ( is_int( $default ) )
            {
                $query .= $default." ";
            }
            else
            {
                $query .= "'{$default}' ";
            }
        }
        $query .= "AFTER `{$after}`";
        return $this->Execute( $query );
    }

    public function DropColumn( $table, $column )
    {
        return $this->Execute( "ALTER TABLE `{$table}` DROP `{$column}`" );
    }

    public function AddIndex( $table, $columns, $type = "INDEX", $name = "" )
    {
        if ( !is_array( $columns ) )
        {
            $columns = array(
                $columns
            );
        }
        return $this->Execute( "ALTER TABLE ".$table." ADD {$type} ".( $name ? "`{$name}` " : "" )."(`".implode( "`,`", $columns )."`)" );
    }

    public function MetaColumnNames( $table )
    {
        return $this->GetCol( "SHOW COLUMNS FROM ".$this->Clean( $table ) );
    }

    public function MetaTables( )
    {
        return $this->GetCol( "SHOW TABLES" );
    }

    public function MetaPrimaryKeys( $table )
    {
        $primary_keys = array( );
        $fields = $this->GetAll( "SHOW COLUMNS FROM ".$this->Clean( $table ) );
        foreach ( $fields as $field )
        {
            if ( $field['Key'] == "PRI" )
            {
                $primary_keys[] = $field['Field'];
            }
        }
        return $primary_keys;
    }

    public function MetaKeys( $table )
    {
        $keys = array( );
        $fields = $this->GetAll( "SHOW COLUMNS FROM ".$this->Clean( $table ) );
        foreach ( $fields as $field )
        {
            if ( $field['Key'] != "" )
            {
                $keys[] = $field['Field'];
            }
        }
        return $keys;
    }

    public function getErrorMessage( $sql = null )
    {
        $message = "<b>MySQL error</b>.<br /><br />";
        if ( !is_null( $sql ) )
        {
            $message .= "<b>Query:</b><br />".htmlspecialchars( $sql, ENT_QUOTES )."<br /><br />";
        }
        $message .= "<b>Error:</b><br /> (".mysqli_errno( $this->connection ).") ".mysqli_error( $this->connection )."<br /><br />";
        return $message;
    }

    public function Close( )
    {
        @mysqli_close( $this->connection );
    }

    public function __destruct( )
    {
        $this->Close( );
    }

}


/**
*
* @ IonCube v8.3 Decoder By DoraemonPT
*
**/
?>
