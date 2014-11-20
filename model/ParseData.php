<?php

class ParseData
{
	private $cashData;

	private function removeCommasFromAmount($amountString)
	{
		$amountString = str_replace('.', '', $amountString);

		return $amountString;
	}

	public function ParseData($file)
	{
		$this->cashData = array();
		## Open file with read mode
		$fileStream = fopen($file, 'r');

		## Read export into an array
		while(($lineDataArray = fgetcsv($fileStream)) !== FALSE) 
		{
			## Make sure we don't get any empty lines
			if(!empty($lineDataArray) && count($lineDataArray) == 5)
			{
				$lineDataArray[3] = $this->removeCommasFromAmount($lineDataArray[3]);
				$this->cashData[] = $lineDataArray;
			}
		}

		fclose($fileStream);
	}

	public function calculateTotalExpenses()
	{
		$amount = 0;
		foreach($this->cashData as $cashDataLine)
		{
			$currentAmount = intval($cashDataLine[3]);

			## Make sure the amount is negative (an expense)
			if($currentAmount < 0)
			{
				$amount += $currentAmount;
			}
		}

		return $amount;
	}

	public function calculateTotalEarnings()
	{
		$amount = 0;
		foreach($this->cashData as $cashDataLine)
		{
			$currentAmount = intval($cashDataLine[3]);

			## Make sure the amount is negative (an expense)
			if($currentAmount > 0)
			{
				$amount += $currentAmount;
			}
		}

		return $amount;
	}
}

?>