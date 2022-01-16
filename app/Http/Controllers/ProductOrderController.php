<?php

namespace App\Http\Controllers;

use App\Http\Requests\productOrderRequest;
use App\Models\ProductOrder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductOrderController extends Controller
{

    public $api_url = 'https://ndshop.ir/api/v1';
    public $api_key = '2OmYX7hf9SDnvGwy8HGnUwRXqtPUPwTU';

//public $api_key = '2OmYX7hf9SDnvGwy8HGnUwRXqtP';
//    public $api_url = 'https://api.github.com/';

/// creating new order
    public function add_order(productOrderRequest $request) {

        $service = $request->input('service');
        $productNumber = $request->input('quantity');
        $postLink = $request->input('link');

        $post = [
            'key' => $this->api_key,
            'action' => 'add',
            'service' => $request->input('service'),
            'link' => $request->input('link'),
            'quantity' => $request->input('quantity')
        ];

        $result = $this->connect($post);
        $result = json_decode($result);

        return ProductOrder::create([
            'service' => $service,
            'quantity' => $productNumber,
            'link' => $postLink,
            'orderCode' => $result->order
        ]);
    }

    /// Tracking Order
    public function status(Request $request) {
        $result = $this->connect(array(
            'key'    => $this->api_key,
            'action' => 'status',
            'order'  => $request->OrderCode
        ));
        return json_decode($result);
    }

    private function connect($post) {
        $_post = Array();

        if (is_array($post)) {
            foreach ($post as $name => $value) {
                $_post[] = $name.'='.urlencode($value);
            }
        }

        if (is_array($post)) {
            $url_complete = join('&', $_post);
        }
        $url = $this->api_url."?".$url_complete;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'API (compatible; MSIE 5.01; Windows NT 5.0)');
        $result = curl_exec($ch);
        if (curl_errno($ch) != 0 && empty($result)) {
            $result = false;
        }
        curl_close($ch);
        return $result;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return ProductOrder::latest()->first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return JsonResponse
     */
    public function SaveStatus(Request $request)
    {
        $status = $request->status;
        $order = $request->order;
        $orderInfo = ProductOrder::where('orderCode',$order)->first();
        if ($orderInfo){
            return ProductOrder::create([
                'status' => $status
            ]);
        }
    }
}
