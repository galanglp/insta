<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ahp {

    private $kriteria = array();
    private $nilaiKepentingan = array();
    private $matriksPerbandingan = array();
    private $matriksNormalisasi = array();
    private $jumlah = array();
    private $jumlahNorm = array();
    private $vektorPrioritas = array();
    private $hasilKali = array();
    private $hasilBagi = array();
    private $lambda = 0;
    private $consistencyIndex = 0;
    private $indexRandom = 0;
    private $consistencyRatio = 0;

    public function setKriteria($kriteria)
    {
        array_push($this->kriteria, $kriteria);
    }

    public function getKriteria()
    {
        return $this->kriteria;
    }

    public function setNilaiKepentingan($kriteria,$nilai,$kriteria2)
    {
        $nilaiKepentingan = [
          'kriteria' => $kriteria,
          'nilai' => $nilai,
          'terhadap' => $kriteria2
        ]; 
        array_push($this->nilaiKepentingan, (object)$nilaiKepentingan);
    }

    public function getNilaiKepentingan()
    {
        return $this->nilaiKepentingan;
    }

    public function setMatriksPerbandingan()
    {
        $nKriteria = count($this->kriteria);
        $col = 0;
        $row = 0;
        foreach ($this->nilaiKepentingan as $nilai) {
            for ($i=0; $i < $nKriteria; $i++) { 
                if ($nilai->kriteria == $this->kriteria[$i]) {
                    $row = $i;
                }
                if ($nilai->terhadap == $this->kriteria[$i]) {
                    $col = $i;
                }
            }

            $this->matriksPerbandingan[$row][$col] = $nilai->nilai;
            $this->matriksPerbandingan[0][0] = 1;
            $this->matriksPerbandingan[1][1] = 1;
            $this->matriksPerbandingan[2][2] = 1;
            $this->matriksPerbandingan[$col][$row] = (1/$nilai->nilai);
        }
    }

    public function getMatriksPerbandingan()
    {
        return $this->matriksPerbandingan;
    }

    public function hitungJumlah()
    {
        $this->jumlah = array();
        for ($i=0; $i < count($this->matriksPerbandingan); $i++) {
            $total = 0; 
            for ($j=0; $j < count($this->matriksPerbandingan); $j++) {
                $total += $this->matriksPerbandingan[$j][$i];
            }
            array_push($this->jumlah, $total);
        }
        
    }

    public function getJumlah()
    {
        return $this->jumlah;
    }

    public function hitungNormalisasi()
    {
        for ($i=0; $i < count($this->matriksPerbandingan); $i++) { 
            for ($j=0; $j < count($this->matriksPerbandingan); $j++) { 
                $this->matriksNormalisasi[$i][$j] = $this->matriksPerbandingan[$i][$j]/$this->jumlah[$j];
            }
        }
    }

    public function getMatriksNormalisasi()
    {
        return $this->matriksNormalisasi;
    }

    public function hitungJumlahNorm()
    {
        $this->jumlahNorm = array();
        for ($i=0; $i < count($this->matriksNormalisasi); $i++) {
            $total = 0; 
            for ($j=0; $j < count($this->matriksNormalisasi); $j++) {
                $total += $this->matriksNormalisasi[$i][$j];
            }
            array_push($this->jumlahNorm, $total);
        }
    }

    public function getJumlahNorm()
    {
        return $this->jumlahNorm;
    }

    public function hitungVektorPrioritas()
    {
        for ($i=0; $i < count($this->jumlahNorm); $i++) { 
            $this->vektorPrioritas[$i] = $this->jumlahNorm[$i]/3;
        }
    }

    public function getVektorPrioritas()
    {
        return $this->vektorPrioritas;
    }

    public function setHasilKali()
    {
        for ($i=0; $i < count($this->matriksPerbandingan); $i++) { 
            $total = 0;
            for ($j=0; $j < count($this->matriksPerbandingan[$i]); $j++) { 
                $total += $this->matriksPerbandingan[$i][$j]*$this->vektorPrioritas[$j];
            }
            array_push($this->hasilKali, $total);
        }
    }

    public function getHasilKali()
    {
        return $this->hasilKali;
    }

    public function setHasilBagi()
    {
        for ($i=0; $i < count($this->vektorPrioritas); $i++) { 
            array_push($this->hasilBagi, $this->hasilKali[$i]/$this->vektorPrioritas[$i]);
        }
    }

    public function getHasilBagi()
    {
        return $this->hasilBagi;
    }

    public function setLambda()
    {
        $total = 0;
        for ($i=0; $i < count($this->hasilBagi); $i++) { 
            $total += $this->hasilBagi[$i];
        }

        $this->lambda = $total/count($this->hasilBagi);
    }

    public function getLambda()
    {
        return $this->lambda;
    }

    public function setConsistencyIndex()
    {
        $this->consistencyIndex = (float) (($this->lambda-count($this->kriteria))/(count($this->kriteria)-1));
    }

    public function getConsistencyIndex()
    {
        return $this->consistencyIndex;
    }

    public function setIndexRandom()
    {
        $this->indexRandom = (float) (1.98*(count($this->kriteria)-2)/count($this->kriteria));
    }

    public function getIndexRandom()
    {
        return $this->indexRandom;
    }

    public function setConsistencyRatio()
    {
        $this->consistencyRatio = (float) ($this->consistencyIndex/$this->indexRandom);
    }

    public function getConsistencyRatio()
    {
        return $this->consistencyRatio;
    }
    
}