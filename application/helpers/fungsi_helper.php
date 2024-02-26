<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(! function_exists('menuaktif')){
    function menuaktif($nilai="",$def="")
    {
	    if($nilai==$def)
	    {
		    echo "active";
	    }else{

		}
    }
}

function getJK($id) {
	if ($id == "L") {
		echo "Laki-laki";
	}elseif ($id == "P") {
		echo "Perempuan";
	}else {
		echo "";
	}
}

function getGroup($id) {
	if ($id == "1") {
		echo "Administrator";
	}elseif ($id == "2") {
		echo "Petugas";
	}else {
		echo "Pasien";
	}
}

function getHitungUmur($tgl_lahir){
        $date1 = new DateTime(date('Y-m-d', strtotime($tgl_lahir)));
        $date2 = new DateTime(date('Y-m-d'));
        $interval = $date1->diff($date2);
        //echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days ";
        $data = array(
                'year'=>$interval->y,
                'month'=>$interval->m,
                'day'=>$interval->d
        );


        return $data['year'].' thn';
}

function getHitungUmur2($tgl_lahir){
        $date1 = new DateTime(date('Y-m-d', strtotime($tgl_lahir)));
        $date2 = new DateTime(date('Y-m-d'));
        $interval = $date1->diff($date2);
        //echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days ";
        $data = array(
                'year'=>$interval->y,
                'month'=>$interval->m,
                'day'=>$interval->d
        );


        return $data['year'].' thn '. $data['month'].' bln '.$data['day'].' hari';
}

if ( ! function_exists('tgl_indo'))
{
	function tglIndo($tgl)
	{
		@$ubah = gmdate($tgl, time()+60*60*8);
		@$pecah = explode("-",$ubah);
		@$tanggal = $pecah[2];
		@$bulan = bulan($pecah[1]);
		@$tahun = $pecah[0];
        if(empty($tgl) OR $tgl==""){
            return false;
        }else{
		return $tanggal.' '.$bulan.' '.$tahun;
        }
	}
}

if ( ! function_exists('bulan'))
{
	function bulan($bln)
	{
		switch ($bln)
		{
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}
}

if ( ! function_exists('bulan2'))
{
	function bulan2($bln)
	{
		switch ($bln)
		{
			case 1:
				return "Jan";
				break;
			case 2:
				return "Feb";
				break;
			case 3:
				return "Mar";
				break;
			case 4:
				return "Apr";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Jun";
				break;
			case 7:
				return "Jul";
				break;
			case 8:
				return "Agu";
				break;
			case 9:
				return "Sep";
				break;
			case 10:
				return "Okt";
				break;
			case 11:
				return "Nov";
				break;
			case 12:
				return "Des";
				break;
		}
	}
}

if ( ! function_exists('nama_hari'))
{
	function nama_hari($tanggal)
	{
		$ubah = gmdate($tanggal, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tgl = $pecah[2];
		$bln = $pecah[1];
		$thn = $pecah[0];

		$nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
		$nama_hari = "";
		if($nama=="Sunday") {$nama_hari="Minggu";}
		else if($nama=="Monday") {$nama_hari="Senin";}
		else if($nama=="Tuesday") {$nama_hari="Selasa";}
		else if($nama=="Wednesday") {$nama_hari="Rabu";}
		else if($nama=="Thursday") {$nama_hari="Kamis";}
		else if($nama=="Friday") {$nama_hari="Jumat";}
		else if($nama=="Saturday") {$nama_hari="Sabtu";}
		return $nama_hari;
	}
}
