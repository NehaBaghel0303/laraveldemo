<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    /**
     * Set the prefix route for crudgen
     * String|Null default:null
     */
    'prefix' => null,

    /**
     * Set the path or route for the crudgen
     * String|null default:crudgen
     */
    'path' => 'crudgen',

    /**
     * Set the default template to use for crud generation
     * String|null default:html
     */
    'helper' => 'html',

    /**
     * Define home route in the crudgen navigation
     * String|null default:/ [home route]
     */
    'home' => null,

    /**
     * Need authentication to access?
     * boolean default:true
     */
    'auth' => true,

    /**
     * Provide role wise access
     * boolean default:false
     */
    'role_wise_access' => false,

    /**
     * Define roles to provide access
     * Note: 'role_wise_access' needs to be [true] to use this feature
     * Array default:[] - empty array
     */
    'roles' => []
];
