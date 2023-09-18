<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Helper
{
    /**
     * Return Response on Success 
     * @param  [Integer] status_code
     * @param  [string] method
     * @return [string] message
     */
    public static function responseOnSuccess($data)
    {
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'method' => $data['method'],
            'message' => $data['message'],
            'data' => $data['data']
        ]);
    }
    /**
     * Return Response on Validation Failure 
     * @param  [Integer] status_code
     * @param  [string] method
     * @return [string] message
     */
    public static function responseOnValidationFailure($data)
    {
        return response()->json([
            'success' => false,
            'status_code' => 422,
            'status' => "failure",
            'method' => 'POST',
            'message' => isset($data['message']) ? $data['message'] : 'Validation failed.',
            'data' => null
        ]);
    }
    /**
     * Return Response on Failure 
     * @param  [Integer] status_code
     * @param  [string] method
     * @return [string] message
     */
    public static function responseOnFailure()
    {
        return response()->json([
            'success' => false,
            'status_code' => 400,
            'method' => 'POST',
            'message' =>  'Something went wrong. please try agian.',
            'data' => null
        ]);
    }

    /**
     * Return Image Link From S3
     * @return [string] Image S3 Link
     */
    public static function getImageLink($filePath)
    {
        if ($filePath) {
            $image_url = Storage::disk('s3')->temporaryUrl(
                $filePath,
                now()->addMinutes(120)
            );
            return $image_url;
        } else {
            return null;
        }
    }



    public static function UpdateOrderStatusLog($requestArray)
    {
        $customstatus = '';
        if (isset($requestArray['order_id']) && isset($requestArray['order_status'])) {
            switch ($requestArray['order_status']) {
                case 'PLACED':
                    $customstatus = 'Order Placed Successfully';
                    break;
                case 'ACCEPTED':
                    $customstatus = 'Order Accepted Sucessfully';
                    break;
                case 'ASSIGNED_DELIVERY_PARTNER':
                    $customstatus = 'Order Assigned To Delivery Partner Successfully';
                    break;
                case 'FE_ASSIGNED':
                    $customstatus = 'Order ASSIGNED To FE Sucessfully';
                    break;
                case 'FE_REACHED':
                    $customstatus = 'FE REACHED at PickUp Location Sucessfully';
                    break;
                case 'FE_PICKED':
                    $customstatus = 'FE PICKED Order For Delivery Sucessfully';
                    break;
                case 'DELIVERED':
                    $customstatus = 'Order DELIVERED Sucessfully';
                    break;
                case 'REJECTED':
                    $customstatus = 'Order REJECTED Sucessfully';
                    break;
            }
            $attempt = 0;
            $order_status = OrderStatus::where('order_id', $requestArray['order_id'])->orderBy('id', 'desc')->first();
            if ($requestArray['order_status'] == "PLACED") {
                $attempt_count = $attempt;
            } elseif ($requestArray['order_status'] == "ASSIGNED_DELIVERY_PARTNER") {
                $attempt_count = $order_status->attempt_count + 1;
            } else {
                $attempt_count = $order_status->attempt_count;
            }
            if (!empty($customstatus)) {
                $data = OrderStatus::create([
                    'order_id' => $requestArray['order_id'],
                    'status' => $requestArray['order_status'],
                    'order_status' => $customstatus,
                    'function_name' => $requestArray['function_name'],
                    'attempt_count' => isset($attempt_count) ?  $attempt_count : '',
                    'reject_reason' => isset($requestArray['reject_reason']) ? $requestArray['reject_reason'] : '',
                    'modified_by' => isset($requestArray['modified_by']) ? $requestArray['modified_by'] : ""
                ]);
            }
        }
    }

    public static function getOrderStatus($status)
    {
        switch ($status) {
            case '1':
                $customstatus = ['PLACED'];
                break;
            case '2':
                $customstatus = ['ACCEPTED', 'ASSIGNED_DELIVERY_PARTNER', 'FE_ASSIGNED', 'FE_REACHED', 'FE_PICKED'];
                break;
            case '3':
                $customstatus = ['DELIVERED'];
                break;
            case '4':
                $customstatus = null;
                break;
        }
        return  $customstatus;
    }
}
