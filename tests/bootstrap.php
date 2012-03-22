<?php

spl_autoload_register( function( $class )
{
        $path = dirname( __FILE__ )
                . '/../lib/'
                . str_replace( '\\', DIRECTORY_SEPARATOR, $class )
                . '.php';
		
        if ( !file_exists( $path ) )
        {
                return false;
        }

        include $path;
} );


