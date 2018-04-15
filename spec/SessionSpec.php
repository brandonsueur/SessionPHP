<?php

use App\Session;

describe("Testing Session.php", function () {

    it("Should get session", function () {
       $session = new Session();
       expect($session["id"])
           ->toBe($session->get("id"));
    });

});