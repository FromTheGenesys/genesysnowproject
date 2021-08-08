<?php

    class Errors extends gpRouter {
        
        public function __construct() {

            parent::__construct();
           
        }

        public function getindex() {
            
            $this->render->page( 'Error' );
            
        }
        
    }