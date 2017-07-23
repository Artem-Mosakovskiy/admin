<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    public $fillable = [
        'teplo_model_date',
        'rashodomer_pod_model_date',
        'rashodomer_obr_model_date',
        'termopar_date',
        'davlenie_pod_date',
        'davlenie_obr_date',
        'house_id',
        'resource_type_id',
        'uk_company_id',
        'rso_company_id',
        'teplo_model_id',
        'teplo_model_nomer',
        'rashodomer_pod_model_id',
        'rashodomer_pod_model_nomer',
        'rashodomer_obr_model_id',
        'rashodomer_obr_model_nomer',
        'rashodomer_pod_model_nomer',
        'termopar_id',
        'termopar_nomer',
        'davlenie_pod_id',
        'davlenie_pod_nomer',
        'davlenie_obr_id',
        'davlenie_obr_nomer',
        'other',
        'data',
        'city_id',
        'street_id'
    ];

    public function house(){
        return $this->belongsTo(House::class, 'house_id', 'id')->with('city', 'street');
    }

    public function resource(){
        return $this->belongsTo(ResourceType::class, 'resource_type_id', 'id');
    }

    public function teplo(){
        return $this->belongsTo(WarmModel::class, 'teplo_model_id', 'id')->with('marka');
    }

    public function uk(){
        return $this->belongsTo(YCompany::class, 'uk_company_id', 'id');
    }

    public function rso(){
        return $this->belongsTo(RSOCompany::class, 'rso_company_id', 'id');
    }

    public function rashodomer_obr(){
        return $this->belongsTo(RashodomerObrabotkaModel::class, 'rashodomer_obr_model_id', 'id')->with('marka');
    }

    public function rashodomer_pod(){
        return $this->belongsTo(RashodomerPodachaModel::class, 'rashodomer_pod_model_id', 'id')->with('marka');
    }

    public function termopar(){
        return $this->belongsTo(KomplektTermopar::class, 'termopar_id', 'id');
    }

    public function davlenie_pod(){
        return $this->belongsTo(DavlenieNaPodache::class, 'davlenie_pod_id', 'id');
    }

    public function davlenie_obr(){
        return $this->belongsTo(DavlenieNaObrabotke::class, 'davlenie_obr_id', 'id');
    }
}
