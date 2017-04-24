<?php
$dbconn = pg_connect("
	host     = ec2-54-195-248-0.eu-west-1.compute.amazonaws.com
	dbname   = drqe518tlrcll
	user     = jsmszguhuwkcmt
	password = 027855475c9a4e8236f02912be96fa620534961f7f2c1b885a5f97a4c77051f3
")or die('Could not connect: ' . pg_last_error());

if(isset($_POST["comand"]))
{
	switch ($_POST["comand"])
	{
		case "create":
		{
			try 
			{  
                $query = "CREATE TABLE Server (
				id TEXT NOT NULL,
				package TEXT NOT NULL)";
				$result = pg_query($query) or die(pg_last_error());
                
				echo "SUCCESS";
                
			}
			catch (Exception $e) 
			{
				echo "ERROR";
			}
            
		} break;

	    case "get": 
	    {
            try
			{
                $query = "SELECT * FROM Server WHERE id = '$_POST[id]'";
                $result = pg_query($query) or die(pg_last_error());
                while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) echo $line["package"];
            }
			catch (Exception $e) 
			{
				echo "ERROR";
			}
	    } break;

	    case "set": 
	    {
			try
			{
                $query = "SELECT * FROM Server WHERE id = '$_POST[id]'";
                $result = pg_query($query) or die(pg_last_error());
                
                if(pg_num_rows($result) == 0) $query = "INSERT INTO Server (id, package) VALUES ('$_POST[id]', '$_POST[package]')";
                else $query = "UPDATE Server SET package = '$_POST[package]' WHERE id = '$_POST[id]'";
                
                $result = pg_query($query) or die(pg_last_error());
                echo "SUCCESS";
			}
			catch (Exception $e) 
			{
				echo "ERROR";
			}
		} break;

		case "test": 
	    {
		    echo "SUCCESS";
	    } break;

		case "delete": 
	    {
			try
			{
				$query = "DELETE FROM Server";
				$result = pg_query($query) or die(pg_last_error());
                
				echo "SUCCESS";
			}
			catch (Exception $e) 
			{
				echo "ERROR";
			}
	    } break;
			 
        case "get_connection":
		{
			try
			{
				$query = "SELECT * FROM Server";
				$result = pg_query($query) or die(pg_last_error());
				while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) echo $line["id"] . "<br>";
			}
			catch (Exception $e) 
			{
				echo "ERROR";
			}
		}
		break;
        
		case "set_connection":
		{
			try
			{
				$query = "SELECT * FROM Server WHERE id = '$_POST[id]'";
				$result = pg_query($query) or die(pg_last_error());
				if(pg_num_rows($result) == 0) $query = "INSERT INTO Server (id, package) VALUES ('$_POST[id]', '')";
				else $query = "UPDATE Server SET package = '' WHERE id = '$_POST[id]'";
				$result = pg_query($query) or die(pg_last_error());

				echo "SUCCESS";
			}
			catch (Exception $e) 
			{
				echo "ERROR";
			}
		}
		break;
			
	    default: { echo "ERROR"; } break;
	}
}

if(isset($_GET["comand"]))
{
	switch ($_GET["comand"])
	{
		case "create":
		{
			try 
			{  
                $query = "CREATE TABLE Server (
				id TEXT NOT NULL,
				package TEXT NOT NULL)";
				$result = pg_query($query) or die(pg_last_error());
                
				echo "SUCCESS";
                
			}
			catch (Exception $e) 
			{
				echo "ERROR";
			}
            
		} break;

	    case "get": 
	    {
            try
			{
                $query = "SELECT * FROM Server WHERE id = '$_GET[id]'";
                $result = pg_query($query) or die(pg_last_error());
                while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) echo $line["package"];
            }
			catch (Exception $e) 
			{
				echo "ERROR";
			}
	    } break;

	    case "set": 
	    {
			try
			{
                $query = "SELECT * FROM Server WHERE id = '$_GET[id]'";
                $result = pg_query($query) or die(pg_last_error());
                
                if(pg_num_rows($result) == 0) $query = "INSERT INTO Server (id, package) VALUES ('$_GET[id]', '$_GET[package]')";
                else $query = "UPDATE Server SET package = '$_GET[package]' WHERE id = '$_GET[id]'";
                
                $result = pg_query($query) or die(pg_last_error());
                echo "SUCCESS";
			}
			catch (Exception $e) 
			{
				echo "ERROR";
			}
		} break;

		case "test": 
	    {
		    echo "SUCCESS";
	    } break;

		case "delete": 
	    {
			try
			{
				$query = "DELETE FROM Server";
				$result = pg_query($query) or die(pg_last_error());
                
				echo "SUCCESS";
			}
			catch (Exception $e) 
			{
				echo "ERROR";
			}
	    } break;
			 
        case "get_connection":
		{
			try
			{
				$query = "SELECT * FROM Server";
				$result = pg_query($query) or die(pg_last_error());
				while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) echo $line["id"] . "<br>";
			}
			catch (Exception $e) 
			{
				echo "ERROR";
			}
		}
		break;
        
		case "set_connection":
		{
			try
			{
				$query = "SELECT * FROM Server WHERE id = '$_GET[id]'";
				$result = pg_query($query) or die(pg_last_error());
				if(pg_num_rows($result) == 0) $query = "INSERT INTO Server (id, package) VALUES ('$_GET[id]', '')";
				else $query = "UPDATE Server SET package = '' WHERE id = '$_GET[id]'";
				$result = pg_query($query) or die(pg_last_error());

				echo "SUCCESS";
			}
			catch (Exception $e) 
			{
				echo "ERROR";
			}
		}
		break;
			
	    default: { echo "ERROR"; } break;
	}
}


pg_free_result($result);
pg_close($dbconn);
?>
