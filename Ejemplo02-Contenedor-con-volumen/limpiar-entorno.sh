#!/bin/bash
docker stop myapache
docker rm myapache

docker stop myapache-vol
docker rm myapache-vol

docker image rm httpd