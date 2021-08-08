<?php

    class GPLogicAuth extends gpLogic {
        
        public function __construct() {
            parent::__construct();      

        }

        /**
         * 
         *  -----------------------------------------------------------------------
         *  | INSTRUCTIONS                                                        |  
         *  -----------------------------------------------------------------------
         *  This file is used to setup authentiation and authorization methods.
         *  This file also controls Login / Logout functionality for the entire application.        
         * 
         **/



        /**
         * 
         * @name    processStartSession
         * 
         * @desc    Validates A UserID and Password against the database
         * 
         * @author  Vincent J. Rahming
         *          
         */
        public function processStartSession() {
            
            $this->GPLogicSession->setIndex( 'SessionIsStarted', true );

        }

        /**
         * 
         * @name    setAuthLogout
         * 
         * @desc    Validates A UserID and Password against the database
         * 
         * @author  Vincent J. Rahming
         *          
         */
        public function setAuthLogout() {
            
            # kill all indexes
            $this->GPLogicSession->destroyIndexes();
            
        }
         
    }