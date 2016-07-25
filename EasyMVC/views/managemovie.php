<?php
// session_start();
// require ("manageadd.php");
// require ("showmanege.php");
// $findmovie=findmovie();


// if (!isset($_SESSION["username"])){
// //   	header("location:login.php");   
// //   	exit();
//   }


 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../views/css/style.css">
        <link rel="stylesheet" href="../views/css/button.css">
        <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        
        <div class="table-title"><h3>Manage Only</h3>  </div>
        
         <div class="col-md-12 ">
        <a href="managemessage"><button class ="bluebutton"type="button" >Message</button></a>
        <a href="managemovie">	<button class ="bluebutton"type="button" >Movie</button></a>
        <a href="managemovietimes">	<button class ="bluebutton"type="button" >MovieTimes</button></a>
        </div>
        
        <div class="col-md-12 ">
            <div class="bs-example col-md-5 ">
    <form method="post">
        <div class="table-title"><h3>新增電影</h3></div>
        <div class="form-group">
            <label >Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label >EnglishName</label>
            <input type="text" class="form-control" name="enname" placeholder="EnglishName">
        </div>
        <div class="form-group">
            <label>圖片網址:</label>
        <input type="text" class="form-control" name="picture" placeholder="picture">
        
         </div>
         <div class="form-group">
            <label>上傳日期:</label><br />
            <input type="date" name="updatetime";>
        </div>
        <input type="submit" class="addbutton" name="insertmovie"value="新增">
    </form>
</div>

<div class="bs-example col-md-5 ">
    <form method="post">
        <div class="table-title"><h3>修改電影</h3></div>
        <div class="form-group">
            <label >ID</label>
            <input type="text" class="form-control" name="modifyid" placeholder="ID">
        </div>
        <div class="form-group">
            <label >Name</label>
            <input type="text" class="form-control" name="modifyname" placeholder="Name">
        </div>
        <div class="form-group">
            <label >EnglishName</label>
            <input type="text" class="form-control" name="modifyenname" placeholder="EnglishName">
        </div>
        <div class="form-group">
            <label>圖片網址:</label>
        <input type="text" class="form-control" name="modifypicture" placeholder="picture">
        
         </div>
         <div class="form-group">
            <label>修改日期:</label><br />
            <input type="date" name="modifyupdatetime";>
        </div>
        <input type="submit" class="button" name="modifymovie"value="修改">
    </form>
</div>
			</div >
       
        
        <table class="table table-inverse">
              
            <table class="table-fill">
            <thead>
            <tr>
            <th class="text-left">#ID</th>
            <th class="text-left">picture</th>
            <th class="text-left">Name</th>
            <th class="text-left">English</th>
            <th class="text-left">Updatetime</th>
            <th class="text-left">Updatetype</th>
             <th class="text-left">Setting</th>
            
            </tr>
            </thead>
            <?php   
            foreach ($data as $value){
            ?>
            <tbody class="table-hover">
            <tr>
            <td class="text-left" name="id"><?php echo $value[0] ?></td>
            
            <td class="text-left"><?php echo $value[1]?></td>
            <td class="text-left"><?php echo $value[2] ?></td>
            <td class="text-left"><?php echo $value[3]?></td>
            <td class="text-left"><?php echo $value[4]?></td>
            <td class="text-left"><?php echo $value[5] ?></td>
            <td class="text-left"> <a class="delbutton" href="../Manage/delemovie?id=<?php echo $value[0] ?> ">Delete </a></td>
            </tr>
            
            </tbody>
            <?php } ?>
            </table>
            
			<div class="col-md-12 ">
            <span class="pull-right">
                <a href="../Login/logout"><button class ="allbutton"type="button" name="logout">Log out</button></a>
                <a href="../Home/index">	<button class ="allbutton"type="button" >Home</button></a>
            </span>
            </div >

  
</table>
    </body>
</html>