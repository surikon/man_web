<h1>���������</h1>
<p>
<table>
��� ������� � ��������� ������� �������� ������������, ������� ���� �� ��������� ������� �� ����������� �������.
<tr><td>���</td><td>������</td><td>��������</td></tr>
<?php
 
	foreach($data as $row)
	{
		echo '<tr><td>'.$row['Year'].'</td><td>'.$row['Site'].'</td><td>'.$row['Description'].'</td></tr>';
	}

?>
</table>
</p>