<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RekapController extends BaseController
{
    private $profit;
    public function __construct()
    {
        session_start();

        if (!$_SESSION['user']) {
            return header("location: ".BASE_URL);
        }
        $profit = new Profit();
        $this->profit = $profit;
    }
    public function getIndex()
    {
        return $this->view('admin.rekap');
    }

    public function getRekap_data()
    {
        header('Content-Type: application/json');

        $rekap = $this->profit->all();
        $data = [];
        if ($rekap->num_rows > 0) {
            while ($row = $rekap->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            echo "0 results";
        }
        // print_r($data);
        echo json_encode(array('data' => $data));
    }

    public function postExport()
    {
        $date = $this->post('date');
        if ($date) {
            $dateArr = explode(' - ', $date);
            $rekap = $this->profit->rawQuery("SELECT * FROM `profits` where `date` >= '$dateArr[0]' && `date` <= '$dateArr[1]' ")->get();
            $nama_file = "Data Keuntungan_$dateArr[0]_$dateArr[1]";
        }else{
            $rekap = $this->profit->all();
            $nama_file = "Data Keuntungan";
        }
        
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', "DATA KEUNTUNGAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
            $sheet->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai F1
            $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
            $sheet->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
            // Buat header tabel nya pada baris ke 3
            $sheet->setCellValue('A3', "NO");
            $sheet->setCellValue('B3', "TANGGAL"); 
            $sheet->setCellValue('C3', "TOTAL"); 
            $sheet->setCellValue('D3', "WAKTU"); 
            $sheet->setCellValue('E3', "KARYAWAN"); 
            $sheet->setCellValue('F3', "KAS"); 
            $sheet->setCellValue('G3', "OWNER"); 
            
            $sheet->getStyle('A3');
            $sheet->getStyle('B3');
            $sheet->getStyle('C3');
            $sheet->getStyle('D3');
            $sheet->getStyle('E3');
            $sheet->getStyle('F3');
            $sheet->getStyle('G3');
            // Set height baris ke 1, 2 dan 3
            $sheet->getRowDimension('1')->setRowHeight(20);
            $sheet->getRowDimension('2')->setRowHeight(20);
            $sheet->getRowDimension('3')->setRowHeight(20);
            $no = 1; // Untuk penomoran tabel, di awal set dengan 1
            $row = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
            while ($data = mysqli_fetch_array($rekap)) { // Ambil semua data dari hasil eksekusi $sql
                $sheet->setCellValue('A' . $row, $no);
                $sheet->setCellValue('B' . $row, $data['date']);
                $sheet->setCellValue('C' . $row, $data['total']);
                $sheet->setCellValue('D' . $row, $data['daytime']);
                $sheet->setCellValue('E' . $row, $data['for_employee']);
                $sheet->setCellValue('F' . $row, $data['for_cash']);
                $sheet->setCellValue('G' . $row, $data['for_owner']);
                $sheet->getStyle('A' . $row);
                $sheet->getStyle('B' . $row);
                $sheet->getStyle('C' . $row);
                $sheet->getStyle('D' . $row);
                $sheet->getStyle('E' . $row);
                $sheet->getStyle('F' . $row);
                $sheet->getStyle('G' . $row);
                $no++; // Tambah 1 setiap kali looping
                $row++; // Tambah 1 setiap kali looping
            }
            $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
            $sheet->setTitle("Laporan Data Keuntungan");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="'.$nama_file.'.xlsx"');
            header('Cache-Control: max-age=0');
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
    }
}
