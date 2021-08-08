<?php

    /** ***********************************************************
     * @name    Genesys Framework
     * @author  Vincent J. Rahming
     * @desc    Genesys Framework designed using MVC architecture
     * @since   February 9th, 2018     
     * 
     */
 
     session_start( ['name' => 'GN-Session'] );
     
     # require gpConfig.php
     include 'libs/gpConfig.php';
     
     # instantiate pcConfig object
     $objConfig         =       new \gpConfig();
     
     # auto load objects   
     require_once 'libs/gpAutoLoad.php';

     
     # start up
     $gpObj             =       new \gpStartup();
     $gpObj->initialize(); 