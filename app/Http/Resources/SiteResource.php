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
            'id'          => $this->id,
            'owner'       => $this->owner,
			'name'        => $this->name,
            'orderNumber' => $this->orderNumber,
            'cpdNumber'   => $this->cpdNumber,
            'client'      => $this->client,
            'isZone'      => $this->isZone,
            'points'      => $this->points,
            'beginning'   => $this->beginning,
			'status'      => $this->status,
            'end'         => $this->end
        ];
    }
}
