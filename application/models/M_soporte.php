<?php

class M_soporte extends CI_Model {

    public function obtener_usuario($usuario) {

        $query = $this->db->query('SELECT * FROM usuario where cuenta=?', array($usuario));
        return $query->result_array();
    }

    public function obtener_pendientes() {
        $query = $this->db->query('select * from soporte where pendiente');
        return $query->result_array();
    }

    function insertar_soporte($data) {
        try {
            $this->db->insert('soporte', $data);
            $query = $this->db->query("SELECT currval('soporte_id_seq');");
            return $query->result_array();
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }

    function insertar_falla($data) {
        try {
            $this->db->insert('fallas', $data);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }

    public function obtener_catalogo_de_fallas() {
        $query = $this->db->query('select * from clasificador_soportes where estado');
        return $query->result_array();
    }

    public function obtener_datos_de_soporte($id_soporte) {
        $query = $this->db->query('select * from soporte where estado and id=?', $id_soporte);
        return $query->result_array();
    }

    public function obtener_datos_de_fallas($id_soporte) {
        $query = $this->db->query('select * 
from fallas 
inner join clasificador_soportes on fallas.id_clasificador_soportes = clasificador_soportes.id 
inner join soporte on soporte.id = fallas.id_soporte
where fallas.estado and clasificador_soportes.estado and fallas.id_soporte=?', $id_soporte);
        return $query->result_array();
    }

    public function actualizar_soporte($id_soporte, $detalle_servicio) {
        date_default_timezone_set('America/La_Paz');
        $data = array(
            'detalle_servicio' => $detalle_servicio,
            'fecha_hora_atencion' => date('Y-m-d H:i:s'),
            'tecnico_atencion' => $this->session->userdata('username'),
            'pendiente' => 'f'
        );

        $this->db->where('id', $id_soporte);
        $this->db->update('soporte', $data);
    }
public function obtener_casos_atendidos_por_tecnico() {
        $query = $this->db->query('select tecnico_atencion, count(tecnico_atencion) as cantidad
from soporte
group by tecnico_atencion
having count(tecnico_atencion)>1
order by 1');
        return $query->result_array();
    }
}
