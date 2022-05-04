<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;

class Search extends Controller
{
  public function sendResponse($result, $message)
  {
    $response = [
      'success' => true,
      'data' => $result,
      'message' => $message,
    ];
    return response()->json($response, 200);
  }

  public function sendError($error, $erorMessages = [], $code = 404)
  {
    $response =
      [
        'success' => false,
        'message' => $error,
      ];
    if (!empty($erorMessages)) {
      $response['data'] = $erorMessages;
    }
    return response()->json($response, $code);
  }

  public function search($info)
  {
    $searchinfo = Member::where('fullname', 'LIKE', '%' . $info . '%')->get();
    if ($searchinfo) {
      return $searchinfo;
    }elseif(!$searchinfo){
      return $this->sendError('No Data.');
    }
  }
}
