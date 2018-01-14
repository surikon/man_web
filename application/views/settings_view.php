<a href = "../"><-Назад</a>
<br /><br />
<center>
<img src="<?=$result['ava'];?>" width = "40%"/>
<br />
<br />

<form action="" method="POST" enctype="multipart/form-data" name = "ava">
    <input type="file" id = "file" name = "file" multiple/> <br /> <br />
    <input type="submit" name = "update_ava" placeholder="Send"/>
</form>
</center>
<br />
<?php
    if(!empty($result['error']))echo $result['error'];
    if(!empty($result['error']))echo $result['success'];
?>