<!DOCTYPE html>
<html>
    <head>
        <title>Test login form</title>
    </head>
    <body>
        
        <?php  
            if(isset($_POST['user'],$_POST['pass'])){
                $inUsername = $_POST['user'];
                $inPassword = $_POST['pass'];
                
            }

            $DatabaseServerName = "localhost";
            $DatabaseUserName = "root";
            $DatabasePassword = "";
            $DatabaseName ="test login";
            

            $DatabaseConnection = mysqli_connect($DatabaseServerName, $DatabaseUserName, $DatabasePassword, $DatabaseName);

            if(!$DatabaseConnection){
                echo "Connection failed";
                
            }


            $SQL = "SELECT 
            id,
            username,
            password
            FROM
            user
            WHERE
            username like '$inUsername';";
            $DatabaseResult = mysqli_query($DatabaseConnection,$SQL);
            $DatabaseResultCheck = mysqli_num_rows($DatabaseResult);
            if($DatabaseResultCheck > 0){
                while ($DatabaseRow = mysqli_fetch_assoc($DatabaseResult)){
                    if($inUsername == $DatabaseRow['username'] && $inPassword ==  $DatabaseRow['password']) {
                        echo "Logged in";

                    }else{
                        echo "Bad password";

                    }
                    
                }
            }else{
                echo "user not found";
            }
            

            
        
        ?>
    
    </body>

</html>