<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Json extends CI_Controller
{

    public function index()
    {
        $berita = $this->Model_m->getListBerita();

        $data['data'] = array();
        $response = array();

        if (sizeof($berita) > 0) {
            foreach ($berita as $content) {
                $response['id'] = $content->id_berita;
                $response['judul'] = $content->judul_berita;
                $response['isi_berita'] = $content->isi_berita;
                $response['gambar'] = $content->gambar;
                $response['tgl_berita'] = date_format(date_create($content->tgl_berita), "d/m/Y H:i");

                array_push($data['data'], $response);
            }

            echo json_encode($data);
        } else {
            echo json_encode($data);
        }
    }

    public function get_berita($id = null)
    {
        $berita = $this->Model_m->getDetailBerita($id);
        $data['data'] = array();
        $response = array();

        if (sizeof($berita) > 0) {
            foreach ($berita as $key => $content) {
                $response['id'] = $content->id_berita;
                $response['isi_berita'] = $content->isi_berita;
                $response['judul'] = $content->judul_berita;
                $response['gambar'] = $content->gambar;
                $response['tgl_berita'] = date_format(date_create($content->tgl_berita), "d/m/Y H:i");

                array_push($data['data'], $response);
            }
            echo json_encode($data);
        } else {
            echo json_encode($data);
        }
    }


    public function cari_berita()
    {
        $berita = $this->Model_m->cariBerita($this->input->get('s'));
        $data['data'] = array();
        $response = array();

        if (sizeof($berita) > 0) {
            foreach ($berita as $key => $content) {
                $response['id'] = $content->id_berita;
                $response['isi_berita'] = $content->isi_berita;
                $response['judul'] = $content->judul_berita;
                $response['gambar'] = $content->gambar;
                $response['tgl_berita'] = date_format(date_create($content->tgl_berita), "d/m/Y H:i");

                array_push($data['data'], $response);
            }
            echo json_encode($data);
        } else {
            echo json_encode($data);
        }
    }
}
