<?php defined('BASEPATH') or exit('No direct script access allowed');

class Crud extends CI_Model
{
    // Get All Data Num Rows
    public function ca($t)
    {
        return $this->db->get($t)->num_rows();
    }
   
    // Get All Data as Object
    public function ga($t)
    {
        return $this->db->get($t)->result();
    }
  
    // Get All Data as Object then Order By
    public function gao($t, $o)
    {
        return $this->db->order_by($o)->get($t)->result();
    }
   
    // Get All Data as Object with limit
    public function gl($t, $l, $f)
    {
        return $this->db->limit($l, $f)->get($t)->result();
    }
  
    // Get All Data as Object with limit then order bye
    public function glo($t, $l, $f, $o)
    {
        return $this->db->limit($l, $f)->order_by($o)->get($t)->result();
    }
 
    // Get All Data num rows with condiition
    public function cw($t, $w)
    {
        return $this->db->where($w)->get($t)->num_rows();
    }
   
    // Get All Data Num Rows with Like and Condition
    public function cwlike($t, $w, $like)
    {
        return $this->db->where($w)->like($like)->get($t)->num_rows();
    }
   
    // Get All Data as Object with Like Condition
    public function glike($t, $like)
    {
        return $this->db->like($like)->get($t)->result();
    }
  
    // Get All Data as Object with Join then order by
    public function gjwo($t, $tj, $c, $w, $o, $jj = 'LEFT')
    {
        return $this->db->join($tj, $tj . '.' . $c . ' = ' . $t . '.' . $c, $jj)->where($w)->order_by($o)->get($t)->result();
    }
  
    // Get All Data as Object with where condition
    public function gw($t, $w)
    {
        return $this->db->where($w)->get($t)->result();
    }
 
    // Get All Data as Object with Join and Where condition
    public function gjw($t, $tj, $c, $w, $jj = 'LEFT')
    {
        return $this->db->join($tj, $tj . '.' . $c . ' = ' . $t . '.' . $c, $jj)->where($w)->get($t)->result();
    }

    // Get All Data as Object with where condition then order by
    public function gwo($t, $w, $o)
    {
        return $this->db->where($w)->order_by($o)->get($t)->result();
    }
 
    // Get All Data as Object with where condition and limit
    public function gwl($t, $w, $l, $f)
    {
        return $this->db->where($w)->limit($l, $f)->get($t)->result();
    }
  
    public function gwlo($t, $w, $l, $f, $o)
    {
        return $this->db->where($w)->limit($l, $f)->order_by($o)->get($t)->result();
    }
 
    // Get All Data as Object with join, where condition and limit then order by
    public function gjwlo($t, $tj, $c, $w, $l, $f, $o, $jj = 'LEFT')
    {
        return $this->db->join($tj, $tj . '.' . $c . ' = ' . $t . '.' . $c, $jj)->where($w)->limit($l, $f)->order_by($o)->get($t)->result();
    }

    // Get All Data as Object with join, where condition, limit and line then order by
    public function gjwlikelo($t, $tj, $c, $w, $like, $l, $f, $o, $jj = 'LEFT')
    {
        return $this->db->join($tj, $tj . '.' . $c . ' = ' . $t . '.' . $c, $jj)->where($w)->like($like)->limit($l, $f)->order_by($o)->get($t)->result();
    } 

    // Get single data as object
    public function gd($t, $w)
    {
        return $this->db->where($w)->get($t)->row();
    }

    // Get single data as object twith where condition and order by
    public function gdo($t, $w, $o)
    {
        return $this->db->where($w)->order_by($o)->get($t)->row();
    }

    // Get single data as object with join and where condition
    public function gjd($t, $tj, $c, $w, $jj = 'LEFT')
    {
        return $this->db->join($tj, $tj . '.' . $c . ' = ' . $t . '.' . $c, $jj)->where($w)->get($t)->row();
    }
 
    // Get single data as object array with join and where condition
    public function gjda($t, $tj, $c, $w, $jj = 'LEFT')
    {
        return $this->db->join($tj, $tj . '.' . $c . ' = ' . $t . '.' . $c, $jj)->where($w)->get($t)->row_array();
    }
  
    // Get single data as object array with where condition
    public function gda($t, $w)
    {
        return $this->db->where($w)->get($t)->row_array();
    }

    // Get single data as object array with where condition then order by
    public function gdao($t, $w, $o)
    {
        return $this->db->where($w)->order_by($o)->get($t)->row_array();
    }
  
    // Get single data as object array with where condition
    public function gwra($t, $w)
    {
        return $this->db->where($w)->get($t)->result_array();
    }
 
    // Insert Data
    public function i($t, $d)
    {
        $this->db->insert($t, $d);
    }
  
    // Update Data with where condition
    public function u($t, $d, $w)
    {
        $this->db->where($w)->update($t, $d);
    }
  
    // Delete Data with where condition
    public function d($t, $i, $w)
    {
        $this->db->where($w, $i)->delete($t);
    }
   
    // Query
    public function q($q)
    {
        return $this->db->query($q);
    }
   
    // Run Query and get result as object
    public function qa($q)
    {
        return $this->db->query($q)->result();
    }
}
