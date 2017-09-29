<html>
<head>
    <!--Add an external stylesheet-->
    <link rel="stylesheet" href="emv.css" type="text/css" />    
</head>
<body>
    
    <h3>Enter an Email I.D. : </h3>
    
    <!--form is going to be POST-ing value to back-end PHP
    The php that is going to ACT on this form is in this page itself
    htmlspecialchars - converts html symbols like & to &amp thus making our page more secure-->
    
    <form 
    method="POST"
    action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
        
        <!--It is important for form elements to have names because this is how they will be referred to in PHP script-->
        <input type="text" name="txt_email"/><br/>
        <br/>
        <input type="submit" name="submit" value="Verify Email!"/>
        
    </form>

    
    <br/>
    
<?php
        // Don't sumbit the form on load, only run the following if the submit button was pressed
        if (isset($_POST['submit'])) {
            
            // Get the input value
            $email = $_POST["txt_email"];
        
            // If the value is empty
            if($email == "")
            {
                echo 'ENTER AN EMAIL FIRST!';
            }
            else
            {
                // See if the value actually complies with the standard email format
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                {
                    echo 'INVALID EMAIL';
                }
                else
                {
                    echo 'PERFECT!';
                }    
            }
        }
?>

</body>
</html>
