<?php 

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AnalysisService {
  public static function perDay($subQuery){

    $authid = Auth::id();

    $query = $subQuery->where('status', true)
      ->groupBy('id')
      ->selectRaw('id, user_id, sum(subtotal) as totalPerPurchase, DATE_FORMAT(created_at, "%Y%m%d") as date')
      ->where('user_id', $authid);
      

      $data = DB::table($query)
      ->groupBy('date')
      ->selectRaw('date, sum(totalPerPurchase) as total')
      ->get();

      $labels = $data->pluck('date');
      $totals = $data->pluck('total');

      return [$data, $labels, $totals];
  }

  public static function perMonth($subQuery){

    $authid = Auth::id();

    $query = $subQuery->where('status', true)
      ->groupBy('id')
      ->selectRaw('id, user_id, sum(subtotal) as totalPerPurchase, DATE_FORMAT(created_at, "%Y%m") as date')
      ->where('user_id', $authid);
      

      $data = DB::table($query)
      ->groupBy('date')
      ->selectRaw('date, sum(totalPerPurchase) as total')
      ->get();

      $labels = $data->pluck('date');
      $totals = $data->pluck('total');

      return [$data, $labels, $totals];
  }

  public static function perYear($subQuery){

    $authid = Auth::id();

    $query = $subQuery->where('status', true)
      ->groupBy('id')
      ->selectRaw('id, sum(subtotal) as totalPerPurchase, DATE_FORMAT(created_at, "%Y") as date')
      ->where('user_id', $authid);
      

      $data = DB::table($query)
      ->groupBy('date')
      ->selectRaw('date, sum(totalPerPurchase) as total')
      ->get();

      $labels = $data->pluck('date');
      $totals = $data->pluck('total');

      return [$data, $labels, $totals];
  }
}

?>
