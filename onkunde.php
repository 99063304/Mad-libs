<?php
$index = 0;
// $switch = $switch;
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
$error = array();
$opslaan = array();
$nameErr = array();
$switch = 0;
?>
<!DOCTYPE html>
<html lang="nl" dir="ltr">
 <head>
   <meta charset="utf-8">
   <title>Madlibs</title>
   <style media="screen">
     body{
       background-color: darkgray;
     }
     .container{
       margin: auto;
       background-color: white;
       height: 1000px;
       width: 1100px;
     }
     nav{
       background-color: darkred;
     }
     h1{
       color: white;
       font-size: 50px;

     }
     header{
       width: 1000px;
       margin: auto;
     }
     ul {
       list-style-type: none;
       margin: 0;
       padding: 0;
       overflow: hidden;

     }

     li {
       float: left;

       margin: 0px 36px;
     }

     li a {
       display: block;
       color: white;
       text-align: center;
       padding: 16px 20px;
       text-decoration: none;
     }
     input{
       float: right;
       margin-right: 40px;
       width: 300px;
     }
     label{
       font-size: 30px;
       margin-right: 20px;

     }
     .left{
       width: 500px;
     }
     #submit{
       float: none;
       margin-left: 400px;
       width: 200px;
       margin-top: 10px;
     }
     .container p{
       color: red;
       display: inline-block;
     }
     .result{
       font-size: 30px;
       color: black;
     }
     footer{
       background-color: gray;
       height: 50px;
       margin: auto;
       width: 1100px;
     }

   </style>
 </head>
 <body>
   <header>
     <h1>Madlibs</h1>
  </header>

   <div class="container">
     <nav>
       <ul>
         <li><a href="index.php">Er heerst paniek...</a></li>
         <li><a href="onkunde.php">Ontkunde</a></li>
       </ul>
     </nav>
   <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   foreach ($_POST as $question => $val) {
   var_export($question);
   if (!empty($_POST[$question]))  {
     $opslaan[$question] = test_input($val);
   } else {
     $error[$question] = "vul in";
   }
   if (count($opslaan) == 7) {
       $switch = true;
   }
 }
 }

   if ($switch != true){ ?>
     <form class="form" action="<?php
       echo htmlspecialchars($_SERVER["PHP_SELF"]);
       ?>
     " method="post">
     <h1>Ontkunde</h1>

       <label class="left" for="question1">Wat zou je graag willen kunnen?</label>
       <input class="right" type="text" id="question1" name="question1" value="<?php echo $_POST['question1']; ?>"><p>* <?php echo $error['question1'] ; ?></p><br>

       <label class="left" for="question2">Met welke persoon kun je goed opschieten?</label>
       <input class="right" type="text" id="question2" name="question2" value="<?php echo $_POST['question2']; ?>"><p>*<?php echo $error['question2'] ; ?> </p><br>

       <label class="left" for="question1">In welk land zou je graag willen wonen?</label>
       <input class="right" type="text" id="question1" name="question3" value="<?php echo $_POST['question3']; ?>"><p>*<?php echo $error['question3']; ?></p><br>

       <label class="left" for="question1">Wat doe je als je verveelt?</label>
       <input class="right" type="text" id="question1" name="question4" value="<?php echo $_POST['question4']; ?>"><p>*<?php echo $error['question4']; ?></p><br>

       <label class="left" for="question1">Met welk speelgoed speelde je als kind het meest?</label>
       <input class="right" type="text" id="question1" name="question5" value="<?php echo $_POST['question5']; ?>"><p>*<?php echo $error['question5']; ?></p><br>

       <label class="left" for="question1">Bij welke docent spijbel je het liefst?</label>
       <input class="right" type="text" id="question1" name="question6" value="<?php echo $_POST['question6']; ?>"><p>*<?php echo $error['question6']; ?></p><br>

       <label class="left" for="question1">Als je $100.000,- had wat zou je dan kopen?</label>
       <input class="right" type="text" id="question1" name="question7" value="<?php echo $_POST['question7']; ?>"><p>*<?php echo $error['question7']; ?></p><br>

       <label class="left" for="question1">Wat is je favoriete bezigheid?</label>
       <input class="right" type="text" id="question1" name="question8" value="<?php echo $_POST['question8']; ?>"><p>*<?php echo $error['question8']; ?></p><br>

       <input id="submit" onclick="check()" type="submit" name="submit" value="Verzenden">
     </form>
<?php
} else {
   echo '<h2>'. 'Er zijn veel mensen die niet kunnen '.$opslaan['question1'].' Neem nou '.$opslaan['question2'].' Zelfs met de hulp van een '.$opslaan['question4'].' of zelfs '.$opslaan['question3'].' kan '.$opslaan['question2'].' niet '.$opslaan['question1']. 'Dat heeft niet te maken met een gebrek aan '.$opslaan['question1'] .'</h2>';
   echo '<h2>'.', maar met een te veel aan' .$opslaan['question6'].'. Te veel '.$opslaan['question6'].' leidt tot '.$opslaan['question7'].' en dat is niet goed als je wilt'.$opslaan["question1"] .' Helaas voor '.$opslaan['question2'] ."</h2>";
}
?>
   </div>

   <footer>Gemaakt door Vi Clemencia</footer>
 </body>
</html>
