<form method="POST" action="/index.php">
  <label for="dateCreate">
    <p>Введите дату</p>
  </label>

  <input name="dateCreate" type="text" id="dateCreate">
  <button type="submit">Отправить</button>
</form>
<style type="text/css">
  form {
    margin: 100px auto;
    display: flex;
    gap: 10px;
    flex-direction: column;
    width: 300px;
    border: 2px solid blue;
    padding: 10px;
    border-radius: 10px;
  }

  input {
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    border: 2px solid blue;
  }

  button {
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    border: 2px solid blue;
  }
  .display{
    margin: 100px auto;
    width: 300px;
    border: 2px solid blue;
    padding: 10px;
    border-radius: 10px;
  }
</style>





<?php
if (isset($_POST['dateCreate'])) {


  $dateCreate = $_POST['dateCreate'];

  $fitaem = strtotime($dateCreate);

  if ($fitaem != false) {



    $hors = date ("H", $fitaem);

    if ($hors >= 15){
      $fitaem = strtotime('+2 day', $fitaem);
    }elseif ($hors < 15){
      $fitaem = strtotime('+1 day', $fitaem);
    }




    $deuwik = date('w', $fitaem);

    if ($deuwik == 6) {
      $fitaem = strtotime('+2 day', $fitaem);
    }elseif ($deuwik == 0) {
      $fitaem = strtotime('+1 day', $fitaem);
    }

   

    

    $datarelis = date('d.m.Y H:i:s', $fitaem);
    echo '<div class = "display">'.$datarelis.'</div>';
  } else {
    echo '<div class = "display">Введите дату в формате d.m.Y H:i:s или d-m-Y H:i:s</div>';
  }
}
