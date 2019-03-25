<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Income_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
 
    public function get_income_list(){
        
        $this->db->select('I.*, IH.title AS head, AY.session_year');
        $this->db->from('invoices AS I');        
        $this->db->join('invoice_logs AS IL', 'IL.invoice_id = I.id', 'left');
        $this->db->join('income_heads AS IH', 'IH.id = IL.income_head_id', 'left');
        $this->db->join('academic_years AS AY', 'AY.id = I.academic_year_id', 'left');
        $this->db->where('I.invoice_type', 'general'); 
             
        return $this->db->get()->result();        
    }
    
    public function get_single_income($id){
        
        $this->db->select('I.*, IH.title AS head, IH.id as income_head_id, AY.session_year, T.payment_method, T.bank_name, T.cheque_no');
        $this->db->from('invoices AS I'); 
        $this->db->join('invoice_logs AS IL', 'IL.invoice_id = I.id', 'left');
        $this->db->join('income_heads AS IH', 'IH.id = IL.income_head_id', 'left');
        $this->db->join('transactions AS T', 'T.invoice_id = I.id', 'left');     
        $this->db->join('academic_years AS AY', 'AY.id = I.academic_year_id', 'left');
        $this->db->where('I.id', $id);       
       
        return $this->db->get()->row();        
    }
}
