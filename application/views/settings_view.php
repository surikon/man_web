<a href = "../"><-Назад</a>
<br /><br />
<img src="<?=$result['ava'];?>" width = "50%"/>
<br />
<br />

<form action="" method="POST" enctype="multipart/form-data" name = "ava">
    <input type="file" id = "file" name = "file" multiple/> <br /> <br />
    <input type="submit" name = "update_ava" placeholder="Send"/>
</form>

<br />
<?php
    echo $result['error'];
    echo $result['success'];
?>