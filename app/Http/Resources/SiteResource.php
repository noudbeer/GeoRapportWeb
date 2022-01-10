<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SiteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'               => $this->id,
            'owner'            => $this->owner,
			'order_title'      => $this->order_title,
            'orderNumber'      => $this->orderNumber,
            'cpd_title'        => $this->cpd_title,
            'cpdNumber'        => $this->cpdNumber,
            'client'           => $this->client,
            'isZone'           => $this->isZone,
            'points'           => $this->points,
            'beginning'        => $this->beginning,
			'status'           => $this->status,
            'end'              => $this->end,
            'validatorUsers'   => UserResource::collection($this->validatorUsers),
            'contributorUsers' => UserResource::collection($this->contributorUsers),
        ];
    }
}
