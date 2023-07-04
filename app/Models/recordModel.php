<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
 
class recordModel extends Model
{

  protected $table = 'users';

  public function sendData(){
    $query = DB::table('users')->select('id','name','email')->get();
    return $query;

  }
}
?>