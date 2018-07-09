<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller\Component;

use Cake\Controller\Component;

class SearchQueryComponent extends Component{

    public function getRequests($action,$parameter=null,$value=null){
            switch($action){
            case "index":
                $prev_action="index";
                $prev_value="All";
                $query_check="";
                break;
            case "pendingrequests":
                $prev_action="pendingrequests";
                 $prev_value="Pending";
                $query_check="Pending";
                break;
            case "approvedrequests":
                $prev_action="approvedgrequests";
                $prev_value="Approved";
                $query_check="Approved";
                break;
            case "paidrequests":
                $prev_action="paidrequests";
                $prev_value="Paid";
                $query_check="Paid";
                break;
            case "deniedrequests":
                $prev_action="deniedrequests";
                $prev_value="Denied";
                $query_check="Denied";
                break;
            default :
                return false;
        }
        $where_clause= null;
        if($parameter!= null && $value!=null){
        switch($parameter){
            case "username":
                $where_clause=["Requests.username LIKE" => "%$value%","Requests.funded LIKE"=>"$query_check"];
                break;
            case "author_name":
               $where_clause=["Requests.author_name LIKE" => "%$value%","Requests.funded LIKE"=>"$query_check"];
                break;
            case "publisher":
                $where_clause=["Requests.publisher LIKE" => "%$value%","Requests.funded LIKE"=>"$query_check"]; 
                break;
            default :
                return false;
        }
        }
        else{
            $where_clause=["Requests.funded LIKE"=>"%$query_check%"];
        }
        return $where_clause;
    }
    public function setCsvColumns($column_values,$table_name=null){
        foreach ($column_values as &$column_value) {
            if (((($key = array_search("id", $column_values))  !== false))||(($key = array_search("request_id", $column_values))  !== false) ||(($key = array_search("denial_email", $column_values))  !== false)) {
            unset($column_values[$key]);
            }
            if($table_name!=null){
            $column_value = $table_name.'.'.$column_value;
            }
        }
        unset($column_value);
        return $column_values;
    }
}