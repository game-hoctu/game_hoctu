<?php
session_start();
function  stripUnicode($str) {
     if(!$str) return false;
     $unicode = array(
          'a' => 'à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ',
          'e' => 'è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ',
          'i' => 'ì|í|ị|ỉ|ĩ',
          'o' => 'ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)',
          'u' => 'ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ',
          'y' => 'ỳ|ý|ỵ|ỷ|ỹ',
          'd' => 'đ',    
          'A' =>  'À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ',
          'E' => 'È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ',
          'I' => 'Ì|Í|Ị|Ỉ|Ĩ',
          'O' => 'Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ',
          'U' => 'Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ',
          'Y' => 'Ỳ|Ý|Ỵ|Ỷ|Ỹ',
          'D' => 'Đ'
          );

     foreach($unicode as $khongdau=>$codau)
     {
          $arr = explode("|", $codau);
          $str = str_replace($arr,$khongdau,$str);
     }
     return $str;
}  

function changeTitle($str)
{
     $str = trim($str);
     if ($str=="") return "";
     $str = str_replace('"','',$str); 
     $str = str_replace("'",'',$str);
     $str = stripUnicode($str);
     $str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
     $str = str_replace(' ','-', $str);
     return $str;
}

function cate_parent($data)
{
     foreach($data as $val)
     {
          $cate_id = $val['cate_id'];
          $name = $val['name'];
          echo "<option>$name</option>";
     }
}

function warning($text)
{
     $_SESSION['warning'] = $text;
}

function success($text)
{
     $_SESSION['success'] = $text;
}
function debugArr($arr)
{
     echo "<pre>";
     print_r($arr);
     echo "</pre>";
}
?>
