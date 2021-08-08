<?php

    class GPLogicSample extends gpLogic {
        
        public function __construct() {
            parent::__construct();                                
            
        }

        /**
         * 
         * @name    SampleMethod
         * 
         * @desc    this sample method demonstrates how Genesys Project         
         * 
         * @author  Vincent J. Rahming <vincent@genesysnow.com>
         * 
         * @param   MIXED $MobilePhone
         * 
         * @return  MIXED $getData
         * 
         */
        public function SampleMethod( $SampleInput ) {

            /**
             *  CODE BLOCK GOES HERE
             *  - in this example, we are converting the string
             *    to uppercase, but any PHP operation can be
             *    performed before the output is returned            
             */

            $SetOutput         =       strtoupper( $SampleInput );

            return $SetOutput;

        }

    }