<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topsis {

	private $data = array();
	private $nilaiAwal = array();
	private $jumlah = array();
	private $matriksNormalisasi = array();
	private $matriksNormalisasiTerbobot = array();
	private $maxMin = array();
	private $nilaiSeparationMeasure = array();
	private $nilaiPreferensi = array();

	public function setData($data)
	{
		$this->data = $data;
	}

	public function getData()
	{
		return $this->data;
	}

	public function setNilaiAwal()
	{
		$nData = count($this->data);
		for ($i=0; $i < $nData; $i++) { 
			array_push($this->nilaiAwal, array($this->data[$i][3],$this->data[$i][4],$this->data[$i][5]));
		}
	}

	public function hitungJumlah()
	{
		$nBaris = count($this->nilaiAwal);
		$nKolom = count($this->nilaiAwal[0]);

		for ($i=0; $i < $nKolom; $i++) { 
			$total = 0;
			for ($j=0; $j < $nBaris; $j++) { 
				$total += $this->nilaiAwal[$j][$i];
			}
			array_push($this->jumlah, $total);
		}
	}

	public function hitungNormalisasi()
	{
		$nBaris = count($this->nilaiAwal);
		$nKolom = count($this->nilaiAwal[0]);

		for ($i=0; $i < $nBaris; $i++) {
			for ($j=0; $j < $nKolom; $j++) { 
				$this->matriksNormalisasi[$i][$j] = ($this->nilaiAwal[$i][$j]/$this->jumlah[$j]);
			}
		}
	}

	public function setNormToData($colNRead,$colNLis,$colNSt)
	{
		$nData = count($this->data);
		for ($i=0; $i < $nData; $i++) {
			$this->data[$i][$colNRead] = $this->matriksNormalisasi[$i][0];
			$this->data[$i][$colNLis] = $this->matriksNormalisasi[$i][1];
			$this->data[$i][$colNSt] = $this->matriksNormalisasi[$i][2];
		}
	}

	public function hitungNormTerbobot($bobot)
	{
		$nBaris = count($this->matriksNormalisasi);
		$nKolom = count($this->matriksNormalisasi[0]);

		for ($i=0; $i < $nBaris; $i++) {
			for ($j=0; $j < $nKolom; $j++) { 
				$this->matriksNormalisasiTerbobot[$i][$j] = ($this->matriksNormalisasi[$i][$j]*$bobot[$j]);
			}
		}
	}

	public function setNormBToData($colBRead,$colBLis,$colBSt)
	{
		$nData = count($this->data);
		for ($i=0; $i < $nData; $i++) {
			$this->data[$i][$colBRead] = $this->matriksNormalisasiTerbobot[$i][0];
			$this->data[$i][$colBLis] = $this->matriksNormalisasiTerbobot[$i][1];
			$this->data[$i][$colBSt] = $this->matriksNormalisasiTerbobot[$i][2];
		}
	}

	public function setMaxMin()
	{
		$nBaris = count($this->matriksNormalisasiTerbobot);
		$nKolom = count($this->matriksNormalisasiTerbobot[0]);
		$reading = array();
		$listening = array();
		$structure = array();

		for ($j=0; $j < $nBaris; $j++) { 
				$reading[] = $this->matriksNormalisasiTerbobot[$j][0];
				$listening[] = $this->matriksNormalisasiTerbobot[$j][1];
				$structure[] = $this->matriksNormalisasiTerbobot[$j][2];
		}

		$this->maxMin["max"][0] = max($reading);
		$this->maxMin["max"][1] = max($listening);
		$this->maxMin["max"][2] = max($structure);

		$this->maxMin["min"][0] = min($reading);
		$this->maxMin["min"][1] = min($listening);
		$this->maxMin["min"][2] = min($structure);
	}

	public function setMaxMinToData($colMaxRead,$colMaxLis,$colMaxSt,$colMinRead,$colMinLis,$colMinSt)
	{
		$nData = count($this->data);
		for ($i=0; $i < $nData; $i++) {
			$this->data[$i][$colMaxRead] = $this->maxMin["max"][0];
			$this->data[$i][$colMaxLis] = $this->maxMin["max"][1];
			$this->data[$i][$colMaxSt] = $this->maxMin["max"][2];

			$this->data[$i][$colMinRead] = $this->maxMin["min"][0];
			$this->data[$i][$colMinLis] = $this->maxMin["min"][1];
			$this->data[$i][$colMinSt] = $this->maxMin["min"][2];
		}
	}

	public function hitungSeparationMeasure()
	{
		$nBaris = count($this->matriksNormalisasiTerbobot);
		$nKolom = count($this->matriksNormalisasiTerbobot[0]);

		for ($i=0; $i < $nBaris; $i++) { 
			$totalMax = 0;
			$totalMin = 0;
			for ($j=0; $j < $nKolom; $j++) { 
				$normMax = $this->matriksNormalisasiTerbobot[$i][$j]-$this->maxMin["max"][$j];
				$totalMax += pow($normMax, 2);

				$normMin = $this->matriksNormalisasiTerbobot[$i][$j]-$this->maxMin["min"][$j];
				$totalMin += pow($normMin, 2);
			}
			$this->nilaiSeparationMeasure[$i][0] = sqrt($totalMax);
			$this->nilaiSeparationMeasure[$i][1] = sqrt($totalMin);
		}
	}

	public function setSMToData($colMax,$colMin)
	{
		$nData = count($this->data);
		for ($i=0; $i < $nData; $i++) { 
			$this->data[$i][$colMax] = $this->nilaiSeparationMeasure[$i][0];
			$this->data[$i][$colMin] = $this->nilaiSeparationMeasure[$i][1];
		}
	}

	public function hitungNilaiPreferensi()
	{
		$nBaris = count($this->nilaiSeparationMeasure);

		for ($i=0; $i < $nBaris; $i++) {
			$this->nilaiPreferensi[$i] = round($this->nilaiSeparationMeasure[$i][1]/($this->nilaiSeparationMeasure[$i][0]+$this->nilaiSeparationMeasure[$i][1]),9);
		}
	}

	public function setNilaiPreferensiToData($col)
	{
		$nData = count($this->data);
		for ($i=0; $i < $nData; $i++) { 
			$this->data[$i][$col] = $this->nilaiPreferensi[$i];
		}
	}

}