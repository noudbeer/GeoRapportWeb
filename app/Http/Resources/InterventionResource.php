<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InterventionResource extends JsonResource
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
            'id'                        => $this->id,
            'site'                      => $this->site,
            'location'                  => $this->location,
            'datetimeOfIntervention'    => $this->datetimeOfIntervention,
            'owner'                     => $this->owner,
            'teamMembers'               => $this->teamMembers,
            'interventionsGroup'        => $this->interventionsGroup,
            'type'                      => $this->type,
            'quantity'                  => $this->quantity,
            'unit'                      => $this->unit,
            'description'               => $this->description,
            'timeSpent'                 => $this->timeSpent,
            'unitOfTime'                => $this->unitOfTime
        ];
    }
}
