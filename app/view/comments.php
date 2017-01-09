<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <title>Мой Первый Блог</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script src="/blog1/script.js"></script>
  </head>
  <body>
    <div class="container">
        
        <?php if ($result == 'success'){ ?>
        
        <div class="alert alert-success fade in alert-dismissable" style="margin-top:18px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong>Успех!</strong> Сообщение добавлено.
        </div>
            
            
        <?php } elseif ($result == 'error') { ?>
        
        <div class="alert alert-danger fade in alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong>Упс!</strong> Проверьте валидность данных.
        </div>
        
        <?php }  ?>
        
        
        
      <h1>Моя гостевая книга</h1>
        <table class="guest-table">
            <tr>
                <th  class="identificator">ID </th>
                <th data-sort = '<?php echo $data['order_username'] ?>' class="order-username">User Name </th>
                <th data-sort = '<?php echo $data['order_email'] ?>' class="order-email">E-mail </th>
                <th>Text </th>
                <th data-sort = '<?php echo $data['order_time_add'] ?>' class="order-time-add">Дата добавления</th>
            </tr>
            <?php foreach($comments as $a){ ?>
            <tr>
                <td><?=$a['comment_id']?></td>
                <td><?=$a['username']?></td>
                <td><?=$a['email']?></td>
                <td><?=$a['comment']?></td>
                
                <td><?=date("H:i:s Y-m-d",$a['time_add'] )?></td>
            </tr>
            <?php } ?>
        </table>
      
        <div class="pagination">
            Страница <?=$pagination?>
        </div>    
        <form class="form-block" method="post" action="index.php">
            
            <input type="text" name="username" placeholder="Имя" maxlength="10" pattern="[A-Za-z-0-9]{3,15}" title="Не менее 3 и неболее 15 латынских символов или цифр."  required>
            <input type="email" name="email" placeholder="E-Mail"  required>
            <br>
            <br><textarea name="comment" id="" cols="30" rows="10"></textarea>
            <br>
            <div class="capdiv">
              <input type="text" class="capinp" name="captcha" placeholder="Капча" maxlength="10" pattern="[0-9]{1,5}" title="Только цифры." required>
               <img src="/blog1/resource/captcha.php" class="capimg" alt="Каптча">
            </div>
            <br><input type="submit" name="enter" value="Написать"> <input type="reset" value="Очистить">
            
        </form>
        <footer>
        
          <p>
            Моя гостевая книга <br>Copiryte &#169;copy 2017;
          </p>
        </footer>
     </div>
  </body>
</html>