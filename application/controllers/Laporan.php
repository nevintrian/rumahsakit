<?php
class Laporanpdf extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
    }

    function index()
    {
        $pdf = new FPDF('l', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string
        $pdf->Cell(190, 7, 'LAPORAN DATA PASIEN', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 7, 'DATA PASIEN RSU BHAKTI HUSADA', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20, 6, 'no_rm', 1, 0);
        $pdf->Cell(85, 6, 'nama_pasien', 1, 0);
        $pdf->Cell(27, 6, 'j_kel', 1, 0);
        $pdf->Cell(25, 6, 'alamat', 1, 1);
        $pdf->SetFont('Arial', '', 10);
        $pasien = $this->db->get('tabel_pasien')->result();
        foreach ($pasien as $row) {
            $pdf->Cell(20, 6, $row->no_rm, 1, 0);
            $pdf->Cell(85, 6, $row->nama_pasien, 1, 0);
            $pdf->Cell(27, 6, $row->j_kel, 1, 0);
            $pdf->Cell(25, 6, $row->alamat, 1, 1);
        }
        $pdf->Output();
    }
}
