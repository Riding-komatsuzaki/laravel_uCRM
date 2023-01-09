<?php 

namespace App\Services;

use Illuminate\Support\Facades\DB;



class ManagementService {
  public static function perDay($subQuery){

    $query = $subQuery->where('status', true)
      ->groupBy('id')
      ->selectRaw('id, user_id, user_name, sum(subtotal) as totalPerPurchase, DATE_FORMAT(created_at, "%Y%m%d") as date');

      $data = DB::table($query)
      ->groupBy('user_name')
      ->selectRaw('user_name, format(sum(totalPerPurchase),0) as total, sum(totalPerPurchase) as totals')
      ->get();

      $labels = $data->pluck('user_name');
      $totals = $data->pluck('totals');

      return [$data, $labels, $totals];
  }

}

?>
