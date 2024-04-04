<?php

$connect = new PDO("mysql:host=localhost;dbname=skin_care", "root", "");

if(isset($_POST["action"]))
{

	if($_POST["action"] == 'fetch')
	{

		$query = "
		SELECT product.Name, SUM(orders.Quantity) AS Total 
		FROM product JOIN orders ON orders.Product_ID = product.Name
		GROUP BY orders.Product_ID
		";

		$result = $connect->query($query);

		$data = array();

		foreach($result as $row)
		{
			$data[] = array(
				'language'		=>	$row["Name"],
				'total'			=>	$row["Total"],
				'color'			=>	'#' . rand(100000, 999999) . ''
			);
		}

		echo json_encode($data);
	}
}

?>