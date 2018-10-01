<?php

class UserReferenceObserver {
    protected $user;
    
    public function __construct($user) {
        $this->user = $user;
    }
    
    public function saving($model) {
        $model->updated_by = $this->user->id;
    }
}