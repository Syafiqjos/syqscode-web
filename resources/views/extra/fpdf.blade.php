<?php
require('lib/fpdf182/fpdf.php');

// Begin with regular font
$pdf = new FPDF('p','mm','A4');
$pdf->AddPage();
$pdf->Image('http://smppgri1buduran.com/jpg/logopgri.png',10,10,33,42);
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(55,12);
$pdf->Cell(0,10,'YPLP DASAR DAN MENENGAH - PGRI',0,1,'C');
$pdf->SetXY(55,18);
$pdf->Cell(0,10,'SEKOLAH MENENGAH PERTAMA ( SMP ) "PGRI 1"',0,1,'C');
$pdf->SetXY(55,24);
$pdf->Cell(0,10,'TERAKREDITASI "A"',0,1,'C');
$pdf->SetXY(55,36);
$pdf->Cell(0,10,'JALAN SIWALANPANJI NP.3 TELP.(031)8961321 BUDURAN - SIDOARJO',0,1,'C');
$pdf->SetXY(55,42);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,10,'Kode Pos :61251',0,1,'C');

$pdf->Rect(8,10,195,42);

$pdf->Rect(8,53,195,8);
$pdf->Cell(50,10,'NSS : 20405201022',0,0,'L');
$pdf->Cell(142,10,'NDS : 20050214001',0,1,'R');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'PENCAPAIAN KOMPETENSI SISWA',0,1,'C');

$pdf->SetFont('Arial','',11);
$pdf->SetY(71);
$pdf->Cell(0,9,'Nama Sekolah     :      SMP PGRI 1 BUDURAN',0,0,'L');
$pdf->SetX(148);
$pdf->Cell(0,9,'Kelas                :     3',0,1,'L');

$pdf->SetY(78);
$pdf->Cell(0,9,'Alamat                 :      Jl. Siwalanpanji No. 3 Buduran',0,0,'L');
$pdf->SetX(148);
$pdf->Cell(0,9,'Semester         :     3(tiga)/Ganjil',0,1,'L');

$pdf->SetY(85);
$pdf->Cell(0,9,'Nama Siswa        :      Kruziik Staadnau',0,0,'L');
$pdf->SetX(148);
$pdf->Cell(0,9,'Tahun Ajaran   :     2020/2021',0,1,'L');

$pdf->SetY(92);
$pdf->Cell(0,9,'NIS/NISN             :     1/2',0,1,'L');

$pdf->SetFillColor(255);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'A. Nilai Sikap',0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(12,10,'No.',1,0,'C');
$pdf->Cell(30,10,'Sikap',1,0,'C');
$pdf->Cell(40,10,'Predikat',1,0,'C');
$pdf->Cell(110,10,'Deskripsi',1,1,'C');
$pdf->Cell(12,15,'1',1,0,'C');
$pdf->Cell(30,15,'Spiritual',1,0,'C');
$pdf->Cell(40,15,'A',1,0,'C');
$pdf->MultiCell(110,5,'Selalu berdoa sebelum dan sesudah melakukan kegiatan; ketaatan beribadah serta menjaga lingkungan hidup di sekitar satuan pendidikan mulai berkembang.',1,1,'L',false);
$pdf->Cell(12,15,'2',1,0,'C');
$pdf->Cell(30,15,'Sosial',1,0,'C');
$pdf->Cell(40,15,'B',1,0,'C');
$pdf->MultiCell(110,5,'Selalu berdoa sebelum dan sesudah melakukan kegiatan; ketaatan beribadah serta menjaga lingkungan hidup di sekitar satuan pendidikan mulai berkembang.',1,1,'L',false);

