<?php

class Dashboard extends CI_Controller
{

    public function index()
    {
        $data['berita_list'] = $this->Model_m->getListBerita();
        $this->load->view('dashboard', $data);

    }

    public function tulis_berita($id_berita = null)
    {
        if ($id_berita != null) {
            $data['content'] = $this->Model_m->getDetailBerita($id_berita);
        } else {
            $data['content'] = array();
        }
        $this->load->view('tulis', $data);
    }

    public function tulis_berita_process($status)
    {

        if ($status = "tambah") {
            $judul = $this->input->post("judul");
            $isi = $this->input->post("isi");

            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 0;
            $config['overwrite'] = true;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                echo $this->upload->display_errors();
            } else {
                $data = array('upload_data' => $this->upload->data());
                $arrayData = array(
                    'judul_berita' => $judul,
                    'isi_berita' => $isi,
                    'gambar' => $data['upload_data']['file_name'],
                );

                $insert = $this->Model_m->insertBerita($arrayData);
                if ($insert > 0) {
                    echo "<script type='text/javascript'>";
                    echo "alert('Data Berhasil Dimasukkan');";
                    echo "window.location.assign('" . site_url('dashboard') . "');";
                    echo "</script>";
                } else {

                }
            }
        } else {
            $judul = $this->input->post("judul");
            $isi = $this->input->post("isi");

            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 0;
            $config['overwrite'] = true;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $arrayData = array(
                    'judul_berita' => $judul,
                    'isi_berita' => $isi
                );
                $insert = $this->Model_m->insertBerita($arrayData);
                if ($insert > 0) {
                    echo "<script type='text/javascript'>";
                    echo "alert('Data Berhasil Dimasukkan');";
                    echo "window.location.assign('" . site_url('dashboard') . "');";
                    echo "</script>";
                } else {

                }
            } else {
                $data = array('upload_data' => $this->upload->data());
                $arrayData = array(
                    'judul_berita' => $judul,
                    'isi_berita' => $isi,
                    'gambar' => $data['upload_data']['file_name'],
                );

                $insert = $this->Model_m->insertBerita($arrayData);
                if ($insert > 0) {
                    echo "<script type='text/javascript'>";
                    echo "alert('Data Berhasil Dimasukkan');";
                    echo "window.location.assign('" . site_url('dashboard') . "');";
                    echo "</script>";
                } else {

                }
                
            }
        }
    }

    public function hapus_berita($id_berita)
    {
        $hapus = $this->Model_m->hapusBerita($id_berita);

        if ($hapus > 0) {
            echo "<script type='text/javascript'>";
            echo "alert('Data Berhasil Dihapus');";
            echo "window.location.assign('" . site_url('dashboard') . "');";
            echo "</script>";
        } else {

        }
    }

}
