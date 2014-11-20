<?php
if(isset($_FILES['ExportFile']))
{
	## Form sent

	## Get the file
	if(file_exists($_FILES['ExportFile']['tmp_name']))
	{
		require_once '../model/ParseData.php';

		$parseData = new ParseData($_FILES['ExportFile']['tmp_name']);

		echo "Expenses: <br />";
		echo $parseData->calculateTotalExpenses();
		echo "<br />Earnings: <br />";
		echo $parseData->calculateTotalEarnings();
	}
	else
	{
		echo "File does not exist";
	}
}
else
{
	die("What are you doing here?");
}

?>