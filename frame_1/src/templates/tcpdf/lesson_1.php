<?php
//============================================================+
// File name   : lesson_1.php
// Begin       : 2025-01-07
// Last Update : 2025-01-07
//
// Description : Dictionary
//               
//
// Author: XX
//
// (c) Copyright:
//               XX
//               XX.com LTD
//               www.xx.com
//               info@xx.com
//============================================================+

// Include the main TCPDF library
require_once 'this_config.php';
require_once TO_ROOT_CONFIG_DIR;
require_once TCPDF_CONFIG;
require_once TCPDF_CONFIG_MY_ALT;

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		$image_file = K_PATH_IMAGES.'logo_example.jpg';
		$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->setFont('helvetica', 'B', 20);
		// Title
		$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->setY(-15);
		// Set font
		$this->setFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
} // $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
/**
 *  $orientation='P', [P, L]
 *  $unit='mm', [px, mm, cm, in]
 *  $format='A4', 
 *  $unicode=true, 
 *  $encoding='UTF-8', 
 *  $diskcache=false, 
 *  $pdfa=false [1, 3]
 */

// Document
// 1. set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor(PDF_AUTHOR);
$pdf->setTitle('PDF Title');
$pdf->setSubject('TCPDF Dictionary');
$pdf->setKeywords('TCPDF, Dictionary');

// Header, Footer
// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'_1 Dictionary', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));
/**
 *  $header_logo='', 
 *  $header_logo_width=0, 
 *  $header_title='', 
 *  $header_string='', 
 *  $header_text_color=array(0,0,0), 
 *  $header_line_color=array(0,0,0)
 */

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
/**
 *  [
 *  $family, 
 *  $style='', 
 *  $size=null, --- 最少到這裡
 *  $fontfile='', 
 *  $subset='default', 
 *  $out=true
 *  ]
 */

// set margins
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);
/**
 *  $header_margin=10
 *  $footer_margin=10
 */

// 2. remove default header/footer
// $pdf->setPrintHeader(false);
// $pdf->setPrintFooter(false);

//------------------------------------------------ header end//

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);
/**
 *  $font
 */

$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
/**
 *  $left, 
 *  $top, 
 *  $right=null, -- ifnull = $left
 *  $keepmargins=false
 */

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
/**
 *  $auto (bool)
 *  $margin = 0
 */
// ----------------------------------------------------image
// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(TCPDF_LANG.'/eng.php')) {
	require_once(TCPDF_LANG.'/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
// PDF/A逼準會強制 false 字體子集禁用
// $pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->setFont('kozminproregular', '', 11);
/**
 *  $family, 中英'kozminproregular', 'msungstdlight'
 *  $style='', 'BIU'
 *  $size=null, = 12
 *  $fontfile='', (family and style, in lower case with no spaces)
 *  $subset='default', 
 *  $out=true
 */
// set general stretching (scaling) value 拉伸 %
$stretching = 100;
$pdf->setFontStretching($stretching);

// set general spacing value 間距 mm
$spacing = 0.254;
$pdf->setFontSpacing($spacing);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();
/**
 *  $orientation='', 
 *  $format='', 
 *  $keepmargins=false, 
 *  $tocpage=false -- 生成目錄用參數Table of Content
 */

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
/**
 *  [
 *  'enabled' => (bool) true enable shadow,
 *  'depth_w' => (float) shadow width,
 *  'depth_h' => (float) shadow height, 
 *  'color' => (array) shadow color or false to use stroke color; 
 *  'opacity' => (float) from 0 to 1 (opaque); 
 *  'blend_mode' => (string) blend mode, one of the following: Normal, Multiply, Screen, Overlay, Darken, Lighten, ColorDodge, ColorBurn, HardLight, SoftLight, Difference, Exclusion, Hue, Saturation, Color, Luminosity.
 *  ]
 */

// Set some content to print
$html = <<<EOD
<h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
<i>This is the first example of TCPDF library.</i>
<p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'J', true);
/**
 *  $w, $h, $x, $y, $html='', 
 *  $border=0, 
 *  $ln=0, -- 正常到這
 *  $fill=false, 
 *  $reseth=true, 
 *  $align='', L, R, C, J
 *  $autopadding=true
 */

// set some text to print
$txt = <<<EOD
TCPDF Example 002
Default page header and footer are disabled using setPrintHeader() and setPrintFooter() methods.
EOD;

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', 1);
/**
 *  $h, $txt, $link='', $fill=false, $align='' L, R, C, J , $ln=false, 
 *  $stretch=0, [1 scaling, 2 stretching -f, 3 spacing, 4 spacing -f]
 *  $firstline=false, 
 *  $firstblock=false, 
 *  $maxh=0, 
 *  $wadj=0, 
 *  $margin=null
 */

