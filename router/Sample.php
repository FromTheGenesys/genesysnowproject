<?php

    class Sample extends gpRouter {
        
        public function __construct() {
            parent::__construct();
  
            $this->render->LogicSample       =   new GPLogicSample();                       # include LogicSample Library
            $this->render->LogicGlobal       =   new GPLogicGlobal();                       # include LogicGlobal Library           

            define( '_FOLDER_', 'Sample/' );
            define( '_MODULE_', strtolower( _FOLDER_) );

        }
    
        /**
         * 
         * @name    getindex
         * 
         * @desc    Displays the Dashboard page which acts as a search page
         * 
         * @author  Vincent J. Rahming
         * 
         */
        public function getindex() {
            
            # if session is not active and started, force the login prompt
            $this->render->page( _FOLDER_ . 'Index' );
                
        }

    }