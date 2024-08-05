<?php 

namespace App\Helpers;

use App\Models\InvStocks;
use App\Models\EmployeeInventory;

class InventoryHelper
{
    public function checkBalance($items)
    {
        foreach ($items as $selectedItem) {
            $itemId = $selectedItem['item_id'];
            $quantity = $selectedItem['issued_qty'];
            
            if ($itemId != 0){
                $items = InvStocks::where('item_id', $itemId)->get();
                foreach ($items as $item) {
                    if ($item->item_id && $item->balance_qty < $quantity){
                        return [
                            'success' => false,
                            'error_type' => 'no balance',
                            'message' => 'The selected item does not have enough balance.',
                            'item_name' => $item->item->product_name,
                            'item_qty' => $item->balance_qty,
                        ];
                    }
                    elseif ($item->item_id && $quantity <= 0)
                    {
                        return [
                            'success' => false,
                            'error_type' => 'invalid quantity',
                            'message' => 'Invalid Quantity!',
                            'item_name' => $item->item->product_name,
                            'item_qty' => $item->balance_qty,
                        ];
                    }
                }
            }
        }
        return ['success' => true];
    }

    public function checkEmployeeBalance($items, $emp_id)
    {
        foreach ($items as $selectedItem) {
            $itemId = $selectedItem['item_id'];
            $quantity = $selectedItem['issued_qty'];
            
            if ($itemId != 0){
                $items = EmployeeInventory::where('item_id', $itemId)->where('emp_id', $emp_id)->get();
                // dd($items);
                if ($items->isEmpty())
                {
                    return [
                        'success' => false,
                        'error_type' => 'no items',
                        'message' => 'Employee could have no items!',
                        'item_name' => '',
                        'item_qty' => '',
                    ];
                }
                else
                {
                    foreach ($items as $item) {
                        if ($item->item_id && $item->balance_qty < $quantity){
                            return [
                                'success' => false,
                                'error_type' => 'no balance',
                                'message' => 'The selected item does not have enough balance.',
                                'item_name' => $item->item->product_name,
                                'item_qty' => $item->balance_qty,
                            ];
                        }
                        elseif ($item->item_id && $quantity <= 0)
                        {
                            return [
                                'success' => false,
                                'error_type' => 'invalid quantity',
                                'message' => 'Invalid Quantity!',
                                'item_name' => $item->item->product_name,
                                'item_qty' => $item->balance_qty,
                            ];
                        }
                    }
                }
            }
        }
        return ['success' => true];
    }
}