<?php

namespace App;

use Carbon\Carbon;

trait Timestamp{

    public function getCreatedAttribute(){

        return new Carbon($this->created_at);

    }

    public function getUpdatedAttribute(){

        return new Carbon($this->updated_at);

    }

}