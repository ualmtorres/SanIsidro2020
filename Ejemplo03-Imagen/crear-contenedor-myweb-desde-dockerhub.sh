#!/bin/bash
docker run \
-d \
-p 84:80 \
--name myweb-from-dockerhub \
ualmtorres/myweb:v0