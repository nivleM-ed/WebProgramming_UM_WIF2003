<!DOCTYPE html>
<html>
<head>
  <?php
      session_start();
      include "config.php"
  ?>

  <meta charset="UTF-8">
  <title>Checklist</title>
  
  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script type="text/javascript" src="trytest.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet" type="text/css">
  <link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link rel="stylesheet" href="trytest.css">
	
</head>

<body >
    
<div id="checklist" style="margin: 0 20%;">

    <div class="cl-header" >
      <div class="contents clearfix">
        <span class="header-title">Trip checklist</span>
        <button class="header-btn add-custom-item large"> + Add item</button>
      </div>
    </div>

    <div id="item-cl" style="float:right; width:70%;">
      <!-- <form method="POST"> -->
        <div style="background-color:#ff00ff">
        </div>
      <?php
          $query = "SELECT * FROM user_checklist";
          $result = $pdo->prepare($query);
          $result->execute();

          if($result->rowCount() > 0){
            while($row = $result->fetch()) {
              echo '<div class="item-container">';
              echo '<div class="item-box">';
              echo '<input type="checkbox" class="cl-cb" item_id="' . $row['item_id'] . '" id="check' . $row['item_id'] . '"/>';
              echo '<label for="check' . $row['item_id'] . '" item_id="' . $row['item_id'] . '"><div><i class="fa fa-check"></i></div>' . $row['item_name'] . '</label>';
              echo '<span class="edit-btn side-btn" item-id="' . $row['item_id'] . '"/></span> ';
              echo '<span class="remv-btn side-btn" item-id="' . $row['item_id'] . '"/></span> </div></div>';
            }
          }
        ?>
      <!-- </form> -->
    </div>

    <div id="rec-cl" style="background-color:none; width: 25%; display:block;">
      <div class="see-also">Recommendation</div>
      <ul class="accordion">
        <li>
          <a class="toggle" href="javascript:void(0);">Item 1</a>
          <ul class="inner">
            <li>Option 1</li>
            <li>Option 2</li>
            <li>Option 3</li>
          </ul>
        </li>
      </ul>
    </div>

    <div class="modi-bg modi-edit">
      <div class="modi-box">
        <div class="modi-title" title>Edit Item</div>
        <div class="modi-input">
          <div class="modi-input-title">Item title</div>
          <input type="text" name="title" class="modi-input-field" value="">
        </div>
        <div class="modi-btn">
          <button class="btn modi-btn-save">Save</button>
          <button class="btn modi-btn-cncl">Cancel</button>
        </div>
      </div>      
    </div>
    

    <div class="modi-bg modi-add">
      <div class="modi-box">
        <div class="modi-title" title>Add Item</div>
        <div class="modi-input">
          <div class="modi-input-title">Item title</div>
          <input type="text" name="title" class="modi-input-field" value="">
        </div>
        <div class="modi-btn">
          <button class="btn modi-btn-save">Save</button>
          <button class="btn modi-btn-cncl">Cancel</button>
        </div>
      </div>      
    </div>

    <?php
      
    ?>



</div>

</body>
</html>