<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PenggajianMarketing extends MY_Base{
    function __construct(){
        parent::__construct();
        $this->load->model('Karyawan_model');
		$this->load->model('Simpanan_model');
		$this->load->model('Setoransimpanan_model');
		$this->load->model('Pinjaman_model');
		$this->load->model('Jaminan_model');
		$this->load->model('Penggajian_model');
		$this->load->model('Aplikasi_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $active = urldecode($this->input->get('p', TRUE));
    
        switch ($active){
            case  1:
                $this->to_penggajianSimpanan();
                break;
            case  2:
                $this->to_penggajianSimkesan();
                break;
            case  3:
                $this->to_penggajianIvb();
                break;
            case  4:
                $this->to_penggajianPinjaman();
                break;
            default:
                $this->to_penggajianSimpanan();
                break;
        }
    } 

	public function to_penggajianSimpanan(){
		$karyawan = $this->Karyawan_model->get_kar_with(4);
		$data = array(
			'karyawan'=>$karyawan,
			'content'=>'backend/penggajian/penggajianMarketing/penggajianMarketing',
			'item'=>'penggajianMarketing_list.php',
			'active'=>1
		);
		$this->load->view(layout(), $data);
	}
	
	public function lihatGaji(){
		
		$all_bpkb_U_2008 = 0;
		$all_bpkb_A_2008 = 0;
		$mobil_bpkb_U_2008_10 = 0;
		$mobil_bpkb_A_2008_10 = 0;
		$bpkb_A_2008 = 0;
		$srtfkt_shbg = 0;
		$jml_setor 	 = 0;
		
		$kar_kode = urldecode($this->input->get('kode', TRUE));
		$save = urldecode($this->input->get('save', TRUE));
			if($save == '') $save = 0;
		$f = urldecode($this->input->get('f', TRUE));
        $t = urldecode($this->input->get('t', TRUE));
		
		$karyawan = $this->Karyawan_model->get_by_id($kar_kode);
		
		// HITUNG TOTAL SETORAN
		$simpanan = $this->Simpanan_model->get_by_kar_kode($kar_kode);
		foreach($simpanan as $s){
			$sim_kode = $s->sim_kode;
			$setoran = $this->Setoransimpanan_model->get_by_sim_kode($sim_kode, $f, $t);
			foreach($setoran as $st){
				$jml_setor += $st->ssi_jmlsetor;
			}
		}
		
		$y_in = date("Y", strtotime($karyawan->kar_tgl));
		$m_in = date("m", strtotime($karyawan->kar_tgl));
		$y_new = '2019';
		$m_new = '06';
		
		if($y_in <= $y_new && $m_in < $m_new){
			$gaji = $jml_setor * 3.5 / 100;
		}
		else{
			// HITUNG TOTAL APLIKASI
			$pinjaman = $this->Pinjaman_model->get_pin_marketing($kar_kode, $f, $t);
			foreach($pinjaman as $p){
				$pin_id = $p->pin_id;
				$jaminan = $this->Jaminan_model->get_jam_pin($pin_id);
				//echo "Pinjaman = ".$p->pin_id."<br>";
				
				foreach($jaminan as $j){
					//echo "Jaminan = ".$j->pin_id." ".$j->jej_id."<br>";
					
					if($p->pin_pinjaman >= 10000000 && $j->jej_id == 1 && $this->parsing($j->jam_unit) == 2){
						
						if($j->jam_tahunpembuatan < 2008){
							$mobil_bpkb_U_2008_10 += 1;
						}
						elseif($j->jam_tahunpembuatan >= 2008){
							$mobil_bpkb_A_2008_10 += 1;
						}
					}
					else{
						if($j->jej_id == 1 && $j->jam_tahunpembuatan < 2008){
							$all_bpkb_U_2008 += 1;
						}elseif($j->jej_id == 1 && $j->jam_tahunpembuatan >= 2008){
							$all_bpkb_A_2008 += 1;
						}elseif($j->jej_id == 2){
							$srtfkt_shbg += 1;
						}
					}
				}
			}
			$tot_aplikasi = $mobil_bpkb_U_2008_10 + $mobil_bpkb_A_2008_10 + $all_bpkb_U_2008 + $all_bpkb_A_2008 + $srtfkt_shbg;
			
			/*echo $mobil_bpkb_U_2008_10;
			echo $mobil_bpkb_A_2008_10;
			echo $all_bpkb_U_2008;
			echo $all_bpkb_A_2008;
			echo $srtfkt_shbg;*/
			
			if($jml_setor < 46000000){
				$gp = 750000;
			}
			elseif($jml_setor >= 46000000 && $jml_setor < 56000000){
				$gp = 1000000;
			}
			elseif($jml_setor >= 56000000 && $jml_setor < 66000000){
				$gp = 1250000;
			}
			elseif($jml_setor >= 66000000 && $jml_setor < 76000000){
				$gp = 1500000;
			}
			elseif($jml_setor >= 76000000 && $jml_setor < 86000000){
				$gp = 1750000;
			}
			elseif($jml_setor >= 86000000 && $jml_setor < 96000000){
				$gp = 2000000;
			}
			elseif($jml_setor >= 96000000 && $jml_setor <= 105000000){
				$gp = 2500000;
			}		
			$gaji = $gp
						+ ($mobil_bpkb_U_2008_10 * 130000)
						+ ($mobil_bpkb_A_2008_10 * 200000)
						+ ($all_bpkb_U_2008 * 80000)
						+ ($all_bpkb_A_2008 * 150000)
						+ ($srtfkt_shbg * 50000)
						+ ($tot_aplikasi * 20000);
			
			//echo "<br>".$gaji;
		}
		
		$karyawan_data = array(
			'kar_kode'=>$kar_kode,
			'kar_nama'=>$karyawan->kar_nama,
			'jab_kode'=>$karyawan->jab_kode,
			'kar_nohp'=>$karyawan->kar_nohp,
			'kar_alamat'=>$karyawan->kar_alamat,
		);
		
		$aplikasi = array(
			'tot_mobil_bpkb_U_2008_10'=>$mobil_bpkb_U_2008_10,
			'tot_mobil_bpkb_A_2008_10'=>$mobil_bpkb_A_2008_10,
			'tot_bpkb_U_2008'=>$all_bpkb_U_2008,
			'tot_bpkb_A_2008'=>$all_bpkb_A_2008,
			'tot_srtfkt_shbg'=>$srtfkt_shbg,
			'tot_aplikasi'=>$tot_aplikasi
		);
		
		$data = array(
			'karyawan'=>$karyawan_data,
			'aplikasi'=>$aplikasi,
			'gp'=>$gp,
			'gaji'=>$gaji,
			'target'=>$jml_setor,
			'content'=>'backend/penggajian/penggajianMarketing/penggajianMarketing',
			'item'=>'penggajianMarketing_detail.php',
			'f'=>$f,
			't'=>$t,
			'active'=>1
		);
		
	// SIMPAN GAJI
		if($save == 0){
			$this->load->view(layout(), $data);
		}elseif($save == 1){
			$penggajian = array(
				'pgg_kar_kode' => $kar_kode,
				'pgg_tgl_awal' => $f,
				'pgg_tgl_akhir' => $t,
				'pgg_tgl' => date('Y-m-d'), // today
			);
			$pgg_id = $this->Penggajian_model->insert($penggajian);
			
		// get jam_id
			$pinjaman = $this->Pinjaman_model->get_pin_marketing($kar_kode, $f, $t);
			$apl = array();
			foreach($pinjaman as $p){
				$pin_id = $p->pin_id;
				$jaminan = $this->Jaminan_model->get_jam_pin($pin_id);
				
				foreach($jaminan as $key=>$j){
					$apl[$key] = array(
						'apl_pgg_id' => $pgg_id,
						'apl_jam_id' => $j->jam_id
					);
				}//print_r($apl);
			}
			if($apl[$key] != null)
				$this->Aplikasi_model->save_batch($apl);
			redirect(site_url('PenggajianMarketing'));
		}
	}
	
	public function parsing($kalimat){
		$k = $kalimat;
		if(preg_match("/Motor/i", $k))
			return 1;
		elseif(preg_match("/Mobil/i", $k))
			return 2;
		//else
			//return 3;
	}

}

/* End of file Simpanan.php */
/* Location: ./application/controllers/Simpanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-26 14:02:35 */
/* http://harviacode.com */