<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'tabla_ventas';


    public function user()
    {
        return $this->belongsTo('App\User','for_users_id','id');
    }

    public function dms()
    {
        return $this->belongsTo('App\Dms','tabla_dms_idpdv','idpdv');
    }

    public function getTipoLineaAttribute($value)
    {
        switch ($value){
            case 'nueva':
                return 'Nueva';
                break;
            case 'pre_pos':
                return 'Vieja (Pre) y/o Migracion (pos)';
            break;
            case 'port_pre':
                return 'Portabilidad Prepago';
                break;
            case 'port_pos':
                return 'Portabilidad Pospago';
                break;
        }
    }

    public function getProductoVendidoAttribute($value)
    {
        switch ($value){
            case 'bolsa':
                return 'Bolsa';
                break;
            case 'plan_pos':
                return 'Plan Pospago';
                break;
            case 'paq_4mil':
                return 'Paquete de $4000 (Gross Automatico)';
                break;
            case 'ninguno':
                return 'Ninguno';
                break;
        }
    }

}
