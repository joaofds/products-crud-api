<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * Retorna um customer pelo id
     *
     * @param [type] $customer
     * @return void
     */
    public static function getCustomerById($customer) 
    {
        $data = self::where('id', $customer->id)->with(['addresses' => function($query) {
            $query->where('active', 1);
        }])->get();

        return $data;
    }
    
    /**
     * Relacionamento 1/n customer_addresses
     *
     * @return void
     */
    public function addresses()
    {
        return $this->hasMany(
            Address::class,
            'customer_id',
            'id');
    }
}
