<?php

class Series {

  public $id;
  public $category_id;
  public $category;
  public $series_name;
  public $series_title_id;
  public $series_title;
  public $theme_id;
  public $theme;
  public $price_id;
  public $price;
  public $stock;
  public $release;
  public $end_time;
  public $series_label;


  public function getInfo(){

      require DB;
      $pdo = connectDB();

      $sql = "
        select 
        s.id,
        s.category_id, 
        c.category,
        s.name_title_id series_title_id, 
        st.name_title series_title, 
        s.name series_name, 
        s.theme_id, 
        t.theme,
        s.price_id, 
        p.price, 
        s.stock, 
        s.release_time, 
        s.end_time, 
        s.series_label 
        from (
          select *
          from Series
          where id not in (5, 6, 30)
        ) as s
        left join Category c on s.category_id = c.id
        left join SeriesTitle st on s.name_title_id = st.id
        left join Theme t on s.theme_id = t.id
        left join Price p on s.price_id = p.id
      ";
      $stmt = $pdo->prepare($sql);
      
      try {

          $stmt->execute();
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          // return json_encode($this);

      // echo '查詢資料成功！';

      } catch (PDOException $e) {

        echo '查詢資料失敗：' . $e->getMessage();
        exit;

      }
      require_once __DIR__ . '/../../config/config.php';
      require_once(TCPDF_TEMPLATE . 'form.php');

      $pdf = new PDF_Template('L', 'mm', 'A4', true, 'UTF-8', false);
      $pdf->setPrintHeader(false);
      $pdf->setPrintFooter(false);
      $pdf->AddPage();

      $form_name = 'Series Form';
      // $json = file_get_contents('MOCK_DATA.json');
      $json = json_encode($result);
      $size = [15, 15, 15, 15, 55, 35, 10, 30, 10, 10, 10, 30, 10, 15];
      $pdf->generate_pdf_table($json, $form_name, $size);

      // output
      $pdf->Output();

      }

}