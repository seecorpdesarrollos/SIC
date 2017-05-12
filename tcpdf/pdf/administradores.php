<?php

require_once "../../controllers/admin/adminController.php";
require_once "../../models/admin/adminModel.php";
require_once '../../models/conexion.php';

class ImpresionSuscriptores
{

    public function imprimirSuscriptores()
    {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        require_once 'tcpdf_include.php';

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->AddPage();
        $dia = date('d-m-Y H:i');

        $html1 = <<<EOF

<table>
<tr>
<td style="width:540px"><img src="images/back.jpg"></td>
            $dia

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

EOF;
        $pdf->writeHTML($html1, false, false, false, false, '');

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

            $pdf->writeHTML($html2, false, false, false, false, '');

        }

        $pdf->Output('administradores.pdf');

    }

}

$a = new ImpresionSuscriptores();
$a->imprimirSuscriptores();