$pdf->Cell(0,10,'',0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'B. Nilai Pengetahuan dan Keterampilan',0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(12,10,'No.',1,0,'C');
$pdf->Cell(64,10,'Mata Pelajaran',1,0,'C');
$pdf->Cell(36,10,'Nilai Pengetahuan',1,0,'C');
$pdf->Cell(22,10,'Predikat',1,0,'C');
$pdf->Cell(36,10,'Nilai Keterampilan',1,0,'C');
$pdf->Cell(22,10,'Predikat',1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Kelompok A',0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(12,10,'1',1,0,'C');
$pdf->Cell(64,10,'Pendidikan Agama dan Budi Pekerti',1,0,'L');
$pdf->Cell(36,10,'1',1,0,'C');
$pdf->Cell(22,10,'D',1,0,'C');
$pdf->Cell(36,10,'2',1,0,'C');
$pdf->Cell(22,10,'C',1,1,'C');

$pdf->Cell(12,10,'2',1,0,'C');
$pdf->Cell(64,10,'PPKN',1,0,'L');
$pdf->Cell(36,10,'1',1,0,'C');
$pdf->Cell(22,10,'D',1,0,'C');
$pdf->Cell(36,10,'2',1,0,'C');
$pdf->Cell(22,10,'C',1,1,'C');

$pdf->Cell(12,10,'3',1,0,'C');
$pdf->Cell(64,10,'Bahasa Indonesia',1,0,'L');
$pdf->Cell(36,10,'1',1,0,'C');
$pdf->Cell(22,10,'D',1,0,'C');
$pdf->Cell(36,10,'2',1,0,'C');
$pdf->Cell(22,10,'C',1,1,'C');

$pdf->Cell(12,10,'4',1,0,'C');
$pdf->Cell(64,10,'Matematika',1,0,'L');
$pdf->Cell(36,10,'1',1,0,'C');
$pdf->Cell(22,10,'D',1,0,'C');
$pdf->Cell(36,10,'2',1,0,'C');
$pdf->Cell(22,10,'C',1,1,'C');

$pdf->Cell(12,10,'5',1,0,'C');
$pdf->Cell(64,10,'Ilmu Pengetahuan Alam',1,0,'L');
$pdf->Cell(36,10,'1',1,0,'C');
$pdf->Cell(22,10,'D',1,0,'C');
$pdf->Cell(36,10,'2',1,0,'C');
$pdf->Cell(22,10,'C',1,1,'C');

$pdf->Cell(12,10,'6',1,0,'C');
$pdf->Cell(64,10,'Ilmu Pengetahuan Sosial',1,0,'L');
$pdf->Cell(36,10,'1',1,0,'C');
$pdf->Cell(22,10,'D',1,0,'C');
$pdf->Cell(36,10,'2',1,0,'C');
$pdf->Cell(22,10,'C',1,1,'C');

$pdf->Cell(12,10,'7',1,0,'C');
$pdf->Cell(64,10,'Bahasa Inggris',1,0,'L');
$pdf->Cell(36,10,'1',1,0,'C');
$pdf->Cell(22,10,'D',1,0,'C');
$pdf->Cell(36,10,'2',1,0,'C');
$pdf->Cell(22,10,'C',1,1,'C');

$pdf->Cell(12,10,'7',0,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Kelompok B',0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(12,10,'8',1,0,'C');
$pdf->Cell(64,10,'Seni Budaya',1,0,'L');
$pdf->Cell(36,10,'1',1,0,'C');
$pdf->Cell(22,10,'D',1,0,'C');
$pdf->Cell(36,10,'2',1,0,'C');
$pdf->Cell(22,10,'C',1,1,'C');

$pdf->Cell(12,7,'9','LTR',0,'C');
$pdf->Cell(64,7,"Pendidikan Jasmani, Olahraga, dan",'LTR',0,'L');
$pdf->Cell(36,7,'1','LTR',0,'C');
$pdf->Cell(22,7,'D','LTR',0,'C');
$pdf->Cell(36,7,'2','LTR',0,'C');
$pdf->Cell(22,7,'C','LTR',1,'C');

$pdf->Cell(12,5,'','LBR',0,'C');
$pdf->Cell(64,5,"Kesehatan",'LBR',0,'L');
$pdf->Cell(36,5,'','LBR',0,'C');
$pdf->Cell(22,5,'','LBR',0,'C');
$pdf->Cell(36,5,'','LBR',0,'C');
$pdf->Cell(22,5,'','LBR',1,'C');

$pdf->Cell(12,10,'10',1,0,'C');
$pdf->Cell(64,10,'Prakarya',1,0,'L');
$pdf->Cell(36,10,'1',1,0,'C');
$pdf->Cell(22,10,'D',1,0,'C');
$pdf->Cell(36,10,'2',1,0,'C');
$pdf->Cell(22,10,'C',1,1,'C');

$pdf->Cell(12,10,'11',1,0,'C');
$pdf->Cell(64,10,'Bahasa Daerah',1,0,'L');
$pdf->Cell(36,10,'1',1,0,'C');
$pdf->Cell(22,10,'D',1,0,'C');
$pdf->Cell(36,10,'2',1,0,'C');
$pdf->Cell(22,10,'C',1,1,'C');

$pdf->Cell(12,10,'12',1,0,'C');
$pdf->Cell(64,10,'Baca Tulis Al-Quran (BTQ)',1,0,'L');
$pdf->Cell(36,10,'1',1,0,'C');
$pdf->Cell(22,10,'D',1,0,'C');
$pdf->Cell(36,10,'2',1,0,'C');
$pdf->Cell(22,10,'C',1,1,'C');

$pdf->Cell(12,10,'13',1,0,'C');
$pdf->Cell(64,10,'Muatan Lokal',1,0,'L');
$pdf->Cell(36,10,'1',1,0,'C');
$pdf->Cell(22,10,'D',1,0,'C');
$pdf->Cell(36,10,'2',1,0,'C');
$pdf->Cell(22,10,'C',1,1,'C');

$pdf->Cell(0,10,'',0,1);

$pdf->SetFont('Arial','BI',12);
$pdf->Cell(0,10,'Keputusan',0,1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,'Berdasarkan pencapaian kompetensi pada semester ke-2 dan ke-3, siswa ditetapkan*):',0,1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Naik ke kelas 1 ( Satu ), Tinggal di kelas ( 1 )',0,1);

$pdf->Cell(0,10,'',0,1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,'*) Coret yang tidak perlu.',0,1);

$pdf->SetX(100);
$pdf->Cell(0,10,'Mengetahui',0,1,'C');
$pdf->SetX(100);
$pdf->Cell(0,10,'Kepala SMP PGRI 1 Buduran',0,1,'C');
$pdf->Cell(0,40,'',0,1);
$pdf->SetFont('Arial','B',12);
$pdf->SetX(100);
$pdf->Cell(0,10,'Indrajayanti Ratnaningsih,S.Si, M.Pd',0,1,'C');

$pdf->Image('http://smppgri1buduran.com/jpg/tandastem.png',103,162,92,40);

$pdf->Output('D','Something.pdf');
?>
<html>
gta
</html>
