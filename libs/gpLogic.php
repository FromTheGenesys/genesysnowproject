<?php

    class gpLogic {  
        
        public function __construct() {
            
            $this->GPLogicSession                 =       new gpSession();  
            
          
            /**
             * @var gpPDO Global database object             
             */
            $this->GPLogicData      = new   gpPDO(  ['gpPLATFORM'    =>      'mysql',
                                                     'gpCHARSET'     =>      'utf8mb4',
                                                     'gpHOST'        =>      'generalpurpose.cezjbr3dvdv5.us-east-1.rds.amazonaws.com',
                                                     'gpUSER'        =>      'generald9e89606',
                                                     'gpPSWD'        =>      'ce530c36a4a5!!',
                                                     'gpSOURCE'      =>      'MVPSource' ]);
         
            /** 
             * @name            $this->PCModMail
             * @description     instantiate global email object
             *                  apply values to email object properties             
             */
            $this->GPLogicMail                    =       new PHPMailer();                        
            $this->GPLogicMail->IsSMTP();                           
            $this->GPLogicMail->Host              =       gpMailCfg['HOST'];
            $this->GPLogicMail->Port              =       gpMailCfg['PORT'];
            $this->GPLogicMail->Username          =       gpMailCfg['USER'];
            $this->GPLogicMail->Password          =       gpMailCfg['PSWD'];
            
            # active HTML in email
            $this->GPLogicMail->SMTPAuth          =       true;        
            $this->GPLogicMail->isHTML( true ); 

            /**
             * @desc    Implement Date/Time Library
             */            
            $this->GPLogicDateTime                =       new gpDateTime();

            /**
             * @desc    Implements Math Library
             */            
            $this->GPLogicMath                    =       new gpMath();

            /**
             * @desc Instantiates Messages Library
             */            
            $this->GPLogicMessages                =       new gpMessages();

            /**
             * @desc    Implements Janitor Library
             */            

            $this->GPLogicJanitor                 =       new gpJanitor();
            # never trust any data provided by the user;
            # invoke Janitor Library
            # clean all data
            $this->GPLogicJanitor->preventXSS();
            $this->GPLogicJanitor->setCSRFToken();
            $this->GPLogicJanitor->checkCSRFToken();

            
        }

        public function gpGenerateGUID() {
               
            if ( function_exists( 'com_create_guid' ) ) :
                 
                 return com_create_guid();
                 
            else :
                 
                 mt_srand( (double)microtime() * 10000 ); //optional for php 4.2.0 and up.
                 $charid   =    strtolower(md5(uniqid(rand(), true)));
                 $hyphen   =    chr(45); // "-"
                 
                 $uuid     =     substr($charid, 0, 8 )  . $hyphen
                                .substr($charid, 8, 4 )  . $hyphen
                                .substr($charid, 12, 4 ) . $hyphen
                                .substr($charid, 16, 4 ) . $hyphen
                                .substr($charid, 20,12 );
                 
                 return $uuid;
            
            endif; 
            
       }

       /** EMAIL VALIDATION **/
       public function gpValidateEmail( $EmailAddress ) {

            if ( filter_var( $EmailAddress, FILTER_VALIDATE_EMAIL ) == false ) :

                return FALSE;

            else:

                return TRUE;

            endif;

       }

       public function gpConfirmEmails( $EmailOne, $EmailTwo ) {

            if ( $EmailOne !== $EmailTwo ) :

                return false;

            else:

                return true;

            endif;

       }

       /** PASSWORD VALIDATION **/

       public function gpValidatePassword( $Password ) {

            # the password must have at least one number
             if ( preg_match( '/[0-9]/', $Password ) == FALSE ) :
                
                return false;
                
             endif;
            
             # the password must have at least one captial letter
             if ( preg_match( '/[A-Z]/', $Password ) == FALSE ) :
                
                return false;
                
             endif;
             
             # the password must have at least one common letter
             if ( preg_match( '/[a-z]/', $Password ) == FALSE ) :
                
                return false;
                
             endif;
             
            # the password must have at least one special character
            if ( preg_match( '/[!@#$%^&*]/', $Password ) == FALSE ) :
                
                return false;
                
            endif;

            return true;

       }

       public function gpConfirmPasswords( $PasswordOne, $PasswordTwo ) {

            if ( $PasswordOne !== $PasswordTwo ) :

                return false;

            else:

                return true;

            endif;

       }

    }