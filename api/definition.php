<?php

# API specification
# https://jsonapi.org/

require_once "router.php";
require_once "api.php";

Router::POST('/authentication', function($matches) { Api::authentication($matches); });

