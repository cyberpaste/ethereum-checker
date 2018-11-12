#!/usr/bin/env bash

echo "Autofix ..."
echo ""

sudo docker exec -it image_app_1 /bin/bash
composer update
exit;

echo "Done with web"
echo ""
echo "ok..."