#!/bin/bash
docker run \
-d \
-p 80:80 \
--name myapache \
httpd 