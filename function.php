<?php

function connect()
{
  global $koneksi;
  return $koneksi;
}

function select($query)
{  
  $result = [];
  $sql    = mysqli_query(connect(),$query);

  if (!$sql) {
    die(mysqli_error(connect()));
  }

  while ($data  = mysqli_fetch_assoc($sql)) {
    $result[] = $data;
  }

  return $result;
}

function generateID($table,$id_primary,$prefix,$length=5)
{
  $query     = "SELECT MAX({$id_primary}) as last_id FROM {$table}";
  $sql       = mysqli_query(connect(),$query);

  if (!$sql) {
    die(mysqli_error(connect()));
  }

  $data      = mysqli_fetch_assoc($sql);
  $lenPrefix = strlen($prefix);
  $getLast   = (int) substr($data['last_id'], $lenPrefix, $length-$lenPrefix);
  $getLast   += 1;
  $sprintf   = "%0".($length-$lenPrefix)."s";  
  return $prefix . sprintf($sprintf, $getLast);
}

function generateNIP()
{
  $query     = "SELECT MAX(nip) as last_id FROM tb_karyawan";
  $sql       = mysqli_query(connect(),$query);

  if (!$sql) {
    die(mysqli_error(connect()));
  }

  $nip = date("Y.m.d.is");

  return $nip;
}

function parsingDataInsert($data=array())
{
  $k = '';
  $val = '';

  foreach ($data as $key => $value) {
    $k .= $key . ",";
    $val .= "'".$value . "',";
  }

  $data['key'] = substr($k, 0, -1);
  $data['value'] = substr($val, 0, -1);

  return $data;

}

function parsingDataUpdate($data=array(),$primary)
{
  $val = '';
  $where = '';

  foreach ($data as $key => $value) {
    if ($key == $primary) {
      $where .= $key . " = '".$value . "',";
    } else {
      $val .= $key . " = '".$value . "',";
    }
  }

  $data['val'] = substr($val, 0, -1);
  $data['where'] = substr($where, 0, -1);

  return $data;
}

function store($table,$data=array(),$message=null)
{
  $parsing = parsingDataInsert($data);
  $query   = "INSERT INTO {$table} ({$parsing['key']}) VALUES ({$parsing['value']})";
  $sql     = mysqli_query(connect(),$query);

  if (!$sql) {
    return fail(mysqli_error(connect()));
    die();
  }

  return success($message);

}

function update($table, $primary, $data, $message=null)
{
  $parsing = parsingDataUpdate($data,$primary);
  $query = "UPDATE {$table} SET {$parsing['val']} where {$parsing['where']}";
  $sql     = mysqli_query(connect(),$query);

  if (!$sql) {
    return fail(mysqli_error(connect()));
    die();
  }

  return success($message);
}

function destroy($table,$primary,$data)
{
  $sql = mysqli_query(connect(),"select {$primary} from {$table} where {$primary} = '{$data}'");

  if (!$sql) {
    return fail(mysqli_error(connect()));
    die();
  }

  $count = count($sql);  

  if ($count > 0) {
    $del = mysqli_query(connect(),"delete from {$table} where {$primary} = '{$data}'");
    if (!$del) {
      return fail(mysqli_error(connect()));
      die();
    }
    return success('Berhasil menghapus data.');
  } else {
    return fail('Tidak ada data ditemukan.');
    die();
  }

}

function success($message)
{
  $message = $message ? $message : 'Berhasil!';
  $_SESSION['notif'] = "<div class=\"alert alert-success\" role=\"alert\">{$message}</div>";
}

function fail($message)
{
  $_SESSION['notif'] = "<div class=\"alert alert-danger\" role=\"alert\">Gagal!, {$message}</div>";
}

function back()
{
  header("Location: {$_SERVER['HTTP_REFERER']}");
}

function show_notif()
{
  echo @$_SESSION['notif'];

  if (isset($_SESSION['notif']))
  unset($_SESSION['notif']);
}

function convertToRomawi($str)
{
  $rmw = '';
  $str = (int) $str;

  switch ($str) {
    case 1:
      $rmw = 'I';
      break;
    case 2:
      $rmw = 'II';
      break;
    case 3:
      $rmw = 'III';
      break;
    case 4:
      $rmw = 'IV';
      break;
    case 5:
      $rmw = 'V';
      break;
    case 6:
      $rmw = 'VI';
      break;
    case 7:
      $rmw = 'VII';
      break;
    case 8:
      $rmw = 'VIII';
      break;
    case 9:
      $rmw = 'IX';
      break;
    case 10:
      $rmw = 'X';
      break;
    case 11:
      $rmw = 'XI';
      break;
    case 12:
      $rmw = 'XII';
      break;
    default:
      $rmw = '';
      break;
  }
  return $rmw;
}

function checkLogin($user,$pass)
{
  $query = "SELECT * FROM tb_user WHERE user = '{$user}' && pass = '{$pass}'";
  $sql = mysqli_query(connect(),$query);

  if (!$sql) {
    return fail(mysqli_error(connect()));
    die();
  }

  if (mysqli_num_rows($sql) > 0) {
    $fetch = mysqli_fetch_assoc($sql);
    if ($user == $fetch['user'] && $pass == $fetch['pass']) {
      $_SESSION['user'] = $user;
      return true;
    } else {
      return false;
    }
  }
  
}

?>