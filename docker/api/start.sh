#!/usr/bin/env bash

set -euxo pipefail

composer install --working-dir=/var/www/app

apache2-foreground
