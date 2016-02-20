<?php

return [
    /**
     * The time, in seconds, that the browser should remember that this site is only to be accessed using HTTPS.
     */
    'max-age' => 31536000,
    
    /**
     * If this optional parameter is specified, this rule applies to all of the site's subdomains as well.
     */
    'includeSubdomains' => false,
    
    /**
     * If this is set the preload option will also be added
     * 
     * includeDomains must be enabled if this option is enabled
     * 
     * See: https://developer.mozilla.org/en-US/docs/Web/Security/HTTP_strict_transport_security 
     * and https://hstspreload.appspot.com/ for more information
     */
    'preload' => false
];
