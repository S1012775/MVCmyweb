<?php
// session_start();
// require ("manageadd.php");
// require ("showmanege.php");
// $findmessage=findmessage();

 
// if (!isset($_SESSION["userName"])){
    
// //   	header("location: login.php");   
// //   	exit();
//   }
header("content-type: text/html; charset=utf-8");

 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../views/css/style.css">
        <link rel="stylesheet" href="../views/css/button.css">
        <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
        <script>
        $(document).ready(init);
            function init(){
            // $("table td").on("click","button",deletemessage)
                
            }
        function deletemessage(){
            id=$(this).val();
            alert("1");
            // $.get("delemessage?id="+$(this).val(),function(data){
                
            //     if(data){
            //         alert("刪除成功");
            //     }
            // })
        }    
        </script>
    </head>
    <body>
        <div class="table-title"><h3>Manage Only</h3>  </div>
         <div class="col-md-12 ">
        <a href="managemessage"><button class ="bluebutton"type="button" >Message</button></a>
        <a href="managemovie">	<button class ="bluebutton"type="button" >Movie</button></a>
        <a href="managemovietimes">	<button class ="bluebutton"type="button" >MovieTimes</button></a>
        </div>
        
        <table class="table table-inverse">
            <table class="table-fill" id="showmessage" >
            <thead>
            <tr>
            <th class="text-left">#ID</th>
            <th class="text-left">Name</th>
            <th class="text-left">Email</th>
            <th class="text-left">Subject</th>
            <th class="text-left">Content</th>
             <th class="text-left">Setting</th>
            
            </tr>
            </thead>
            <?php  
            foreach ($data as $value){
            ?>
            <tbody class="table-hover">
            <tr>
            <td class="text-left" name="id"><?php echo $value[0] ?></td>
            <td class="text-left"><?php echo $value[1] ?></td>
            <td class="text-left"><?php echo $value[2] ?></td>
            <td class="text-left"><?php echo $value[3]?></td>
            <td class="text-left"><?php echo $value[4]?></td>
            <td class="text-left"> <a class="delbutton" href="../Manage/delemessage?id=<?php echo $value[0] ?> ">Delete </a></td>
           
            </tr>
            
            </tbody>
            <?php }?>
            </table>
            
        <div class="col-md-12 ">
            <span class="pull-right" method="post">
                <a href="../Login/logout"><button class ="allbutton"type="button" name="logout">Log out</button></a>
                <a href="../Home/index">	<button class ="allbutton"type="button" >Home</button></a>
            </span>
            </div >

  
</table>
    </body>
</html>