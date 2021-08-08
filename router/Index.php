<?php

    class Index extends gpRouter {
        
        public function __construct() {
            parent::__construct();
            
            $this->render->LogicIndex        =   new GPLogicIndex();
            $this->render->setParams         =   ['header'  =>  'Auth/Header',
                                                  'footer'  =>  'Auth/Footer'];
            
        }
        
        public function getindex() {
                 
            $this->render->page( 'Index');            
            
        }
        
    }