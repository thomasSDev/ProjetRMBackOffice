	<?php $anneeCourante = date('Y');
		
		$janvierTimestamp = mktime(0,0,0, 1, date('d'), $anneeCourante);
		$fevrierTimestamp = mktime(0,0,0, 2, date('d'), $anneeCourante);
		$marsTimestamp = mktime(0,0,0, 3, date('d'), $anneeCourante);
		$avrilTimestamp = mktime(0,0,0, 4, date('d'), $anneeCourante);
		$maiTimestamp = mktime(0,0,0, 5, date('d'), $anneeCourante);
		$juinTimestamp = mktime(0,0,0, 6, date('d'), $anneeCourante);
		$juilletTimestamp = mktime(0,0,0, 7, date('d'), $anneeCourante);
		$aoutTimestamp = mktime(0,0,0, 8, date('d'), $anneeCourante);
		$septembreTimestamp = mktime(0,0,0, 9, date('d'), $anneeCourante);
		$otobreTimestamp = mktime(0,0,0, 10, date('d'), $anneeCourante);
		$novembreTimestamp = mktime(0,0,0, 11, date('d'), $anneeCourante);
		$decembreTimestamp = mktime(0,0,0,12, date('d'), $anneeCourante);

		$janvier = date('m/Y', $janvierTimestamp);
		$fevrier = date('m/Y', $fevrierTimestamp);
		$mars = date('m/Y', $marsTimestamp);
		$avril = date('m/Y', $avrilTimestamp);
		$mai = date('m/Y', $maiTimestamp);
		$juin = date('m/Y', $juinTimestamp);
		$juillet = date('m/Y', $juilletTimestamp);
		$aout = date('m/Y', $aoutTimestamp);
		$septembre = date('m/Y', $septembreTimestamp);
		$octobre = date('m/Y', $otobreTimestamp);
		$novembre = date('m/Y', $novembreTimestamp);
		$decembre = date('m/Y', $decembreTimestamp);

		$janvierCount = 0;
		$fevrierCount = 0;
		$marsCount = 0;
		$avrilCount = 0;
		$maiCount = 0;
		$juinCount = 0;
		$juilletCount = 0;
		$aoutCount = 0;
		$septembreCount = 0;
		$octobreCount = 0;
		$novembreCount = 0;
		$decembreCount = 0;

		foreach ($listeDatesRendezVous as $datesRDV)
		{
			if($datesRDV['dateHeure']->format('m/Y') == $janvier)
			{
				$janvierCount ++;
			}
			if($datesRDV['dateHeure']->format('m/Y') == $fevrier)
			{
				$fevrierCount ++;
			}
			if($datesRDV['dateHeure']->format('m/Y') == $mars)
			{
				$marsCount ++;
			}
			if($datesRDV['dateHeure']->format('m/Y') == $avril)
			{
				$avrilCount ++;
			}
			if($datesRDV['dateHeure']->format('m/Y') == $mai)
			{
				$maiCount ++;
			}
			if($datesRDV['dateHeure']->format('m/Y') == $juin)
			{
				$juinCount ++;
			}
			if($datesRDV['dateHeure']->format('m/Y') == $juillet)
			{
				$juilletCount ++;
			}
			if($datesRDV['dateHeure']->format('m/Y') == $aout)
			{
				$aoutCount ++;
			}
			if($datesRDV['dateHeure']->format('m/Y') == $septembre)
			{
				$septembreCount ++;
			}
			if($datesRDV['dateHeure']->format('m/Y') == $octobre)
			{
				$octobreCount ++;
			}
			if($datesRDV['dateHeure']->format('m/Y') == $novembre)
			{
				$novembreCount ++;
			}
			if($datesRDV['dateHeure']->format('m/Y') == $decembre)
			{
				$decembreCount ++;
			}
			
		} 
		/*var_dump($janvierCount. ' ' .$fevrierCount. ' ' .$marsCount. ' ' .$avrilCount. ' ' .$maiCount. ' ' .$juinCount. ' ' .$juilletCount. ' ' .$aoutCount. ' ' .$septembreCount. ' ' .$octobreCount. ' ' .$novembreCount. ' ' .$decembreCount);
		die;*/

		