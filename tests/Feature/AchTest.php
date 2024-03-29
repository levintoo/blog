<?php

arch('test debugging functions not used')
    ->expect(['dd', 'dump', 'ddd', 'var_dump'])
    ->not->toBeUsed();

arch('test env is not used outside config')
    ->expect(['env'])
    ->not->toBeUsed();
