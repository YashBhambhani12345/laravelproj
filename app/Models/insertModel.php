<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
 
class insertModel extends Model
{
  public function sendData(){
    $query = DB::table('users')->insert();
  }
}
?>