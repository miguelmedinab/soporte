<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Formulario extends CI_Controller {

    public function index() {
        $data['catalogo_de_fallas'] = $this->M_soporte->obtener_catalogo_de_fallas();
        $data['contenido'] = 'formulario_de_registro';
        $this->load->view('plantilla/template', $data);
    }

    public function atencion($id_soporte) {
        if (!is_null($this->session->userdata('username'))) {
            $data['info_soporte'] = $this->M_soporte->obtener_datos_de_soporte($id_soporte);
            $data['info_fallas'] = $this->M_soporte->obtener_datos_de_fallas($id_soporte);
            $data['contenido'] = 'formulario_de_atencion';
            $this->load->view('plantilla/template', $data);
        } else {
            header("Location: " . base_url());
        }
    }

    public function registrar_atencion() {
        if (!is_null($this->session->userdata('username'))) {
            $this->M_soporte->actualizar_soporte($this->input->post('id_soporte'), $this->input->post('descripcion_de_solucion'));
            //echo(header("Location: " . base_url('inicio/cargar_cuadro_de_mando')));
            $this->imprimir_formulario(38);
        } else {
            header("Location: " . base_url());
        }
    }

    public function cargar_formulario_de_registro() {
        $data['contenido'] = 'impresion_de_formulario';
        $this->load->view('plantilla/template', $data);
    }

    public function imprimir_formulario($id_soporte) {

        $info_soporte = $this->M_soporte->obtener_datos_de_soporte($id_soporte);
        $info_fallas = $this->M_soporte->obtener_datos_de_fallas($id_soporte);
        $fallas = '';
        foreach ($info_fallas as $falla) {
            $fallas = $fallas . $falla['descripcion'] . ', ';
        }
        $fallas = $fallas . $info_soporte[0]['falla_descriptiva'];
        //$direccion_imagen=base_url('images/LOGO-INE-2018-CENTRADO.png');
        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Miguel Medina');
        $pdf->SetTitle('Formulario de atencion');
        $pdf->SetSubject('impresion');
        $pdf->SetKeywords('soporte, PDF, ejemplo');

// remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

// set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
        $pdf->SetMargins(10, 10, 10);

// set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

// ---------------------------------------------------------
// set font
        $pdf->SetFont('times', 'BI', 20);

// add a page
        $pdf->AddPage();



// set some text to print
        $html = '

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title></title>
	<meta name="generator" content="LibreOffice 6.1.1.2 (Linux)"/>
	<meta name="author" content="Miguel Angel Medina Berdeja"/>
	<meta name="created" content="2019-08-13T15:41:00"/>
	<meta name="changedby" content="Miguel Angel Medina Berdeja"/>
	<meta name="changed" content="2019-08-13T16:19:00"/>
	<meta name="AppVersion" content="16.0000"/>
	<meta name="DocSecurity" content="0"/>
	<meta name="HyperlinksChanged" content="false"/>
	<meta name="LinksUpToDate" content="false"/>
	<meta name="ScaleCrop" content="false"/>
	<meta name="ShareDoc" content="false"/>
	
</head>
<body lang="es-BO" link="#000080" vlink="#800000" dir="ltr">
<table  style="font-size:10px ">
	
	<tr>
		<td width="122" valign="top" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p>
			
</p>
		</td>
		<td colspan="5" width="411" style="border: 1.00pt solid #000000"><p align="center" >
			<b>FORMULARIO DE SOPORTE TÉCNICO</b></p>
			<p align="center" style="margin-bottom: 0cm"><b>UNIDAD DE INFORMÁTICA</b></p>
			<p align="center"><b>ÁREA DE INFRAESTRUCTURA</b></p>
		</td>
		<td width="122" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm">
                    <p align="center" style="margin-bottom: 0cm"><font size="7"><b>NUMERO DE TICKET</b></font></p><p align="center"><font size="15" ><b>' . $info_soporte[0]['id'] . '</b></font></p>
		</td>
	</tr>
	<tr>
		<td colspan="7" width="655"  style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm" align="center"><p align="center">
			<b>DATOS DEL USUARIO</b></p>
		</td>
	</tr>
	<tr valign="top">
		<td   width="192" style="border: 1.00pt solid #000000" >
			NOMBRE Y APELLIDOS
		</td>
		<td colspan="2" width="254" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p>
                ' . $this->auth_ad->get_all_user_data($info_soporte[0]['solicitante'])['cn'][0] . '
			</p>
		</td>
		<td width="62" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p>
			CARGO:</p>
		</td>
		<td colspan="2" width="147" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p>
			' . $this->auth_ad->get_all_user_data($info_soporte[0]['solicitante'])['title'][0] . '
			</p>
		</td>
	</tr>
	<tr valign="top">
		<td colspan="2" width="192" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p>
			DIRECCIÓN/ UNIDAD</p>
		</td>
		<td colspan="5" width="463" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p>
			' . $this->auth_ad->get_all_user_data($info_soporte[0]['solicitante'])['department'][0] . '
			</p>
		</td>
	</tr>
	<tr>
		<td colspan="7" width="655" valign="top" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p align="center">
			<b>SOLICITUD</b></p>
		</td>
	</tr>
	<tr valign="top">
		<td colspan="2" width="192" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p>
			FECHA Y HORA DE LA SOLICITUD</p>
		</td>
		<td colspan="5" width="463" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p>
			<br/>
' . $info_soporte[0]['fecha_hora_solicitud'] . '
			</p>
		</td>
	</tr>
	<tr valign="top">
		<td colspan="2" width="192" height="38" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p>
			PROBLEMA REPORTADO</p>
		</td>
		<td colspan="5" width="463" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p>
			' . $fallas . '

			</p>
		</td>
	</tr>
	<tr>
		<td colspan="7" width="655" valign="top" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p align="center">
			<b>SOPORTE TÉCNICO REALIZADO</b></p>
		</td>
	</tr>
	<tr>
		<td colspan="7" width="655" height="51" valign="top" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p>
			' . $info_soporte[0]['detalle_servicio'] . '

			</p>
		</td>
	</tr>
	<tr valign="top">
		<td colspan="2" width="192" height="3" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p>
			TÉCNICO</p>
		</td>
		<td colspan="5" width="463" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p>
			' . $this->auth_ad->get_all_user_data($info_soporte[0]['tecnico_atencion'])['cn'][0] . '

			</p>
		</td>
	</tr>
	<tr valign="top">
		<td colspan="2" width="192" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p>
			FECHA Y HORA DE ATENCIÓN</p>
		</td>
		<td colspan="5" width="463" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p>
			' . $info_soporte[0]['fecha_hora_atencion'] . '
			</p>
		</td>
	</tr>
	<tr valign="top">
		<td colspan="2" width="192" height="22" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p>
			OBSERVACIONES DEL USUARIO</p>
		</td>
		<td colspan="5" width="463" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p>
			<br/>

			</p>
		</td>
	</tr>
	<tr valign="top">
		<td colspan="3" width="328" height="78" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p align="center">
			<font size="10" style="font-size: 8pt"><i>FIRMA Y SELLO DEL TÉCNICO</i></font></p>
		</td>
		<td colspan="4" width="327" style="border: 1.00pt solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.21cm; padding-right: 0.19cm"><p align="center">
			<font size="10" style="font-size: 8pt"><i>FIRMA Y SELLO DE
			CONFORMIDAD DE USUARIO</i></font></p>
		</td>
	</tr>
</table>
<p style="margin-bottom: 0.28cm; line-height: 108%"><br/>
<br/>

</p>
</body>
</html>';



// Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------
//Close and output PDF document
        $pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
    }

}
