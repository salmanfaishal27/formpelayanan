<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ExController extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    
    $this->load->model('ExModel');
  }
  
  public function index(){
    $data['datahistory'] = $this->ExModel->viewhistory();
    $this->load->view('history', $data);
  }
  
  public function export(){
    
    include APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php';
    
    $excel = new PHPExcel();
    
    $excel->getProperties()->setCreator('IVAN YAPPUTRA')
                 ->setLastModifiedBy('SALMAN FAISHAL')
                 ->setTitle("Data HISTORY")
                 ->setSubject("History")
                 ->setDescription("Laporan Semua Data History")
                 ->setKeywords("Data History");
   
    $style_col = array(
      'font' => array('bold' => true), 
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
      )
    );
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA HISTORY"); 
    $excel->getActiveSheet()->mergeCells('A1:L1'); 
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); 
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA"); 
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "BAGIAN"); 
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "PERMASALAHAN");
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "TANGGAL PERMINTAAN");
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "JAM PERMINTAAN");
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "STATUS");
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "CARA PENYELESAIAN");
    $excel->setActiveSheetIndex(0)->setCellValue('I3', "WAKTU PENGERJAAN");
    $excel->setActiveSheetIndex(0)->setCellValue('J3', "TANGGAPAN");
    $excel->setActiveSheetIndex(0)->setCellValue('K3', "TEKNISI");
    $excel->setActiveSheetIndex(0)->setCellValue('L3', "RATING");

    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
    
    $history = $this->ExModel->viewhistory();
    $no = 1;
    $numrow = 4;
    foreach($history as $data){
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->bagian);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->permasalahan);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->tanggal_permintaan);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->jam_permintaan);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->status);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->cara_penyelsaian);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->waktu_pengerjaan);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->tanggapan);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->teknisi);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->rating);
      
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
      
      $no++; 
      $numrow++; 
    }
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(5);
    
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    
    $excel->getActiveSheet(0)->setTitle("Laporan Data History");
    $excel->setActiveSheetIndex(0);
    
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data History.xlsx"'); 
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }
}