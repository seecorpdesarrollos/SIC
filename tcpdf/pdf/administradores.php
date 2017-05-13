<?php

require_once "../../controllers/admin/adminController.php";
require_once "../../models/admin/adminModel.php";
require_once '../../models/conexion.php';
// require_once '../tcpdf.php';

class ImpresionSuscriptores
{

    public function imprimirSuscriptores()
    {
//         date_default_timezone_set('America/Argentina/Buenos_Aires');
        //         require_once 'tcpdf_include.php';

//         $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//         $pdf->AddPage();
        //         $dia = date('d-m-Y H:i');
        //         $a = $pdf->page;
        //         $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        //         $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        //         $html1 = <<<EOF

// <table>
        //         <tr>
        //         <td style="width:540px"><img src="images/back.jpg"></td>
        //                     $dia <br>
        //                     Pagina : $a

// </tr>

// <tr>
        //             <td width="200px"></td>
        //             <td style="width:140px"><img src="images/logsin.png"></td>
        //             <td width="200px"></td>
        //         </tr>
        //         </table>

// <table style="border: 1px solid #4AA0F1; text-align:center; line-height: 20px; font-size:10px">
        //         <tr>
        //             <td style="border: 1px solid #666; background-color:#4AA0F1; color:#fff">Nombre Administrador</td>
        //             <td style="border: 1px solid #666; background-color:#4AA0F1; color:#fff">Rol  Administrador</td>
        //             <td style="border: 1px solid #666; background-color:#4AA0F1; color:#fff">Fecha  Creado</td>
        //         </tr>
        //         </table>

// EOF;
        //         $pdf->writeHTML($html1, false, false, false, false, '');

        // $respuesta = Admin::imprimirController("administrador");

        // foreach ($respuesta as $item) {

        //     $html2 = <<<EOF
        //     <table style="border: 1px solid #333; text-align:center; line-height: 20px; font-size:10px">
        //         <tr>
        //             <td style="border: 1px solid #666;">$item[nombreAdmin]</td>
        //             <td style="border: 1px solid #666;">$item[rol]</td>
        //             <td style="border: 1px solid #666;">$item[fechaCreado]</td>
        //         </tr>
        //     </table>

// EOF;

//             $pdf->writeHTML($html2, false, false, false, false, '');

//         }

//         $pdf->Output('administradores.pdf');
        //

//============================================================+
        // File name   : example_001.php
        // Begin       : 2008-03-04
        // Last Update : 2013-05-14
        //
        // Description : Example 001 for TCPDF class
        //               Default Header and Footer
        //
        // Author: Nicola Asuni
        //
        // (c) Copyright:
        //               Nicola Asuni
        //               Tecnick.com LTD
        //               www.tecnick.com
        //               info@tecnick.com
        //============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
        require_once 'tcpdf_include.php';

// create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
        $pdf->SetCreator(PDF_CREATOR);

// set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

// set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

// set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once dirname(__FILE__) . '/lang/eng.php';
            $pdf->setLanguageArray($l);
        }

// ---------------------------------------------------------

// set default font subsetting mode
        $pdf->setFontSubsetting(true);

// Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $pdf->SetFont('', '', 14, '', true);

// Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

// set text shadow effect
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// Set some content to print
        $html = <<<EOD
       <table>
        <tr>
        <td style="width:540px"><img src="images/back.jpg"></td>

</tr>

<tr>
            <td width="200px"></td>
            <td style="width:140px"><img src="images/logsin.png"></td>
            <td width="200px"></td>
        </tr>
        </table>

<table style="border: 1px solid #4AA0F1; text-align:center; line-height: 20px; font-size:10px">
        <tr>
            <td style="border: 1px solid #666; background-color:#4AA0F1; color:#fff">Nombre Administrador</td>
            <td style="border: 1px solid #666; background-color:#4AA0F1; color:#fff">Rol  Administrador</td>
            <td style="border: 1px solid #666; background-color:#4AA0F1; color:#fff">Fecha  Creado</td>
        </tr>
        </table>
EOD;
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $respuesta = Admin::imprimirController("administrador");

        foreach ($respuesta as $item) {

            $html2 = <<<EOF
            <table style="border: 1px solid #333; text-align:center; line-height: 20px; font-size:10px">
                <tr>
                    <td style="border: 1px solid #666;">$item[nombreAdmin]</td>
                    <td style="border: 1px solid #666;">$item[rol]</td>
                    <td style="border: 1px solid #666;">$item[fechaCreado]</td>
                </tr>
            </table>


EOF;

// Print text using writeHTMLCell()
            $pdf->writeHTMLCell(0, 0, '', '', $html2, 0, 1, 0, true, '', true);
        }
// ---------------------------------------------------------

// Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('administradores.pdf', 'I');

//============================================================+
        // END OF FILE
        //============================================================+

    }

}

$a = new ImpresionSuscriptores();
$a->imprimirSuscriptores();
