<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function index() {
        $this->load->view('login');
    }

    public function autenticar() {

        $username = strtolower($this->input->post('usuario'));
        $password = $this->input->post('password');

        if ($this->auth_ad->login($username, $password)) {
            if ((count($this->M_soporte->obtener_usuario($username))) == 1) {
                if (($this->M_soporte->obtener_usuario($username)[0]['estado']) == 't')
                    $this->cargar_cuadro_de_mando();
            } else
                $this->cargar_formulario_de_pedido_de_soporte();
        } else {
            header("Location: " . base_url());
        }
    }

    public function cargar_cuadro_de_mando() {

        if (!is_null($this->session->userdata('username'))) {
            $data['cantidad_pendientes'] = $data['contenido'] = 'cuadro_de_mando';
$data['casos_atendidos']=$this->M_soporte->obtener_casos_atendidos_por_tecnico();
            $this->load->view('plantilla/template', $data);
        } else {
            header("Location: " . base_url());
        }
    }

    public function cargar_formulario_de_pedido_de_soporte() {

        if (!is_null($this->session->userdata('username'))) {
            $data['catalogo_de_fallas'] = $this->M_soporte->obtener_catalogo_de_fallas();
            $data['contenido'] = 'formulario_de_pedido_de_soporte';
            $this->load->view('plantilla/template', $data);
        } else {
            header("Location: " . base_url());
        }
    }

    public function cargar_notificacion() {
        if (!is_null($this->session->userdata('username'))) {
            date_default_timezone_set('America/La_Paz');
            $insertar_datos_soporte = array(
                'solicitante' => $this->session->userdata('username'),
                'registrador' => $this->session->userdata('username'),
                'fecha_hora_solicitud' => date('Y-m-d H:i:s'),
                'falla_descriptiva' => $this->input->post('descripcion_de_falla')
            );
            $numero_de_servicio = $this->M_soporte->insertar_soporte($insertar_datos_soporte);
            if (isset($_POST['ats'])) {
                foreach ($this->input->post('ats') as $value) {
                    $insertar_datos_falla = array(
                        'id_soporte' => $numero_de_servicio[0]['currval'],
                        'id_clasificador_soportes' => $value
                    );
                    $this->M_soporte->insertar_falla($insertar_datos_falla);
                }
            }
            $data['numero_de_servicio'] = $numero_de_servicio[0]['currval'];
            $data['contenido'] = 'notificacion';
            $this->load->view('plantilla/template', $data);
        } else {
            header("Location: " . base_url());
        }
    }

    public function cargar_notificacion_de_registro() {
        if (!is_null($this->session->userdata('username'))) {
            if (count($this->auth_ad->get_all_user_data($this->input->post('cuenta_solicitante'))) > 1) {
                 
                date_default_timezone_set('America/La_Paz');
                if ($this->input->post('descripcion_de_solucion') == '') {
                    $insertar_datos_soporte = array(
                        'solicitante' => $this->input->post('cuenta_solicitante'),
                        'registrador' => $this->session->userdata('username'),
                        'fecha_hora_solicitud' => date('Y-m-d H:i:s'),
                        'falla_descriptiva' => $this->input->post('descripcion_de_falla')
                    );
                } else {
                    $insertar_datos_soporte = array(
                        'solicitante' => $this->input->post('cuenta_solicitante'),
                        'fecha_hora_solicitud' => date('Y-m-d H:i:s'),
                        'fecha_hora_atencion' => date('Y-m-d H:i:s'),
                        'falla_descriptiva' => $this->input->post('descripcion_de_falla'),
                        'pendiente' => 'f',
                        'registrador' => $this->session->userdata('username'),
                        'tecnico_atencion' => $this->session->userdata('username'),
                        'detalle_servicio' => $this->input->post('descripcion_de_solucion')
                    );
                }
                $numero_de_servicio = $this->M_soporte->insertar_soporte($insertar_datos_soporte);
                if (isset($_POST['ats'])) {
                    foreach ($this->input->post('ats') as $value) {
                        $insertar_datos_falla = array(
                            'id_soporte' => $numero_de_servicio[0]['currval'],
                            'id_clasificador_soportes' => $value
                        );
                        $this->M_soporte->insertar_falla($insertar_datos_falla);
                    }
                }
                $data['numero_de_servicio'] = $numero_de_servicio[0]['currval'];
                $data['contenido'] = 'impresion_de_formulario';


                $this->load->view('plantilla/template', $data);
            } else {
                
                $data['contenido'] = 'notificacion_de_usuario_no_existente';
                $this->load->view('plantilla/template', $data);
            }
        } else {
            header("Location: " . base_url());
        }
    }

    public function salir() {
        $this->session->sess_destroy();
        header("Location: " . base_url());
    }

}
