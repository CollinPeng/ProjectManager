<?php

$app->get('/login', \App\Http\Controllers\AuthenticateController::class . ':loginAction');