<h3>Изменить аватарку</h3>
<hr /> <br />
<img src="<?=$result['ava'];?>" width = "20%"/>
<br />
<br />

<form action="" method="POST" enctype="multipart/form-data" name = "ava">
    <input type="file" id = "file" name = "file" multiple/> <br /> <br />
    <input type="submit" name = "update_ava" placeholder="Send"/>
</form>

<br />
<?php
    if(!empty($result['error']) && $result['error'] != '0')echo $result['error'];
    if(!empty($result['success']) && $result['success'] != '0')echo $result['success'];
?>