// ---------------------------------------------------------
// example using general stretching and spacing
for ($stretching = 90; $stretching <= 110; $stretching += 20) {
	for ($spacing = -0.254; $spacing <= 0.254; $spacing += 0.508) {
		
		$pdf->setFontStretching($stretching);
		$pdf->setFontSpacing($spacing);
		
		$pdf->Cell(0, 0, 'St '.$stretching.'%, Sp '.sprintf('%+.3F', $spacing).'mm, origino', 1, 1, 'C', 0, '', 0);
		$pdf->Cell(0, 0, 'St '.$stretching.'%, Sp '.sprintf('%+.3F', $spacing).'mm, scaling', 1, 1, 'C', 0, '', 1);
		$pdf->Cell(0, 0, 'St '.$stretching.'%, Sp '.sprintf('%+.3F', $spacing).'mm, scale -f', 1, 1, 'C', 0, '', 2);
		$pdf->Cell(0, 0, 'St '.$stretching.'%, Sp '.sprintf('%+.3F', $spacing).'mm, spacing', 1, 1, 'C', 0, '', 3);
		$pdf->Cell(0, 0, 'St '.$stretching.'%, Sp '.sprintf('%+.3F', $spacing).'mm, space -f', 1, 1, 'C', 0, '', 4);
		/**
		 *  $w, $h=0, $txt='', $border=0, $ln=0, $align='' L, R, C, J, 
		 * 	$fill=0, $link='', $stretch=0, 
		 * 	$ignore_min_height=false, $calign='T', $valign='M')
		 */
		
		$pdf->Ln(1);
		/**
		 *  $h=null, $cell=false 一個單位幾px
		 */
	}
}
// ---------------------------------------------------------
// MultiCell
// set cell padding
$pdf->setCellPaddings(2, 4, 6, 8); // LTRB
$pdf->setCellMargins(1, 1, 1, 1);
$pdf->setFillColor(255, 235, 235);

// set some text for example
$txt = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, 

sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';

// Multicell test
$pdf->MultiCell(58, 10, '[AR, VT]', 1, 'R', 1, 2, '', '', true, 0, false, true, 10, 'T');
$pdf->MultiCell(58, 10, '[AJ, VM]', 1, 'J', 0, 0, '' ,'', true, 0, false, true, 10, 'M');
$pdf->MultiCell(58, 10, '[AC, VB]', 1, 'C', 1, 1, '', '', true, 0, false, true, 10, 'B');
$pdf->MultiCell(58, 10, '[AL, VB]', 1, 'L', 1, 1, '', '', true, 0, false, true, 10, 'B');
/**
 *  $w, $h, $txt, $border=0, $align='J' LCR, 
 * 	$fill=0, $ln=1 [0不換行, 1換行, 2下一行縮排], 
 * 	$x='', $y='', 
 * 	$reseth=true, $stretch=0, $ishtml=false, 
 * 	$autopadding=true, $maxh=0, $valign='T' MB, $fit [true, false]
 */

$pdf->MultiCell(60, 30, '[FIT] '.$txt, 1, 'J', 1, 1, 125, 205, true, 0, false, true, 30, 'M', true);


// reset pointer to the last page
$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// ---------------------------------------------------------

// set font
$pdf->setFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
$html = '<h1>HTML Example</h1>
Some special characters: &lt; € &euro; &#8364; &amp; è &egrave; &copy; &gt; \\slash \\\\double-slash \\\\\\triple-slash
<h2>List</h2>
<ol>
	<li><img src="images/logo_example.png" alt="test alt attribute" width="30" height="30" border="0" /> test image</li>
	<li><b>b<i>bi<u>biu</u>bi</i>b</b></li>
	<li><a href="http://www.tecnick.com" dir="ltr">link to http://www.tecnick.com</a></li>
	<li>SUBLIST
		<ol>
			<li>row one
				<ul>
					<li>sublist</li>
				</ul>
			</li>
			<li>row two</li>
		</ol>
	</li>
	<li><del>line through</del></li>
	<li><font size="-3">font - 3</font></li>
	<li><sup>superscript</sup> normal <small>small text</small><sub>subscript</sub></li>
</ol>
<dl>
	<dt>Coffee</dt>
	<dd>Black hot drink</dd>
	<dt>Milk</dt>
	<dd>White cold drink</dd>
</dl>
<div style="text-align:center">IMAGES<br />
<img src="images/logo_example.png" alt="test alt attribute" width="100" height="100" border="0" /><img alt="test alt attribute" width="100" height="100" border="0" /><img src="images/logo_example.jpg" alt="test alt attribute" width="100" height="100" border="0" />
</div>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// test some inline CSS
$html = '<p>
<span style="color: rgb(0, 128, 64); text-decoration: underline line-through;">underline, line-trough</span>
<span style="background-color: rgb(255, 0, 0); color: rgb(255, 255, 255);">background</span>
<span style="font-size: xx-small;">xx-small</span>
<span style="font-size: x-small;">x-small</span>
<span style="font-size: small;">small</span>
<span style="font-size: medium;">medium</span>
<span style="font-size: large;">large</span>
<span style="font-size: x-large;">x-large</span>
<span style="font-size: xx-large;">xx-large</span>
</p>';

$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output();
// $pdf->Output('file_name.pdf', 'D');
// $pdf->Output('server_path/file_name.pdf', 'F');
// $pdf->Output('', 'S'); -- 可image base64 傳phpMailer, 或預覽, 或進資料庫
/**
 *  $name='doc.pdf', 
 *  $dest='I' Inling, Download, File, String
 */

//============================================================+
// END OF FILE
//============================================================+