#!/bin/bash
docker stop myweb
docker rm myweb

docker stop myweb-from-dockerhub
docker rm myweb-from-dockerhub

docker rmi $(docker images | grep 'myweb')