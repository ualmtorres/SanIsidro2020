#!/bin/bash
kubectl apply -f deployment-sgbd.yml
kubectl apply -f deployment-sgapi.yml
kubectl apply -f deployment-sgapp.yml
kubectl apply -f services.yml

kubectl get deployments -n demo --watch
kubectl get services -n demo --watch
EXTERNAL_IP=`kubectl get services -n demo | grep "sgapp" | awk '{print $4}'`
echo -e "Abre en un navegador la EXTERNAL-IP: \033[0;31m${EXTERNAL_IP} \033[0;39m del servicio sgapp"

kubectl apply -f autoscaler.yml

kubectl get hpa --namespace=demo --watch